
<?php 
    class Student{
        // declare variable
        public $name;
        public $email;
        public $mobile;
        public $id;

        private $conn; // database connection
        private $table_name; //table name

        public function __construct($db){
            $this->conn = $db;
            $this->table_name = "tbl_students";
        }

        public function create_data(){
            // sql qeury to insert data
        // $query = "INSERT INTO". $this->table_name."
            // SET name = ?, email = ?, mobile = ?";
            $query = "INSERT INTO $this->table_name (name, email, mobile) VALUES (?, ?, ?)";
            // prepare the sql
            $obj = $this->conn->prepare($query);
            
            // sanitize input variable => basically removes the extra
            // characters like some special symbols as well as if some tags available in input values
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->mobile = htmlspecialchars(strip_tags($this->mobile));
 
            $obj->bind_param("sss", $this->name, $this->email, $this->mobile);

            if($obj->execute()){ //executing query
                return true;
            } else {
                return false;
            }
        }

        // get all data
        public function get_all_data(){
            $sql_query = "SELECT * FROM $this->table_name";

            $std_obj = $this->conn->prepare($sql_query); //prepare statement

            // execute the query
            $std_obj->execute();
            return $std_obj->get_result();
        }

        // get data for single student
        public function get_data_single(){
            $sql_query = "SELECT * FROM $this->table_name WHERE id = ?";
            // $sql_query = "SELECT * from ".$this->table_name. "WHERE id = ?";

            $obj = $this->conn->prepare($sql_query);

            $obj->bind_param("i", $this->id);
            // bind parameter with prepared statement

            $obj->execute();

            $data = $obj->get_result();
            return $data->fetch_assoc();
        }

        public function Update_Student(){
            $update_query = "UPDATE tbl_students SET name = ?, email = ?, mobile = ? WHERE id = ?";
            $result_query = $this->conn->prepare($update_query);

            // sanitizing the input
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->mobile = htmlspecialchars(strip_tags($this->mobile));
            $this->id = htmlspecialchars(strip_tags($this->id));     
            
            // bind the parameters with the prepared statement
            $result_query->bind_param("sssi", $this->name, $this->email, $this->mobile, $this->id);
            // execute the query
            if($result_query->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function Delete_Student(){
            $delete_query = "DELETE FROM tbl_students WHERE id = ?";
            // prepare query
            $result_delete = $this->conn->prepare($delete_query);
            // sanitize input id
            $this->id = htmlspecialchars(strip_tags($this->id)); 
            // bind the parameter with prepare statement
            $result_delete->bind_param("i", $this->id);

            // execute the query
            if($result_delete->execute()){
                return true;
            } else {
                return false;
            }
           
        }
    }
    ?>