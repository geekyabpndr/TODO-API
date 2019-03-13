<?php
    include('db_connect.php');
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    $id = $_GET['id'];

    if(!is_null($id)){
        $task_arr = array();
        $result = $con->query("SELECT * FROM tasks WHERE id='$id'") or die(mysqli_error($con));
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            array_push($task_arr,["id"=>$row['id'],
                                "caption"=>$row['caption'],
                                "is_completed"=>$row['is_completed']
                                ]);
            echo json_encode($task_arr);
        }
        else{
            echo "{'message':'no such item exist'}";
        }
    }
    else{
        $task_arr = array();
        $result = $con->query("SELECT * FROM tasks") or die(mysqli_error($con));
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($task_arr,["id"=>$row['id'],
                                    "caption"=>$row['caption'],
                                    "is_completed"=>$row['is_completed']
                                    ]);
            }
            echo json_encode($task_arr);
        }
        else{
            echo "{'message':'no data availble, empty task list'}";
        }
    }
?>