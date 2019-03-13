<?php
    include('db_connect.php');
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    parse_str(file_get_contents("php://input"),$content);
    $id = $content['id'];
            $query = $con->query("UPDATE tasks SET is_completed=(is_completed + 1)%2 WHERE id='$id'") or die(mysqli_error($con));
            echo "{";
            echo '"message":"Item updated"';
            echo "}";
?>