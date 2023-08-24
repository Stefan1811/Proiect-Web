<?php

require ("Connection.php");
header('Content-Type: application/json');



function getMedHistory()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $kidUUID = $val['childUUID'];
    $query1 = "select visitDescription,dataInsert from medicalhistory where uuidChild like '$kidUUID' order by dataInsert DESC";
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
                echo(getMedHistory());
                break;

            default:
                echo($_SERVER["REQUEST_METHOD"]);
                break;
                
        }
    }
echo(processRequest());
?>