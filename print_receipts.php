<?php
    require("includes/config/config.php");
    require("includes/header.php");
    include("includes/classes/Institute.php");
    include("includes/classes/Student.php");
    include("includes/functions/myfunctions.php");
?>

    <?php
        unset($_SESSION['session']);
        unset($_SESSION['sel_class']);
        if(isset($_POST['home_btn'])){
            header('Location: index.php');
        }
        elseif(isset($_POST['submit_fields'])){
            if($_POST['session'] == '')
                echo '<div class="error"><b>Oh!</b> Please select Session.</div>';
            elseif($_POST['sel_class'] == '')
                echo '<div class="error"><b>Oh!</b> Please select Class.</div>';
            elseif($_POST['session'] != '' && $_POST['sel_class'] != ''){
            $class = $_POST['sel_class'];
            $_SESSION['session'] = $_POST['session'];
            $_SESSION['sel_class'] = $class;
            header('Location: print_receipts_view.php');
            }
        }
    ?>
    
    <div class="container" <?php if(isset($_POST['submit_fields'])) echo "style='top:170;'";
                                     if(isset($_POST['reset_fields'])) echo "style='top:110;'";?>>
        <h3>Fee Structure</h3>
        <form action="#" method="POST">
            <label for="session" class="lbl">Session</label>
            <select name="session" id="session" class="input_txt classes">
                <option name="session_val" value="" <?php if(isset($_POST['submit_fields']) && ($_POST['session'] == "") ) echo "selected"; ?>>--Select Session--</option>
                <option name="session_val" value="2019-20" <?php if(isset($_POST['submit_fields']) && ($_POST['session'] == "2019-20") ) echo "selected"; ?>>2019-20</option>
                <option name="session_val" value="2020-21" <?php if(isset($_POST['submit_fields']) && ($_POST['session'] == "2020-21") ) echo "selected"; ?>>2020-21</option>
            </select>
            <label for="class" class="lbl">Class</label>
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
            <div style="width:100%; margin-top:40px;">
                <input type="submit" class="btn_submit btn full_half" id="btn_submit" name="submit_fields" />
                <button type="" class="btn full_half" name="home_btn" >Home</button>
            </div>
        </form>
    </div>
    
    <script src="includes/js/jquery-3.3.1.min.js"> </script>
    <script src="includes/js/myjquery.js"> </script>
               
<?php
    require("includes/footer.php");
?>