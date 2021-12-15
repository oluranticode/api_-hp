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

    if(!empty($data->name) && !empty($data->email) && !empty($data->mobile) && !empty($data->id)){
    $student->name = $data->name;
    $student->email = $data->email;
    $student->mobile = $data->mobile;
    $student->id = $data->id;

    if($student->Update_Student()){
        http_response_code(200); // service ok
        echo json_encode(array(
            "status" => 1,
            "message" => "Successfully updated"
        ));
    } else {
        http_response_code(500); // service error
        echo json_encode(array(
            "status" => 0,
            "message" => "Failed gto update data"
        ));
    }

    } else {
        http_response_code(404); // data not found
        echo json_encode(array(
            "status" => 0,
            "message" => "All fields are needed"
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