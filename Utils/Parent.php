<?php

require ("Connection.php");
header('Content-Type: application/json');
function getUUIDParent()
{   
    $components = parse_url($_SERVER['REQUEST_URI']);
    parse_str($components['query'], $params);

    if ($params["email"] && $params["password"])
        {
        $email = $_GET["email"];
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
    $sqlCommand = "select uuid from AccountParent where email like '$email' and password like '$password'";
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

function InsertIntoDatabaseParent(){
    $val = json_decode(file_get_contents("php://input"),true);

    $email = $val['email'];
    $password = $val['password'];
    $password1 = $val['password1'];
    $firstName = $val['firstName'];
    $lastName = $val['lastName'];
    if (empty($email) && empty($password) && empty($firstName) &&
        empty($lastName))
        {
            return json_encode(array("status"=>"notOK","message"=>"All fields are empty"));   
        }
    if (empty($email) || empty($password) || empty($firstName) ||
        empty($lastName))
        {
            return json_encode(array("status"=>"notOK","message"=>"One or more fields are empty"));   
        }
    
    else 
    {
        $conn = getConnection();
         if (!preg_match("/@/",$email))
          { return json_encode(array("status"=>"notOK","message"=>"Not a valid email format"));}
        if ($password != $password1)
          { return json_encode(array("status"=>"notOK","message"=>"Passwords not matching"));}
        $searchEmail = "select count(*) from AccountParent where email = '$email'";
        $result = $conn->query($searchEmail)->fetch_assoc()['count(*)'];
        if ($result != "0")
          {
            $conn->close();
            return json_encode(array("status"=>"notOK","message"=>"Account already exists"));
          }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $sqlAccData = "insert into AccountParent(email,password,firstName,lastName) 
                         values ('$email','$password','$firstName','$lastName')";
        if ($conn->query($sqlAccData) === TRUE) {
          } else {
            //echo "Error: " . $sqlAccData . "<br>" . $conn->error;
            $conn->close();
            return json_encode(array("status"=>"notOK","message"=>"Error inserting int othe database"));
          }
    }
      $sqlAccData = "select uuid from AccountParent where email like '$email' and password like '$password'";
      $userUUID = $conn->query($sqlAccData)->fetch_assoc()['uuid'];  
      $cookie_name = "userUUID";
      $cookie_value = $userUUID;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30) * 365, "/");
      $conn->close();
      return json_encode(array("status"=>"OK","message"=>"OK"));
    }

function DeleteAccountParent()
{   
    $val = json_decode(file_get_contents("php://input"),true);
    $userUUID = $val['userUUID'];
    if ($userUUID)
    {
        
        $deleteConnections = "delete from junctionParentChild where uuidParent like '$userUUID'";
        $deleteAccount = "delete from AccountParent where uuid like '$userUUID'";
        $conn = getConnection();
        $conn->query($deleteConnections);
        $conn->query($deleteAccount);
        setcookie("userUUID", "", time() - 1, "/");
        echo("succes");
    }
    else 
    {
        $userUUID = "null";
        echo("fail");
    }
    
}

function ChangePasswordParent()
{

    $val = json_decode(file_get_contents("php://input"),true);

    $email = $val['email'];
    $password = $val['password'];
    $passwordNew = $val['passwordNew'];
    $passwordNew1 = $val['passwordNew1'];
    if ($passwordNew != $passwordNew1)
    {
        return (json_encode(array("ok"=>false,"message"=>"New passwords not matching")));
    }
    $query = "select uuid from AccountParent where email like '$email'
              and password like '$password'";
    $conn = getConnection();
    $res = $conn->query($query)->fetch_assoc()['uuid'];
    if (empty($res))
    {
        return (json_encode(array("ok"=>false,"message"=>"Email or password do not match")));
    }
    else
    {
        $queryReplace = "update AccountParent set password = '$passwordNew'
        where uuid like '$res'";
        $conn->query($queryReplace);
    }
    $conn->close();

    return (json_encode(array("ok"=>true,"message"=>$res)));
}



function processRequestParent()
    {   
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                echo(getUUIDParent());
                break;
            case 'POST':
                echo(InsertIntoDatabaseParent());
                break;
            case 'PUT':
                echo(ChangePasswordParent());
                break;
            case 'DELETE':
                echo(DeleteAccountParent());
                break;
            default:
                echo("IDK");
                break;
                
        }
    }

echo(processRequestParent());

?>