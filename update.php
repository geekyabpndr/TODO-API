<?php
    include('db_connect.php');
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    parse_str(file_get_contents("php://input"), $content);
    $caption = $content['caption'];
    $id = $content['id'];

    if($caption != ''){
            $query = $con->query("UPDATE tasks SET caption='$caption' WHERE id='$id'") or die(mysqli_error($con));
            echo "{";
            echo '"message":"Item updated"';
            echo "}";
    }
    else{
        echo "{";
        echo '"message":"Item not updated"';
        echo "}";
    }
?>