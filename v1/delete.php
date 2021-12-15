<?php 
// include headers
header("Access-Control-Allow-Origin: *"); //it allow all origin like localhost, any domain and sub domain to access this api
header("Content-type: application/json; charset=UTF-8"); //data which we are getting inside request
header("Access-Control-Allow-Methods: GET"); // method type

// include database
include_once("../config/database.php");
// include student.php
include_once("../classes/student.php");

$db = new Database();
$connection = $db->connect();

$student = new Student($connection);

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $student_id = isset($_GET['id']) ? $_GET['id'] : "";

        if(!empty($student_id)){
            $student->id = $student_id;

            if($student->Delete_Student()){
            http_response_code(200); // service ok
            echo json_encode(array(
                "status" => 1,
                "message" => "Successfully Deleted"
        ));
            } else {
                http_response_code(500); // service error
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to delete data"
                ));
            }

        } else {
            http_response_code(404); // data not found
            echo json_encode(array(
                "status" => 0,
                "message" => "data not found"
            ));
        }
    
    } else {
        http_response_code(503); // service unavailable
        echo json_encode(array(
            "status" => 0,
            "message" => "service unavailable"
        ));
    }
?>