<?php

require ("Connection.php");
header('Content-Type: application/json');


function getAllPictures()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $kidUUID = $val["childUUID"];
    $favorites = $val['favorites'];
    $dirname = "../UserData/$kidUUID/";
    $images = glob($dirname."*");
    return (json_encode($images));

}

function getAllPictures2()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $kidUUID = $val["childUUID"];
    $favorites = $val['favorites'];
    $conn = getconnection();
    if ($favorites == 1)
    {
        $query1 = "select imagePath,timeline,imageName from savedImages where uuidChild like
                    '$kidUUID' and timeline = 1 order by dataInsert desc";
        $res = $conn->query($query1);
        $array = [];
	    while ($inreg = $res->fetch_assoc()) {
		    $array[]=$inreg;
	    }
        
        return (json_encode($array));
    }
    else
    {
        $query1 = "select imagePath,timeline,imageName from savedImages where uuidChild like
                    '$kidUUID' order  by dataInsert desc";
        $res = $conn->query($query1);
        $array = [];
	    while ($inreg = $res->fetch_assoc()) {
		    $array[]=$inreg;
	    }
        
        return (json_encode($array));
    }

}



function InsertPicture()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $name = str_replace(' ', '_', $val['name']);
    $childUUID = $val['childUUID'];
    $conn = getConnection();
    $path = $childUUID.'/'.$name;
    $query = "insert into savedImages(uuidChild,imageName,imagePath) values
                                ('$childUUID','$name','$path')";
    $res = $conn->query($query);
    $conn->close();

}

function PutFavorites()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $uuid = $val['childUUID'];
    $name = $val['name'];
    //echo($uuid.'    '.$name);
    
    $query1 = "select timeline from savedImages where uuidChild like '$uuid' and 
                            imageName like '$name'";
    $conn = getConnection();
    $res = $conn->query($query1)->fetch_assoc()['timeline'];
    
    
    if (is_null($res))
    {
        echo("Image does not exist");
    }
    else{
    if ($res == 1)
    {
        $query2= "update savedImages set timeline = 0 where imageName like '$name'";
        $conn ->query($query2);
        echo("Image deleted from favs");
    }
    else
    {
        $query2= "update savedImages set timeline = 1 where imageName like '$name'";
        $conn ->query($query2); 
        echo("Image added favs");
    }
    }   
    $conn->close();
}



function DeletePicture()
{
    $val = json_decode(file_get_contents("php://input"),true);
    $uuid = $val['childUUID'];
    $name = $val['name'];
    $conn = getConnection();
    $query = "delete from savedImages where uuidChild like '$uuid' and imageName like
              '$name'";
    $res = $conn->query($query);
    unlink("../UserData/".$uuid."/".$name);
    $conn->close();
    //return("ok");
}



function processRequestPicture()
    {   
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                echo(getAllPictures2());
                break;
            case 'POST':
                echo(InsertPicture());
                break;
            case 'DELETE':
                echo(DeletePicture());
                break;
            case 'PUT':
                echo(PutFavorites());
                break;
            default:
                echo("IDK");
                break;
                
        }
    }

echo(processRequestPicture());

?>