<?php
    require("includes/config/config.php");
    require("includes/header.php");
    include("includes/classes/Institute.php");
    include("includes/classes/Student.php");
?>

    <?php
        unset($_SESSION['sel_class']);
        if(isset($_POST['home_btn'])){
            header('Location: index.php');
        }
        elseif(isset($_POST['submit_fields'])){
            if($_POST['sel_class'] == ''){
                $class = 'all';
                $_SESSION['sel_class'] = $class;
                header('Location: fee_structure_view.php');
            }
            else{
                $class = $_POST['sel_class'];
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
                $_SESSION['sel_class'] = $class;
                header('Location: fee_structure_view.php');
            }
        }
    ?>
    
    <div class="container">
        <h3>Fee Structure</h3>
        <form action="#" method="POST">
            <label for="class" class="lbl">Class</label><br><br>
            <select id="class" class="input_txt" name="sel_class">
                <option value="">--Select Class--</option>
                <option value="0">Nur/LKG/UKG</option>
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>
                <option value="6">6th</option>
                <option value="7">7th</option>
                <option value="8">8th</option>
                <option value="9">9th</option>
                <option value="10">10th</option>
                <option value="11">11th</option>
                <option value="12">12th</option>
            </select>
            <div style="width:100%;margin-top:30px;">
                <input type="submit" class="btn_submit btn full_half" id="btn_submit" name="submit_fields" />
                <button type="" class="btn_home btn full_half" name="home_btn" >Home</button>
            </div>
        </form>
    </div>
               
<?php
    require("includes/footer.php");
?>