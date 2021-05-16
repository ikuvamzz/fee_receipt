<?php
    class FeeStructure{
        private $conn;
        private $select_class;
        
        public function __construct($conn){
            $this->conn = $conn;
            $select_class_query = "SELECT * FROM fee_structure ORDER BY class ASC";
            $select_class = mysqli_query($conn, $select_class_query);
            $this->select_class = $select_class;
        }
        public function showAllFeeStructure(){
            $select_class_query = "SELECT * FROM fee_structure ORDER BY class ASC";
            $select_class = mysqli_query($this->conn, $select_class_query);
            $this->select_class = $select_class;
            $row = mysqli_num_rows($this->select_class);
            echo '<div class="" style="width:100%;color:lightblue;text-shadow:0px 0px 10px black;text-align:center;">';
            echo '<label for="" class="lbl full_third_half" style="margin: 5px 2px">Class</label>';
            echo '<label for="" class="lbl full_quater_half">Admission Fee</label>';
            echo '<label for="" class="lbl full_quater_half">Monthly Fee</label>';
            echo '<label for="" class="lbl full_quater_half">Sports Fund</label>';
            echo '<label for="" class="lbl full_quater_small">Building Fund</label>';
            echo '<label for="" class="lbl full_quater_small">Generator Fund</label>';
            echo '<label for="" class="lbl full_quater_small">Computer Fee</label>';
            echo '<label for="" class="lbl full_quater_small">Misc. Fee</label>';
            echo '<label for="" class="lbl full_quater_small">Total Monthly Fee</label>';
            echo '<label for="" class="lbl full_quater_small" style="color:red;text-shadow:0 0 5px black;">Total Annual Fee</label>';
            echo "</div><br>";
            echo '<hr class="slim_line" style="min-width:100%";margin-left:-10px;>';

            if($row > 0){
                while ($class_fee = mysqli_fetch_array($this->select_class)){
                    $class = $class_fee['class'];
                    switch($class){
                        case 0: $class = "Nur/LKG/UKG";
                        break;
                        case 1: $class = "1st";
                        break;
                        case 2: $class = "2nd";
                        break;
                        case 3: $class = "3rd";
                        break;
                        case 4: $class = "4th";
                        break;
                        case 5: $class = "5th";
                        break;
                        case 6: $class = "6th";
                        break;
                        case 7: $class = "7th";
                        break;
                        case 8: $class = "8th";
                        break;
                        case 9: $class = "9th";
                        break;
                        case 10: $class = "10th";
                        break;
                        case 11: $class = "11th";
                        break;
                        case 12: $class = "12th";
                        break;
                    }
                    $admission = $class_fee['admission'];
                    $monthly = $class_fee['monthly'];
                    $sports = $class_fee['sports'];
                    $building = $class_fee['building'];
                    $generator = $class_fee['generator'];
                    $computer = $class_fee['computer'];
                    $other = $class_fee['other'];
                    $total = $class_fee['total'];
                    $grand_total = (($monthly + $sports + $building + $generator + $computer + $other) * 12) + $admission;
                    echo "<div class='' style=''>";
                    echo "
                    <input type='text' class='input_txt input_small full_third_half' value='$class' name='class' disabled>
                    <input type='number' class='input_txt input_small full_quater_half value adm_fee' value='$admission' name='admission' min='0'disabled>
                    <input type='number' class='input_txt input_small full_quater_half value mon_fee' value='$monthly' name='monthly' min='0'disabled>
                    <input type='number' class='input_txt input_small full_quater_half value spo_fee' value='$sports' name='sports' min='0'disabled>
                    <input type='number' class='input_txt input_small full_quater_small value bld_fee' value='$building' name='building' min='0'disabled>
                    <input type='number' class='input_txt input_small full_quater_small value gen_fee' value='$generator' name='generator' min='0'disabled>
                    <input type='number' class='input_txt input_small full_quater_small value com_fee' value='$computer' name='computer' min='0'disabled>
                    <input type='number' class='input_txt input_small full_quater_small value oth_fee' value='$other' name='other' min='0'disabled>
                    <input type='number' class='input_txt input_small full_quater_small total_value' value='$total' name='total' min='0' disabled>
                    <input type='number' class='input_txt input_small full_quater_small grand_total' value='$grand_total' name='grand_total' min='0' style='color:red;text-shadow:0 0 5px white;' disabled>
                    ";
                    echo '<hr class="slim_line" style="min-width:100%;margin-left:-10px;">';
                }
                echo '<span style="text-transform:capitalize;text-shadow:0px 0px 5px black;padding-bottom:20px;font-weight:600;">**In Total Annual Fee, the \'Total Monthly fees\' is multiplied by 12 and added to admission fee (i.e. <u>'. $total .' X 12 + '. $admission .' = '. (($total*12) + $admission) .'</u>)</span>';
                echo '<button type="" class="btn_submit btn full_half" name="back_btn" >Back</button>';
                echo '<button type="" class="btn_home btn full_half" name="home_btn" >Home</button>';
            }
            else{
                echo '<span class="error"><b>No fee structure found!</b><br> Please go back add new fee structure by selecting each class.</span>';
            }
            echo "</div>";
        }

        public function showClassFeeStructure($selected_class){
            $select_class_query = "SELECT * FROM fee_structure WHERE class='$selected_class'";
            $select_class = mysqli_query($this->conn, $select_class_query);
            $this->select_class = $select_class;
            $row = mysqli_num_rows($this->select_class);
            echo '<div class="" style="width:100%;color:lightblue;text-shadow:0px 0px 10px black;text-align:center;">';
            echo '<label for="" class="lbl full_third_half" style="margin: 5px 2px">Class</label>';
            echo '<label for="" class="lbl full_quater_half">Admission Fee</label>';
            echo '<label for="" class="lbl full_quater_half">Monthly Fee</label>';
            echo '<label for="" class="lbl full_quater_half">Sports Fund</label>';
            echo '<label for="" class="lbl full_quater_small">Building Fund</label>';
            echo '<label for="" class="lbl full_quater_small">Generator Fund</label>';
            echo '<label for="" class="lbl full_quater_small">Compupter Fee</label>';
            echo '<label for="" class="lbl full_quater_small">Misc. Fee</label>';
            echo '<label for="" class="lbl full_quater_small">Total Monthly Fee</label>';
            echo '<label for="" class="lbl full_quater_small" style="color:red;" style="color:red;text-shadow:0 0 5px white;">Total Annual Fee</label>';
            echo "</div><br>";
            echo "<hr class='slim_line' style='min-width:90%;margin-left:-10px;'>";

            if($row > 0){
                while ($class_fee = mysqli_fetch_array($this->select_class)){
                    $class = $class_fee['class'];
                    $admission = $class_fee['admission'];
                    $monthly = $class_fee['monthly'];
                    $sports = $class_fee['sports'];
                    $building = $class_fee['building'];
                    $generator = $class_fee['generator'];
                    $computer = $class_fee['computer'];
                    $other = $class_fee['other'];
                    $total = $class_fee['total'];
                    $grand_total = (($monthly + $sports + $building + $generator + $computer + $other) * 12) + $admission;
                    
                    echo "<div class='' style=''>";
                    echo "
                    <input type='text' class='input_txt input_small full_third_half' value='";num_alpha_class($class); echo"' name='class' disabled>
                    <input type='number' class='input_txt input_small full_quater_half value adm_fee' value='$admission' placeholder='Admission Fee' name='admission' min='0'>
                    <input type='number' class='input_txt input_small full_quater_half value mon_fee' value='$monthly' placeholder='Monthly Fee' name='monthly' min='0'>
                    <input type='number' class='input_txt input_small full_quater_half value spo_fee' value='$sports' placeholder='Sports Fee' name='sports' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value bld_fee' value='$building' placeholder='Building Fee' name='building' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value gen_fee' value='$generator' placeholder='Generator Fee' name='generator' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value com_fee' value='$computer' placeholder='Computer Fee' name='computer' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value oth_fee' value='$other' placeholder='Other/Misc. Fee' name='other' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small total_value' value='$total' name='total' min='0' disabled>
                    <input type='number' class='input_txt input_small full_quater_small grand_total' value='$grand_total' name='grand_total' min='0' style='color:red;text-shadow:0 0 5px white;' disabled><br>
                    ";
                    if($total != '0'){
                        echo '<span style="text-transform:capitalize;text-shadow:0px 0px 5px black;padding-bottom:20px;font-weight:600;">**In Total Annual Fee, the \'Total Monthly fees\' is multiplied by 12 and added to admission fee (i.e. <u>'. $total .' X 12 + '. $admission .' = '. (($total*12) + $admission) .'</u>)</span>';
                    }
                    echo '<div style="width:100%;margin-top:30px;">';
                    echo '<button type="" class="btn_submit btn full_half" name="update_btn" >Update</button>';
                    echo '<button type="" class="btn_back btn full_half" name="back_btn" >Back</button>';
                    echo '</div>';

                    if(isset($_POST['update_btn'])){
                        $admission_fee = $_POST['admission'];
                        $monthly_fee = $_POST['monthly'];
                        $sports_fee = $_POST['sports'];
                        $building_fee = $_POST['building'];
                        $generator_fee = $_POST['generator'];
                        $computer_fee = $_POST['computer'];
                        $other_fee = $_POST['other'];
                        $total_fee = 0;

                        if($admission != 0 || $monthly_fee != 0){
                            $total_fee += $monthly_fee;
                            $total_fee += $sports_fee;
                            $total_fee += $building_fee;
                            $total_fee += $generator_fee;
                            $total_fee += $computer_fee;
                            $total_fee += $other_fee;
                            $update_fee_sturcture_q = "UPDATE fee_structure SET admission = '$admission_fee', monthly = '$monthly_fee', sports = '$sports_fee', building = '$building_fee', generator = '$generator_fee', computer = '$computer_fee', other = '$other_fee', total = '$total_fee' WHERE class = $selected_class";

                            $update_fee_structure = mysqli_query($this->conn, $update_fee_sturcture_q);

                            $_SESSION['class'] = $_POST['class'];
                            $class = $_SESSION['class'];
                            echo '<span style="top:65px;" class="error success"><b>Congrats!</b> Fee Structure updated successfully.</span>';
                            echo "<div class='loading'><img src='includes/images/loading/loading4.gif'></div>";
                            header("refresh:3; url=fee_structure_view.php");
                        }
                        else{
                            echo "<div style='top:65px;' class='error'><b>Error!<br>Admission</b> and <b>Monthly</b> fees are mendatory and must be greadter than 0 (zero).</div>";
                        }
                    }
                }
            }
            else{
                echo "<div class=''>";
                echo "
                    <input type='text' class='input_txt input_small full_third_half' value='$selected_class' name='class' disabled>
                    <input type='number' class='input_txt input_small full_quater_half value adm_fee' value='' name='admission' placeholder='Admission Fee' min='0'>
                    <input type='number' class='input_txt input_small full_quater_half value mon_fee' value='' name='monthly' placeholder='Monthly Fee' min='0'>
                    <input type='number' class='input_txt input_small full_quater_half value spo_fee' value='' name='sports' placeholder='Sports Fee' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value bld_fee' value='' name='building' placeholder='Building Fee' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value gen_fee' value='' name='generator' placeholder='Generator Fee' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value com_fee' value='' name='computer' placeholder='Computer Fee' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small value oth_fee' value='' name='other' placeholder='Other/Misc. Fee' min='0'>
                    <input type='number' class='input_txt input_small full_quater_small total_value' value='' name='grand_total' min='0' disabled>
                    <input type='number' class='input_txt input_small full_quater_small grand_total' value='' name='total' min='0' style='color:red;text-shadow:0 0 5px white;' disabled><br>
                ";
                echo '<span style="text-transform:capitalize;color:pink;text-shadow:0px 0px 5px black;font-weight:600;">No fee structure found for this class. pleaese enter above feilds and insert fee structure for this class. </span>';
                echo '<div style="width:100%;margin-top:30px;">';
                echo '<button type="" class="btn_submit btn full_half" name="insert_btn" >Insert</button>';
                echo '<button type="" class="btn_back btn full_half" name="back_btn" >Back</button>';
                echo '</div>';

                if(isset($_POST['insert_btn'])){
                    $admission_fee = 0;
                    $monthly_fee = 0;
                    $sports_fee = 0;
                    $building_fee = 0;
                    $generator_fee = 0;
                    $computer_fee = 0;
                    $other_fee = 0;
                    $total_fee = 0;
                    
                    $admission_fee = $_POST['admission'];
                    $monthly_fee = $_POST['monthly'];
                    $sports_fee = $_POST['sports'];
                    $building_fee = $_POST['building'];
                    $generator_fee = $_POST['generator'];
                    $computer_fee = $_POST['computer'];
                    $other_fee = $_POST['other'];

                    if($admission_fee != 0 || $monthly_fee != 0){
                        $total_fee += $monthly_fee;
                        $total_fee += $sports_fee;
                        $total_fee += $building_fee;
                        $total_fee += $generator_fee;
                        $total_fee += $computer_fee;
                        $total_fee += $other_fee;                    
                        $update_fee_sturcture_q = "INSERT INTO fee_structure VALUES ('', '$selected_class', '$admission_fee', '$monthly_fee', '$sports_fee', '$building_fee', '$generator_fee', '$computer_fee', '$other_fee', '$total_fee')";

                        $insert_fee_structure = mysqli_query($this->conn, $update_fee_sturcture_q);

                        echo '<span style="top:65px;" class="error success"><b>Congrats!</b> Fee Structure Inserted successfully.</span>';
                        echo "<div class='loading'><img src='includes/images/loading/loading4.gif'></div>";

                        $_SESSION['class'] = $_POST['class'];
                        $class = $_SESSION['class'];
                        header("refresh:3;url=fee_structure_view.php");
                    }
                    else{
                        echo "<div style='top:65px;' class='error'><b>Error!<br>Admission</b> and <b>Monthly</b> fees are mendatory and must be greadter than 0 (zero).</div>";
                    }
                }
            }
            echo "</div>";
        }
    }
?>