<?php
    require("includes/config/config.php");
    require("includes/header.php");
    include("includes/classes/Institute.php");
    include("includes/classes/Student.php");
    include("includes/classes/FeeStructure.php");
    include("includes/functions/myfunctions.php")
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.value').on('keyup',function(){
            var adm_fee = 0;
            var mon_fee = 0;
            var spo_fee = 0;
            var bld_fee = 0;
            var com_fee = 0;
            var gen_fee = 0;
            var oth_fee = 0;
            var tot_fee = 0;
            var grand_tot = 0;
            tot_fee += +$('.mon_fee').val();
            tot_fee += +$('.spo_fee').val();
            tot_fee += +$('.bld_fee').val();
            tot_fee += +$('.com_fee').val();
            tot_fee += +$('.gen_fee').val();
            tot_fee += +$('.oth_fee').val();
            $('.total_value').val(tot_fee);
            grand_tot += +(tot_fee * 12)
            grand_tot += +$('.adm_fee').val();
            $('.grand_total').val(grand_tot);
        });
        $(this).delay(2500).queue(function() {
            $('.error').slideUp();
            $('.container').animate({
                top: 110
            }, 'slow');
        });
    });
</script>

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
            header("Location:fee_structure.php");
        }
            
    ?>
    
    <div class="container full_width" <?php if(isset($_POST['submit_fields'])) echo "style='top:170;'";
                                     if(isset($_POST['reset_fields'])) echo "style='top:110;'";?>>
        <h3>Fee Structure</h3>
        <form action="#" method="POST">
            <label for="class" class="lbl">Class</label><br><br>
            <input type="text" id="class" class="input_txt" name="class" value="<?php num_alpha_class($class);?>" readonly>
            <label for="std_list" class="lbl" style="text-decoration:underline;">Classes List</label><br><br>
            <?php
                if($_SESSION['sel_class'] == 'all'){
                    $class_fee_obj = new FeeStructure($db_con);
                    $class_fee_obj->showAllFeeStructure($class);                    
                }
                else{
                    $class_fee_obj = new FeeStructure($db_con);
                    $class_fee_obj->showClassFeeStructure($class);
                }
            ?>
        </form>
    </div>
          
    <?php
        if(isset($_POST['back_btn']))
            header("Location: fee_structure.php");
        if(isset($_POST['home_btn']))
            header("Location: index.php");
    ?>     
<?php
    require_once("includes/footer.php");
?>