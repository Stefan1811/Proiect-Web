<?php

require ("Connection.php");
header('Content-Type: application/json');


function AddVisit()
{   
    $kidUUID = htmlspecialchars($_POST['uuid']);
    $visitDesc = htmlspecialchars($_POST['visitDesc']);

    if (empty($visitDesc))
        {
            return "0";   
        }
    if (empty($visitDesc))
        {
            return "One or more fields are empty";   
        }
    else
    {
        $conn = getConnection();
        if (!preg_match("/^[A-Za-z\s'’-]+$/",$visitDesc))
          { return "Not a valid number format";}
         
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $stmt2 = "insert into medicalhistory (visitDescription,uuidChild) 
                         values ('$visitDesc','$kidUUID')";
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
                echo(AddVisit());
                break; 


            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>