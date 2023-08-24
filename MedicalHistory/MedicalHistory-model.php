<?php
    function getChildUUID()
    {
    $childUUID = $_COOKIE["kidUUID"];
    define ('URL', 'http://localhost/ProiectWeb/Utils/MedicalHistory.php');
    $c = curl_init ();								 
    $fields = json_encode(array('childUUID'=>$childUUID));
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
   

?>