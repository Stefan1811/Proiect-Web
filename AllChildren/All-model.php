<?php
    
    function getKidAccounts(){
    $parentUUID = $_COOKIE["userUUID"];
    define ('URL', 'http://localhost/ProiectWeb/Utils/Child.php');
    $c = curl_init ();								 
    $fields = json_encode(array('parentUUID'=>$parentUUID));
    curl_setopt ($c, CURLOPT_URL,URL);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_CUSTOMREQUEST,'GET');
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($c, CURLOPT_POSTFIELDS,$fields);
    $res = curl_exec ($c);                           
    curl_close ($c);	
    $res = json_decode($res,true);
    foreach ($res as $kid)
    {   
        
        if (isset($_POST[$kid['uuid']]))
            {
                
                setCookie("kidUUID","",-1,'/');
                setCookie("kidUUID",$kid['uuid'],time() + (86400 * 30) * 365,'/');
                header("Location: ../AfisareDetaliiCopil/Afisare.php");
            }

    }
    
    
    
    
    return $res;
}

?>