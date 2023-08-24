<?php

require "../Utils/Connection.php";
if (isset($_POST["create"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  define ('URL', 'http://localhost/ProiectWeb/Utils/Child.php');
  $fields =[
    "fname" => htmlspecialchars($_POST['fname']),
    "lname" => htmlspecialchars($_POST['lname']),
    "password" => htmlspecialchars($_POST['password']),
    "date"=>htmlspecialchars($_POST['date']),
    "sex"=>htmlspecialchars($_POST['gender']),
    "weight"=>htmlspecialchars($_POST['weight']),
    "height"=>htmlspecialchars($_POST['height'])
   
  ];
  $fields_string = http_build_query($fields);
  $c = curl_init ();								 
  curl_setopt ($c, CURLOPT_URL,URL);           
  curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
  curl_setopt ($c, CURLOPT_POST, 1);
  curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt ($c, CURLOPT_POSTFIELDS,$fields_string);
  $res = curl_exec ($c);                           
  curl_close ($c);	
  //$res = json_decode($res,true);
}

?>