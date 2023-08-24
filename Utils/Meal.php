<?php

require ("Connection.php");
header('Content-Type: application/json');


function AddMeal()
{   
    $kidUUID = htmlspecialchars($_POST['uuid']);
    $mealDesc = htmlspecialchars($_POST['mealDesc']);

    if (empty($mealDesc))
        {
            return "0";   
        }
    if (empty($mealDesc))
        {
            return "One or more fields are empty";   
        }
    else
    {
        $conn = getConnection();
         if (!preg_match("/^[A-Za-z\s'’-]+$/",$mealDesc))
          { return "Not a valid name format";}
         
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $stmt2 = "insert into istorichranire(masa,uuidChild) 
                         values ('$mealDesc','$kidUUID')" ;
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
                echo(AddMeal());
                break; 

            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>