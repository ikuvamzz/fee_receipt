<?php
    require("includes/config/config.php");
    require("includes/header.php");
//    include("includes/classes/Institute.php");
//    include("includes/classes/Student.php");
//    include("includes/classes/FeeStructure.php");
    include("includes/functions/myfunctions.php")
?>

    <?php
        if(isset($_SESSION['sel_class'])){
            $class = $_SESSION['sel_class'];
            switch($class){
                case 'Nur/LKG/UKG': $class = 0; break;
                case '1st': $class = 1; break;
                case '2nd': $class = 2; break;
                case '3rd': $class = 3; break;
                case '4th': $class = 4; break;
                case '5th': $class = 5; break;
                case '6th': $class = 6; break;
                case '7th': $class = 7; break;
                case '8th': $class = 8; break;
                case '9th': $class = 9; break;
                case '10th': $class = 10; break;
                case '11th': $class = 11; break;
                case '12th': $class = 12; break;
                default: "Class not selected!";
            }

        }
        else{
        }
            #Declaring Variables:
            $_SESSION['admNum'] = $_GET['admissionNumber'];
            $admNum = $_SESSION['admNum'];
            $session = $_SESSION['session'];
            $class = $_SESSION['sel_class'];

            $q = "SELECT name, fname FROM fee_deposit WHERE admission = '$admNum' AND session = '$session' LIMIT 1";
            $run_q = mysqli_query($db_con, $q);
            $get_name = mysqli_fetch_array($run_q);
            $_SESSION['name'] = $get_name['name'];
            $name = $_SESSION['name'];
            $_SESSION['fname'] = $get_name['fname'];
            $fname = $_SESSION['fname'];
            
            #query for selecting data for fees detail student wise (only single student):
            $session_fee_student_q = "SELECT * FROM `fee_deposit` WHERE `session`='$session' AND `admission`='$admNum' ORDER BY `month` ASC";
            $session_fee_student = mysqli_query($db_con, $session_fee_student_q);
            $session_fee_student_row = mysqli_num_rows($session_fee_student);
            if($session_fee_student_row < 1){
                header("Location: print_receipts_view.php");
                exit();
            }
    ?>
    <div class="container full_width">
        <h3>Fee Detail of Student <small>(Session: <?php echo $session?>)</small></h3>
        <form action="#" method="GET">
            <label for="class" class="lbl full_quater">Admission Number:</label>
            <label for="class" class="lbl full_quater">Session:</label>
            <label for="class" class="lbl full_quater">Name:</label>
            <label for="class" class="lbl full_quater">Father's Name:</label>
            <input type="text" id="class" class="input_txt full_quater" name="class" value="<?php echo $admNum;?>" disabled>
            <input type="text" id="class" class="input_txt full_quater" name="class" value="<?php echo $session;?>" disabled>
            <input type="text" id="class" class="input_txt full_quater" name="class" value="<?php echo $name;?>" disabled>
            <input type="text" id="class" class="input_txt full_quater" name="class" value="<?php echo $fname;?>" disabled>
            <?php
                echo '<div class="" style="width:102%;color:lightblue;text-shadow:0px 0px 10px black;text-align:center;">';
                echo '<label for="" class="lbl full_quater_small">Class</label>';
                echo '<label for="" class="lbl full_quater_small">Month</label>';
                echo '<label for="" class="lbl full_quater_small">Admission</label>';
                echo '<label for="" class="lbl full_quater_small">Monthly</label>';
                echo '<label for="" class="lbl full_quater_small">Sports</label>';
                echo '<label for="" class="lbl full_quater_small">Building</label>';
                echo '<label for="" class="lbl full_quater_small">Generator</label>';
                echo '<label for="" class="lbl full_quater_small">Computer</label>';
                echo '<label for="" class="lbl full_quater_small">Misc.</label>';
                echo '<label for="" class="lbl full_quater_small">Total</label>';
                echo '<label for="" class="lbl full_quater_small">Bill Date</label>';
                echo '<label for="" class="lbl full_quater_half">Take Actions</label>';
                echo "</div>";
                echo "<hr class='slim_line' style='width:99%;'>";

                while ($fee = mysqli_fetch_array($session_fee_student)){
                    $class = $fee['class'];
                    $month = $fee['month'];
                    $bill_date = $fee['bill_date'];
                    $admission_fee = $fee['admission_fee'];
                    $monthly_fee = $fee['monthly_fee'];
                    $sports_fee = $fee['sports_fee'];
                    $building_fee = $fee['building_fee'];
                    $generator_fee = $fee['generator_fee'];
                    $computer_fee = $fee['computer_fee'];
                    $other_fee = $fee['other_fee'];
                    $total_fee = $fee['total_fee'];
                    
                    $name = str_replace(' ', '%20', $name);
                    $edit_link = "student_name=$name&fee_session=$session&admission_num=$admNum&student_class=$class&fee_month=$month&rec_date=$bill_date";
                    
                    echo "<div class='' style=''>";
                    echo "
                    <input type='text' class='input_txt input_small full_quater_small' value='";num_alpha_class($class); echo"' name='class' disabled>
                    <input type='text' class='input_txt input_small full_quater_small' value='";echo num_alpha_month($month); echo"' name='month' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$admission_fee' name='admission' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$monthly_fee' name='monthly' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$sports_fee' name='sports' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$building_fee' name='building' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$generator_fee' name='generator' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$computer_fee' name='computer' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$other_fee' name='other' disabled>
                    <input type='number' class='input_txt input_small full_quater_small' value='$total_fee' name='total' disabled>
                    <input type='text' class='input_txt input_small full_quater_small' value='$bill_date' name='bill_date' disabled>
                    <button type='' class='btn_submit btn full_quater_small' name='edit_btn' onclick=window.open('fee_deposite_view.php?$edit_link') >Edit</button>
                    <button type='button' class='btn_submit btn full_quater_small' name='print_btn' onclick=window.open('includes/print_files/receipt_sample.php?feemonth=$month&feesession=$session&stdadmNum=$admNum')>Print</button>
                    ";

                }
                echo '<div style="width:100%;margin-top:30px;">';
                echo '<button type="" class="btn_back btn full_half" name="back_btn" >Back</button>';
                echo '<button type="" class="btn_submit btn full_half" name="home_btn" >Home</button>';
                echo '</div>';
            ?>
        </form>
    </div>
          
    <?php
        if(isset($_POST['back_btn']))
            header("Location: print_receipts_view.php");
        if(isset($_POST['home_btn']))
            header("Location: index.php");
    ?>     
<?php
    require("includes/footer.php");
?>