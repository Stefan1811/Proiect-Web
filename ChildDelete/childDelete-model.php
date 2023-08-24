<?php
if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (isset($_POST['delete']))
            delete();  
        
    }

function delete()
{

    define ('URL', 'http://localhost/ProiectWeb/Utils/Child.php');
    $c = curl_init ();	
    $childUUID = $_COOKIE["kidUUID"];
    $fields = [
        "childUUID"=> $childUUID
    ];
    $fields_request = http_build_query($fields);

    curl_setopt ($c, CURLOPT_URL,URL.'?'.$fields_request);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($c, CURLOPT_CUSTOMREQUEST,"DELETE");
    $res = curl_exec ($c);                           
    curl_close ($c);								 
    header("Location: ../AllChildren/AllChildren.php");
    //echo($res);
}



?>