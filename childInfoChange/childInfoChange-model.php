<?php

require "../Utils/Connection.php";
if (isset($_POST["change"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  define ('URL', 'http://localhost/ProiectWeb/Utils/Child.php');
  $fields =[
    "fname" => htmlspecialchars($_POST['fname']),
    "lname" => htmlspecialchars($_POST['lname']),
    "passwordNew" => htmlspecialchars($_POST['passwordNew']),
    "weight " => htmlspecialchars($_POST['weight']),
    "height" => htmlspecialchars($_POST['height'])
  ];
  $fields_string = json_encode($fields);
  $c = curl_init ();								 
  curl_setopt ($c, CURLOPT_URL,URL);           
  curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
  curl_setopt ($c, CURLOPT_CUSTOMREQUEST,"PUT");
  curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt ($c, CURLOPT_POSTFIELDS,$fields_string);
  $res = curl_exec ($c);                           
  curl_close ($c);	
  header("Location: ../AfisareDetaliiCopil/Afisare.php");
  //$res = json_decode($res,true);
  //echo ($res);

}
?>