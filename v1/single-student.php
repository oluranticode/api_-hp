<?php
 ini_set("display_errors", 1);            
// include headers
header("Access-Control-Allow-Origin: *"); //it allow all origin like localhost, any domain and sub domain to access this api
// passing json data or data type while calling this api
header("Content-type: application/json; charset=UTF-8"); //data which we are getting inside request
header("Access-Control-Allow-Methods: POST"); // method type

// include database
include_once("../config/database.php");
// include student.php
include_once("../classes/student.php");

$db = new Database();
$connection = $db->connect();

$student = new Student($connection);

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $param = json_decode(file_get_contents("php://input"));
        if(!empty($param->id)){
            $student->id = $param->id;
            $student_data = $student->get_data_single();
            // print_r($student_data);
            if(!empty($student_data)){
                http_response_code(200); //ok response
                echo json_encode(array(
                    "status" => 1,
                    "message" => $student_data
                ));
            } else {
                http_response_code(404); //ok response
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Student Not Found"
                ));
            } 
        }

    } else {
        http_response_code(503); // service unavailable
        echo json_encode(array(
            "status" => 0,
            "message" => "Accesss denied"
        ));
    }
?>