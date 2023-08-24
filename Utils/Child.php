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

function InsertIntoDatabase(){
    
    $firstname = htmlspecialchars($_POST['fname']);
    $lastname = htmlspecialchars($_POST['lname']);
    $password = htmlspecialchars($_POST['password']);
    $dateofbirth=htmlspecialchars(($_POST['date']));
    $sex=htmlspecialchars(($_POST['sex']));
    $weight=htmlspecialchars($_POST['weight']);
    $height=htmlspecialchars($_POST['height']);
    
    if (empty($firstname) && empty($lastname) && empty($password) && empty($dateofbirth) &&  empty($sex)
    && empty($weight) && empty($height) )
        {
            return "0";   
        }
    if (empty($firstname) || empty($lastname) || empty($password) || empty($dateofbirth) || empty($sex)
    || empty($weight) || empty($height))
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
        
        $stmt = "select count(*) from AccountChild where firstName='$firstname' and lastName='$lastname'";
        $result = $conn->query($stmt)->fetch_assoc()['count(*)'];
        if ($result != "0")
          {
            $conn->close();
            return "Account already in the database";
          }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
          $stmt2 = "insert into AccountChild(firstName,lastName,password,dateOfBirth,sex,weight,height) 
                         values ('$firstname','$lastname','$password','$dateofbirth','$sex','$weight','$height')";
        if ($conn->query($stmt2) === TRUE) {
          } else {
            $conn->close();
            return json_encode(array("good"=>"Error at inserting into the database"));
          }
    }

    $stmt3 = "select uuid from AccountChild where firstname like '$firstname' and lastname like '$lastname' and password
                like '$password'";
    $childUUID = $conn->query($stmt3)->fetch_assoc()['uuid'];
    $root = $_SERVER["DOCUMENT_ROOT"];
    $dir = $root.'/ProiectWeb/UserData/'.$childUUID.'/';
    mkdir($dir,0755,true);
    $conn->close();
    return  "ok";
    }

function DeleteAccount()
{
    $components = parse_url($_SERVER['REQUEST_URI']);
    parse_str($components['query'], $params);
    if ($params["childUUID"])
    {
        $childUUID = $_GET["childUUID"];
        $deleteConnections = "delete from junctionParentChild where uuidChild like '$childUUID'";
        $deleteAccount = "delete from AccountChild where uuid like '$childUUID'";
        $conn = getConnection();
        $conn->query($deleteConnections);
        $conn->query($deleteAccount);
        echo("succes");
    }
    else 
    {
        $childUUID = "null";
        echo("fail");
    }
    
}


function getAllChildren()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $parentUUID = $val['parentUUID'];

    $query1 = "select ac.firstName,ac.lastName,ac.uuid from AccountChild ac join junctionParentChild jpc on
                ac.uuid = jpc.uuidChild join AccountParent ap on ap.uuid = jpc.uuidParent where ap.uuid like '$parentUUID'";
    $conn = getConnection();
    $res = $conn->query($query1);
    $array = [];
	while ($inreg = $res->fetch_assoc()) {
		$array[]=$inreg;
	}

    return (json_encode($array));

}



function ChangeChildInfo()
{

    $val = json_decode(file_get_contents("php://input"),true);

    $fname = $val['fname'];
    $lname = $val['lname'];
    $newpassword = $val['passwordNew'];
    $weight = $val['weight'];
    $height=$val['height'];
    $query = "select uuid from AccountChild where firstName like '$fname'
              and lastName like '$lname'";
    $conn = getConnection();
    $res = $conn->query($query)->fetch_assoc()['uuid'];
    if (empty($res))
    {
        return (json_encode(array("ok"=>false,"message"=>"First name or Last name do not match")));
    }
    else
    {
        $queryReplace = "update AccountChild set password = '$newpassword', weight ='$weight', height='$height'
        where uuid like '$res'";
        $conn->query($queryReplace);
    }
    $conn->close();

    return (json_encode(array("ok"=>true,"message"=>$res)));
}


function processRequest()
    {   
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                echo(getAllChildren());
                break;
            case 'POST':
                echo(InsertIntoDatabase());
                break;
            case 'PUT':
                echo(ChangeChildInfo());
                break;
            case 'DELETE':
                echo(DeleteAccount());
                break;
            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>