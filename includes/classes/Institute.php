<?php
    class Institute{
        private $conn;
        private $select_inst;
        
        public function __construct($conn){
            $this->conn = $conn;
            $select_inst_query = "SELECT * FROM institute";
            $select_inst = mysqli_query($conn, $select_inst_query);
            $this->select_inst = $select_inst;
        }
        public function showInstData(){
            $row = mysqli_num_rows($this->select_inst);
            if($row > 0){
                $inst = mysqli_fetch_array($this->select_inst);
                return $inst;
            }
            else{
                echo "<div class='error'><b>No Institute is registered.</b><br>Please contact your web/software developer.</div>";
            }
        }
    }
?>