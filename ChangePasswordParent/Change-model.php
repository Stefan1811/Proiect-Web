<?php

require "../Utils/Connection.php";
if (isset($_POST["change"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  define ('URL', 'http://localhost/ProiectWeb/Utils/Parent.php');
  $fields =[
    "email" => htmlspecialchars($_POST['email']),
    "password" => htmlspecialchars($_POST['password']),
    "passwordNew" => htmlspecialchars($_POST['passwordNew']),
    "passwordNew1" => htmlspecialchars($_POST['passwordNew1'])
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
  //$res = json_decode($res,true);
  //echo ($res);

}
?>