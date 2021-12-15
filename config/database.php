<?php 
class Database {
    // varaible declearation
    private $hostname;
    private $dbname;
    private $username;
    private $password;

    private $conn;

    public function connect(){
        // varaible initiallization
        $this->hostname = "localhost";
        $this->dbname = "rest_api_db";
        $this->username = "root";
        $this->password = "";

        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

        if($this->conn == FALSE){
            die("connection failed : " . $this->conn->connect_error);
           // print_r($this->conn->connect_error);
            exit;
        } else {
            return $this->conn;
           // echo "connected successfully!";
            //print_r($this->conn);
        }
    }
}

// $db = new Database();

// $db->connect();
?>