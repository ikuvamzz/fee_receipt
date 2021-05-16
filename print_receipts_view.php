<?php
    require("includes/config/config.php");
    require("includes/header.php");
    include("includes/classes/Institute.php");
    include("includes/classes/Student.php");
    include("includes/functions/myfunctions.php");
?>

    <?php
        if(isset($_SESSION['session']) && isset($_SESSION['sel_class'])){
            $class = $_SESSION['sel_class'];
            $session = $_SESSION['session'];
        }
        else{
            header("Location:print_receipts.php");
        }
            
    ?>
    
    <div class="container full_width">
        <h3>Fee Detail of Class <small>(Session: <?php echo $session;?>)</small></h3>
        <form action="#" method="GET">
            <label for="class" class="lbl full_half">Class</label>
            <label for="session" class="lbl full_half">Session</label>
            
            <input type="text" style="margin-left:-1px;" id="class" class="input_txt full_half" name="class" value="<?php num_alpha_class($class);?>" disabled>
            <input type="text" id="session" class="input_txt full_half" name="session" value="<?php echo $session;?>" disabled>
            <?php
                $std_list_obj = new Student($db_con);
                $std_list_obj->studentListClassWise($class, $session);
            ?>
            <br>
            <button type="" class="btn btn_back full_half" name="back_btn" >Back</button>
            <button type="" class="btn btn_home full_half" name="home_btn" >Home</button>
        </form>
    </div>

<?php
    if(isset($_GET['back_btn'])){
        header("Location: print_receipts.php");
    }
    if(isset($_GET['home_btn'])){
        header("Location: index.php");
    }
?>
     
               
<?php
    require("includes/footer.php");
?>