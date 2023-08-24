<?php

require ("Connection.php");
header('Content-Type: application/json');
function AssignChild()
{   
    $parentUUID = htmlspecialchars($_POST['uuid']);
    $firstname = htmlspecialchars($_POST['fnameChild']);
    $lastname = htmlspecialchars($_POST['lnameChild']);
    $password=htmlspecialchars($_POST['password']);


    if (empty($firstname) && empty($lastname) && empty($password))
        {
            return "0";   
        }
    if (empty($firstname) || empty($lastname) || empty($password))
        {
            return "One or more fields are empty";   
        }
    else
    {
        $conn = getConnection();
         if (!preg_match("/^[A-Za-z\s'’-]+$/",$firstname))
          { return "Not a valid name format";}
         if (!preg_match("/^[A-Za-z\s'’-]+$/",$lastname))
          { return "Not a valid name format";}
          
        $stmt = "select uuid from AccountChild where firstName='$firstname' and lastName='$lastname' and password='$password'";
        $result = $conn->query($stmt)->fetch_assoc()['uuid'];
        if ($result == "0")
          {
            $conn->close();
            return "Nu exista in baza de date copilul cu numele si prenumele introdus";
          }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $stmt2 = "insert into junctionParentChild(uuidParent,uuidChild) 
                         values ('$parentUUID','$result')";
        if ($conn->query($stmt2) === TRUE) {
          } else {
            $conn->close();
            return "ok";
          }
    }

      $conn->close();
      //return "notOk";
    
}
function processRequest()
    {   
      switch ($_SERVER["REQUEST_METHOD"]) {
       
        case 'POST':
            echo(AssignChild());
            break;
        default:
            echo($_SERVER["REQUEST_METHOD"]);
            break;
            
    
    }
}

echo(processRequest());

?>
