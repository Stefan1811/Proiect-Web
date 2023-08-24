<?php

require ("Connection.php");
header('Content-Type: application/json');
function getUUID()
{   
    $components = parse_url($_SERVER['REQUEST_URI']);
    parse_str($components['query'], $params);

    if ($params["fname"] && $params["lname"] && $params["password"])
        {
        $firstname= $_GET["fname"];
        $lastname= $_GET["lname"];
        $password  = $_GET["password"];
        }
    else 
    {
        $toReturn =[
            'UUID' => 'null'
        ];
    }
    $conn = getConnection();
    if (mysqli_connect_errno()) {
		die ('Conexiunea a esuat...');
	}
    $sqlCommand = "select uuid from AccountChild where firstName like '$firstname'and lastName like '$lastname' and password like '$password'";
    $result = $conn->query($sqlCommand);
    if (is_null($result))
        $result = "null";
    else 
        $result = $result->fetch_assoc()['uuid'];
    $conn->close();
    $toReturn =[
        'UUID' => $result
    ];
    return json_encode($toReturn);

}

function AssignFriend()
{   
    $friendUUID = htmlspecialchars($_POST['uuid']);
    $firstname = htmlspecialchars($_POST['fnameChild']);
    $lastname = htmlspecialchars($_POST['lnameChild']);
    $relatie=htmlspecialchars($_POST['relatie']);
    if (empty($firstname) && empty($lastname) && empty($relatie))
        {
            return "0";   
        }
    if (empty($firstname) || empty($lastname) || empty($relatie))
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
          
        $stmt = "select uuid from AccountChild where firstName='$firstname' and lastName='$lastname'";
        $result = $conn->query($stmt)->fetch_assoc()['uuid'];
        if ($result == "0")
          {
            $conn->close();
            return "Nu exista in baza de date copilul cu numele si prenumele introdus";
          }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
      
          $stmt2 = "insert into junctionFriends(uuidChild1,uuidChild2,relatie) 
                         values ('$friendUUID','$result','$relatie')";
        if ($conn->query($stmt2) === TRUE) {
          } else {
            $conn->close();
            return "ok";
          }
    }

      $conn->close();
      //return "notOk";
    
}

function getAllChildren()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $kidUUID = $val['childUUID'];
    $query1 = "select acc.firstName,acc.lastName,acc.uuid,jf.relatie from AccountChild ac join junctionFriends jf on
    ac.uuid = jf.uuidChild1 join AccountChild acc on acc.uuid = jf.uuidChild2 where ac.uuid like '$kidUUID' and acc.uuid != '$kidUUID'";
    $conn = getConnection();
    $res = $conn->query($query1);
    $fields=[];
    if($res->num_rows>0)
    {
        while($row=$res->fetch_assoc())
        {
            $fields[]=$row;

        }
    }else
    {
        echo "no results found";
    }
    $conn->close();
    return (json_encode($fields));
}

function processRequest()
    {   
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'POST':
                echo(AssignFriend());
                break; 

            case 'GET':
                echo(getAllChildren());
                break;

            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>