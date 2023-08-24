<?php

require "../Utils/Connection.php";
function make(){
if (isset($_POST["create"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  define ('URL', 'http://localhost/ProiectWeb/Utils/Parent.php');
  $fields =[
    "email" => htmlspecialchars($_POST['email']),
    "password" => htmlspecialchars($_POST['password']),
    "password1" => htmlspecialchars($_POST['password1']),
    "firstName" => htmlspecialchars($_POST['firstName']),
    "lastName" => htmlspecialchars($_POST['lastName'])
  ];
  $fields_string = json_encode($fields);
  $c = curl_init ();								 
  curl_setopt ($c, CURLOPT_URL,URL);           
  curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
  curl_setopt ($c, CURLOPT_POST, 1);
  curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt ($c, CURLOPT_POSTFIELDS,$fields_string);
  $res = curl_exec ($c);                           
  curl_close ($c);	
  $res = json_decode($res,true);

  if ($res["status"] == "ok") 
  { 
    setcookie("userUUID",'',-1,'/');
    setcookie("userUUID",$res["userUUID"],time() + (86400 * 30) * 365, "/");
    header("Location: ../Login/Login.php");
  }
  else 
  {
    return $res["message"];
  }
}
}
?>