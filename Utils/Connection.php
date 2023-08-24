<?php
function getConnection(){
$servername = "localhost";
$username = "root";
$passworddb = ""; 
$dbname = "Web";

return new mysqli($servername, $username, $passworddb, $dbname);

}
?>