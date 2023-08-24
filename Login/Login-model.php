<?php
  require("../Utils/Connection.php");
  if (isset($_COOKIE["userUUID"])){
    $conn = getConnection();
    $usrUUID = $_COOKIE["userUUID"];
    $sqlAccountExists = "select count(*) from AccountParent where
            uuid like '$usrUUID'";
    $result = $conn->query($sqlAccountExists)->fetch_assoc()['count(*)'];
    if ($result != 0)
    {
      header("Location: ../ParentMain/parentMain.php");
      exit();
    }
    else 
    {
      setcookie("userUUID","",-1,"/");
    }
  }
  $good = 1;

  if (isset($_POST["login"]) and $_SERVER['REQUEST_METHOD'] == "POST")
  {
    $name = htmlspecialchars($_POST['user_name']);
    $password  = htmlspecialchars($_POST['pass']);
    define ('URL', 'http://localhost/ProiectWeb/Utils/Parent.php');
    $fields =[
      "email" => $name,
      "password" =>$password
    ];
    $fields_string = http_build_query($fields);
    $c = curl_init ();								 
    curl_setopt ($c, CURLOPT_URL,URL.'?'.$fields_string);           
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec ($c);                           
    curl_close ($c);								 
    $s = json_decode($res, true);
    $userUUID = $s["UUID"];
    if ($userUUID != "null")
      {$cookie_name = "userUUID";
      $cookie_value = $userUUID;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30) * 365, "/");
      header("Location: Login.php");
    }
  }
?>
