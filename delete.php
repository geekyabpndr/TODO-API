<?php
    include('db_connect.php');
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    parse_str(file_get_contents("php://input"), $content);

    $id = $content['id'];

    if($id != ''){
            $query = $con->query("DELETE FROM tasks WHERE id='$id'") or die(mysqli_error($con));
            echo "{";
            echo '"message":"Item Deleted"';
            echo "}";
    }
    else{
        $query = $con->query("DELETE FROM tasks WHERE 1") or die(mysqli_error($con));
        echo "{";
        echo '"message":"All Item Deleted"';
        echo "}";
    }
?>