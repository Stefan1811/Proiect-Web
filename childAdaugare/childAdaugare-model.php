<?php

require "../Utils/Connection.php";
if (isset($_POST["addChild"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  define ('URL', 'http://localhost/ProiectWeb/Utils/CopilParinte.php');
  $fields =[
    "fnameChild" => htmlspecialchars($_POST['fname']),
    "lnameChild" => htmlspecialchars($_POST['lname']),
    "password"=>htmlspecialchars($_POST['password']),
    "uuid"=>$_COOKIE['userUUID']
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
  //header("Location: ../ParentMain/parentMain.php");
  
}

?>