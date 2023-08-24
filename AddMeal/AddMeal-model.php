<?php

require "../Utils/Connection.php";
if (isset($_POST["addMeal"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  define ('URL', 'http://localhost/ProiectWeb/Utils/Meal.php');
  $fields =[
    "mealDesc" => htmlspecialchars($_POST['meal']),
    "uuid"=>$_COOKIE['kidUUID']
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
  
  
}
