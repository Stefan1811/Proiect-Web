<?php

if (!isset($_COOKIE["userUUID"]))
    header("Location: ../CreareCont/CreareCont.php");


if ($_SERVER['REQUEST_METHOD'] == "POST")
    {   if (isset($_POST['logOut'])) 
            deleteCookie();
        if (isset($_POST['delete']))
            delete();  
        if (isset($_POST['changePass']))
            header("Location: ../ChangePasswordParent/ChangePasswordParent.php");
        if (isset($_POST['RSS']))
            ;
    }

function deleteCookie()
{
    setcookie("userUUID", "", time() - 1, "/");
    header("Location: ../Login/Login.php");
}

function delete()
{

    define ('URL', 'http://localhost/ProiectWeb/Utils/Parent.php');
    $c = curl_init ();	
    $userUUID = $_COOKIE["userUUID"];
    $fields = [
        "userUUID"=> $userUUID
    ];
    $fields_request = json_encode($fields);

    curl_setopt ($c, CURLOPT_URL,URL);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($c, CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt ($c, CURLOPT_POSTFIELDS,$fields_request);
    $res = curl_exec ($c);                           
    curl_close ($c);								 
    header("Location: ../Login/Login.php");
    //echo($res);
}
function RSS()
{
    define ('URL2', 'http://localhost/ProiectWeb/Utils/RSS.php');
    $c = curl_init ();	
    $userUUID = $_COOKIE["userUUID"];
    $fields = [
        "userUUID"=> $userUUID
    ];
    $fields_request = json_encode($fields);

    curl_setopt ($c, CURLOPT_URL,URL2);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($c, CURLOPT_CUSTOMREQUEST,"GET");
    curl_setopt ($c, CURLOPT_POSTFIELDS,$fields_request);
    $res = curl_exec ($c);                           
    curl_close ($c);								 
    echo($res);
    

}


RSS();

?>