<?php
    unset($_COOKIE["UserPassword"]);
    unset($_COOKIE["UserName"]);
    header('Location: ../Login/Login.php'); 
?>