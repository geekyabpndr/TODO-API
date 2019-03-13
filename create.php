<?php
    include('db_connect.php');
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    parse_str(file_get_contents("php://input"),$content);
    $caption = $content['caption'];
    
    if($caption!=''){
            $query = $con->query("INSERT INTO tasks (caption, is_completed) VALUES ('$caption','0')") or die(mysqli_error($con));
            echo "{";
            echo '"message":"Item created"';
            echo "}";
    }
    else{
        echo "{";
        echo '"message":"Item not updated"';
        echo "}";
    }
?>