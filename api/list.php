<?php 
ini_set("display_errors", 1); 
// include headers
header("Access-Control-Allow-Origin: *"); //it allow all origin like localhost, any domain and sub domain to access this api
header("Content-type: application/json; charset=UTF-8"); //data which we are getting inside request
header("Access-Control-Allow-Methods: GET"); // method type

include_once("config.php");

    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $sql = "SELECT * FROM tbl_students";
        $result = $conn->query($sql);
            // print_r($result);
        
            if($result->num_rows > 0){
                $student["records"] = array();
                // iterate
                while($row = $result->fetch_assoc()){
                   // print_r($row);
                   array_push($student["records"], array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "email" => $row['email'],
                    "mobile" => $row['mobile'],
                    "status" => $row['status'],
                    "created_at" => date("Y-m-d", strtotime($row['created_at']))
                   ));
                }

                http_response_code(200); //ok response
                echo json_encode(array(
                    "status" => 1,
                    "data" => $student["records"]
                ));
            }
    } else {
        http_response_code(503); // No service
        echo json_encode(array(
            "status" => 1,
            "data" => "Access Denied"
        ));
    }

?>