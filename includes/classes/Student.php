<?php
    class Student{
        private $conn;
        private $select_rec;
        
        public function __construct($conn){
            $this->conn = $conn;
            $select_rec_query = "SELECT * FROM rec_feilds";
            $select_rec = mysqli_query($conn, $select_rec_query);
            $this->select_rec = $select_rec;
        }
        
        public function studentListClassWise($std_class, $session){
            $sel_student_q = "SELECT name, fname, admission, SUM(total_fee) AS TOTAL_FEE FROM fee_deposit WHERE class = $std_class AND session = '$session' GROUP BY admission";

            $sel_student = mysqli_query($this->conn, $sel_student_q);
            $row = mysqli_num_rows($sel_student);
            $col = 1;
            $srNum = 1;

            if($row > 0){
                echo '<label for="" class="lbl full_quater_xsmall">Sr.</label>';
                echo '<label for="" class="lbl full_quater_small">Admission No.</label>';
                echo '<label for="" class="lbl full_quater_small">Total Fee Paid</label>';
                echo '<label for="" class="lbl full_quater_half">Student Name</label>';
                echo '<label for="" class="lbl full_quater_half">Father\'s Name</label>';
                echo '<label for="" class="lbl full_half">Fee Recieved Months</label>';
                echo "<hr class='slim_line' style='width:100%;'>";
                while($stdName = mysqli_fetch_array($sel_student)){
                    if($col == 1){ #for odd/even column color
                        $col++;
                    }elseif($col == 2){
                        $col--;
                    }
                    $name = $stdName['name'];
                    $fname = $stdName['fname'];
                    $admNum = $stdName['admission'];
                    $paid = $stdName['TOTAL_FEE'];

                    $months_q = "SELECT `months` from `months` WHERE admission = '$admNum' AND session = '$session' LIMIT 1";
                    $get_months = mysqli_query($this->conn, $months_q);
                    $months = mysqli_fetch_array($get_months);
                    $month = $months['months'];

                    echo "<input type='text' class='input_txt full_quater_xsmall ". "col"."$col' value='$srNum' disabled>";
                    echo "<input type='text' class='input_txt full_quater_small ". "col"."$col' value='$admNum' disabled>";
                    echo "<input type='text' class='input_txt full_quater_small ". "col"."$col' value='$paid' disabled>";
                    echo "<input type='text' class='input_txt full_quater_half ". "col"."$col' value='$name' disabled>";
                    echo "<input type='text' class='input_txt full_quater_half ". "col"."$col' value='$fname' disabled>";
                    echo "<input type='text' class='input_txt full_half ". "col"."$col' value='"."$month"."' disabled>";
                    echo "<button class='btn btn_submit full_quater_xsmall' id='btn_go' name='btn_go' onclick=window.open('print_receipts_view_single.php?admissionNumber=$admNum')>Go</button>";
                    echo "<hr class='slim_line'style='width:100%;'>";
                    $srNum++;
                }
                
            }
            else{
                echo "<input type='text' class='input_txt' style='color:red;font-weight:600;' value='Oh! Sorry No record found!'>";
            }
        }
    }
?>