<?php
ini_set("display_errors", 1); 
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

        $data = $student->get_all_data();
        //print_r($data);
        if($data->num_rows > 0){
            // fetch data fom the database
            $students["records"] = array();
            // iterate
            while($row = $data->fetch_assoc()){
                //print_r($row);
                array_push($students['records'], array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "email" => $row['email'],
                    "mobile" => $row['mobile'],
                    "status" => $row['status'],
                    "created_at" => date("Y-m-d", strtotime($row['created_at']))
                ));
            }
            http_response_code(200); // ok response
            echo json_encode(array(
                "status" => 1,
                "data" => $students['records']
            ));
        }

    } else{
        //echo "Access Denied";
        http_response_code(503);
        echo json_encode(array(
            "status" => 0,
            "message" => "Access Denied"
        ));
    }
?>