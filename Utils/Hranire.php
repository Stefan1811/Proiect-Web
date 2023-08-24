<?php

require ("Connection.php");
header('Content-Type: application/json');




function getFood()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $kidUUID = $val['childUUID'];
    $query1 = "select masa,dataHranire from istorichranire where uuidChild like '$kidUUID' order by dataHranire DESC";
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
                echo(getFood());
                break;

            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>