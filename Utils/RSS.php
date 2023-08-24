<?php

function createRSS()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $uuid = $val['userUUID'];
    $info = "<?xml version ='1.0' ?>\n";
    $info.= "<rss version = '2.0' >\n";
    $info.= "<channel>\n";
    $info.= "<title> Cildren</title>\n";
    $info.= "<description> All the important things about my children</description>\n";
    $info.= "<language>en-US</language>\n";
    $info.= "<link>localhost</link>";
    $info.= "<allKids>\n";
    
    define ('URLKids', 'http://localhost/ProiectWeb/Utils/Child.php');
    $c = curl_init ();								 
    $fields = json_encode(array('parentUUID'=>$uuid));
    curl_setopt ($c, CURLOPT_URL,URLKids);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'GET');
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
    $res = curl_exec ($c);                           
    curl_close ($c);	
    $res = json_decode($res,true);
    define ('URLKid', 'http://localhost/ProiectWeb/Utils/AfisareInfo.php');
    foreach ($res as $r)
    {
        $c = curl_init ();								 
        $fields = json_encode(array('childUUID'=>$r['uuid']));
        curl_setopt ($c, CURLOPT_URL,URLKid);           
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
        $res2 = curl_exec ($c);                      
        curl_close ($c);	
        $res2 = json_decode($res2,true);
        foreach($res2 as $row)
        {  
            $info.= "<kid>";
            $info.= "<firstName>".$row['firstName']."</firstName>\n";
            $info.= "<lastName>".$row['lastName']."</lastName>\n";
            $info.= "<dateBirth>".$row['dateOfBirth']."</dateBirth>\n";
            $info.= "<sex>".$row['sex']."</sex>\n";
            $info.= "<weight>".$row['weight']."</weight>\n";
            $info.= "<height>".$row['height']."</height>\n";
            $info.= "</kid>\n";
        }
    }
    $info.= "</allKids>\n";
    $info.= "</channel>\n";
    $info.= "</rss>\n";
    file_put_contents(getcwd()."/rss.xml",$info);
}


switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        echo (createRSS());
        break;
    default:
        return("IDK");
}


?>
