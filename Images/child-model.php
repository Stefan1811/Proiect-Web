<?php

define ('URL', 'http://localhost/ProiectWeb/Utils/Pictures.php');
    if (isset($_POST['submit']))
    {
        $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
        $name = $_FILES["fileToUpload"]["name"];
        $kidUUID = ($_COOKIE['kidUUID']);
        $filename = basename($_FILES['fileToUpload']['name']);
        $filename = str_replace(' ', '_', $filename);
        move_uploaded_file($tmp_name, "../UserData/$kidUUID/$filename");
        
        $c = curl_init ();								 
        $fields = json_encode(array('childUUID'=>$kidUUID,
                                    'name' =>$filename));
        curl_setopt ($c, CURLOPT_URL,URL);           
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
        $res = curl_exec ($c);                           
        curl_close ($c);	
        //$res = json_decode($res,true);
    }

    if (!isset($_POST['favs']) && !isset($_POST['notfavs']))
    {   

        $favs = 0;
        $notfavs = 1;
    }
    else{
    if (isset($_POST['favs']))
    {   //echo("favs    ");
        $favs = 1;
    }
    else 
       { 
        $favs = 0;
       }

    if (isset($_POST['notfavs']))
    {
       $notfavs = 1;
    }
    else 
      { 
       $notfavs = 0;
      }
    }

    
function getPictures($favs){
        $kidUUID = ($_COOKIE['kidUUID']);
        $c = curl_init ();								 
        $fields = json_encode(array('childUUID'=>$kidUUID,
                                    'favorites'=>$favs));
        curl_setopt ($c, CURLOPT_URL,URL);           
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
        $res = curl_exec ($c);                           
        curl_close ($c);
        
        $res = json_decode($res,true);
        foreach($res as $image)
        {  
            $withoutExt = preg_replace('/\.\w+$/', '', $image['imageName']);
            if (isset($_POST["b".$withoutExt]))
                {
                    addFavorites($image['imageName']);
                  
                }
            if (isset($_POST['delete'.$withoutExt]))
            {
                deleteImage($image['imageName']);
                
            }
        }
        $kidUUID = ($_COOKIE['kidUUID']);
        $c = curl_init ();								 
        $fields = json_encode(array('childUUID'=>$kidUUID,
                                    'favorites'=>$favs));
        curl_setopt ($c, CURLOPT_URL,URL);           
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
        $res = curl_exec ($c);                           
        curl_close ($c);
        $res = json_decode($res,true);



        return $res;
     
        
}

function addFavorites($name){
    $kidUUID = ($_COOKIE['kidUUID']);
    $c = curl_init ();								 
    $fields = json_encode(array('childUUID'=>$kidUUID,
                                'name'=>$name));
    curl_setopt ($c, CURLOPT_URL,URL);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'PUT');
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
    $res = curl_exec ($c);                           
    curl_close ($c);
    $res = json_decode($res,true);

}

function deleteImage($name){
    $kidUUID = ($_COOKIE['kidUUID']);
    $c = curl_init ();								 
    $fields = json_encode(array('childUUID'=>$kidUUID,
                                'name'=>$name));
    curl_setopt ($c, CURLOPT_URL,URL);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'DELETE');
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
    $res = curl_exec ($c);                           
    curl_close ($c);
    echo($res);

}





?>
