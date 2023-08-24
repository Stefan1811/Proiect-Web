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



function getSomn()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $kidUUID = $val['childUUID'];
    $query1 = "select numarOreSomn,dataSomn from oredesomn where uuidChild like '$kidUUID' order by dataSomn DESC";
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
            case 'GET':
                echo(getSomn());
                break;

            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>