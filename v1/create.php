<?php 
// include headers
header("Access-Control-Allow-Origin: *"); //it allow all origin like localhost, any domain and sub domain to access this api
header("Content-type: application/json; charset=UTF-8"); //data which we are getting inside request
header("Access-Control-Allow-Methods: POST"); // method type

// include database
include_once("../config/database.php");
// include student.php
include_once("../classes/student.php");

$db = new Database();
$connection = $db->connect();

$student = new Student($connection);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = json_decode(file_get_contents("php://input"));
    //print_r($data);die;

    if(!empty($data->name) && !empty($data->email) && !empty($data->mobile)){ 
         // success data
    $student->name = $data->name;
    $student->email = $data->email;
    $student->mobile = $data->mobile;

    if($student->create_data()){
        http_response_code(200); //200 means ok
        echo json_encode(array(
            "status" => 1,
            "message" => "Student has been succefully created"
        ));        
    } 
    else {
        http_response_code(500); //500 means internal server error
        echo json_encode(array(
            "status" => 0,
            "message" => "Failed to create student"
        ));
    }

    } 
    else {
        //echo "Access Denied";
        http_response_code(404); //404 means service unavailable
        echo json_encode(array(
            "status" => 0,
            "message" => "All value needed"
        ));
    }
   
} else {
    //echo "Access Denied";
    http_response_code(503); //503 means service unavailable
    echo json_encode(array(
        "status" => 0,
        "message" => "Access Denied"
    ));
}
?>