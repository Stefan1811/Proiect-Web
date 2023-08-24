<?php

require ("Connection.php");
header('Content-Type: application/json');


function AddSomn()
{   
    $kidUUID = htmlspecialchars($_POST['uuid']);
    $somnDesc = htmlspecialchars($_POST['somnDesc']);

    if (empty($somnDesc))
        {
            return "0";   
        }
    if (empty($somnDesc))
        {
            return "One or more fields are empty";   
        }
    else
    {
        $conn = getConnection();
        if (!preg_match("/^[0-9]+$/", $somnDesc))
          { return "Not a valid number format";}
         
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $stmt2 = "insert into oredesomn (numarOreSomn,uuidChild) 
                         values ('$somnDesc','$kidUUID')";
        if ($conn->query($stmt2) === TRUE) {
          } else {
            $conn->close();
            return "ok";
          }
    }

      $conn->close();

    
}



function processRequest()
    {   
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'POST':
                echo(AddSomn());
                break; 

         
            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>