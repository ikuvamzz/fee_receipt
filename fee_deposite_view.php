<?php
    require("includes/config/config.php");
    require("includes/header.php");
    include("includes/functions/myfunctions.php");
?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.value').on('keydown',function(){
                var adm_fee = 0;
                var mon_fee = 0;
                var spo_fee = 0;
                var bld_fee = 0;
                var com_fee = 0;
                var gen_fee = 0;
                var oth_fee = 0;
                var tot_fee = 0;
                tot_fee += +$('.adm_fee').val();
                tot_fee += +$('.mon_fee').val();
                tot_fee += +$('.spo_fee').val();
                tot_fee += +$('.bld_fee').val();
                tot_fee += +$('.com_fee').val();
                tot_fee += +$('.gen_fee').val();
                tot_fee += +$('.oth_fee').val();
                $('.total_value').val(tot_fee);
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
        include("includes/form_handlers/fee_deposite_view_handler.php");
    ?>
    
    <?php
        if(isset($_POST['submit_month'])){
            $_SESSION['std_name'] = '';
            $_SESSION['fname'] = '';
            $_SESSION['month'] = '';
            $_SESSION['std_name'] = $_POST['std_name'];
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['month'] = $_POST['month'];
        }
//        if(isset($month))
//            $months = array(5,7,8);
//            array_push($months, "$month");
//            foreach($months as $months)
//                echo $months.",";
            
    ?>
          
    <div class="container full_width" <?php if(isset($_POST['submit_fields'])) echo "style='top:170;'";
                                     if(isset($_POST['reset_fields'])) echo "style='top:110;'";?>>
        <h3 style="border:0;">
            Receipt Form
        </h3>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
           <div style="background:#203265;padding:5px;margin-bottom:1%;">
                <label for="session" class="lbl full_quater_half">
                    <span style="margin-left:5%;">Session: </span>
                </label>
                <label for="adm_num" class="lbl full_quater_half">
                    <span style="margin-left:5%;">Adms.No: </span>
                </label>
                <label for="class" class="lbl full_quater">
                    <span style="margin-left:5%;">Student Class: </span>
                </label>
                <label for="type" class="lbl full_quater">
                    <span style="margin-left:5%;">Fees Type: </span>
                </label>
                <label for="bill_date" class="lbl full_quater">
                    <span style="margin-left:5%;">Bill Date: </span>
                </label>
                <input type="text" class="input_txt input_session full_quater_half" placeholder="Session" name="session" value="<?php echo $session;?>" disabled/>
                <input type="number" class="input_txt input_adm_num full_quater_half" placeholder="Admission Number" name="adm_num" value="<?php echo $adm_num;?>" disabled/>
                <input type="text" class="input_txt input_adm_num full_quater" placeholder="Class" name="class" value="<?php num_alpha_class($class);?>" disabled/>
                <input type="text" class="input_txt input_fee_type full_quater" placeholder="Fees Type" name="fee_type" value="<?php echo $fee_type;?>" disabled />
                <input type="text" class="input_txt input_bill_date full_quater" placeholder="Bill_date" name="bill_date" value="<?php echo $bill_date;?>" disabled/>
           </div>
           <div style="background:#203265; padding:5px;">
                <label for="std_name" class="lbl full_third">
                    <span class="lbl">Name of Student: </span>
                </label>
                <label for="std_fname" class="lbl full_third">
                    <span class="lbl">Father's Name: </span>
                </label>
                <label for="std_fname" class="lbl full_third">
                    <span class="lbl">Select Month: </span>
                </label>
                <input type="text" class="input_txt input_std_name full_third" placeholder="Name of Student" name="std_name" value="<?php 
                                            if(isset($_SESSION['std_name'])){
                                                echo $_SESSION['std_name'];
                                            }
                                            if(isset($get_std_name) && empty($_SESSION['std_name']) && !isset($_POST['submit_fields']))
                                                echo $get_std_name;
                                       ?>" />
                <input type="text" class="input_txt input_fname full_third" placeholder="Father's Name" name="fname" max="50" min="3" value="<?php
                                            if(isset($_SESSION['fname'])){
                                                echo $_SESSION['fname'];
                                            }
                                            if(isset($get_fname) && empty($_SESSION['fname']) && !isset($_POST['submit_fields']))
                                                echo $get_fname;
                                            ?>" />
                <?php
                    if(isset($_SESSION['month']))
                        $month = $_SESSION['month']; 
                ?>
                <select name="month" class="input_txt full_third month_group" <?php if($_SESSION['type'] == 'a' || !empty($_SESSION['month'])) echo "style='display:none;'";?> >
                    <option value="" style="color:gray;">--Select Month--</option>
                    <option value="4" <?php if(isset($month)) if($month == 4) echo "selected";?> >April</option>
                    <option value="5" <?php if(isset($month)) if($month == 5) echo "selected";?> >May</option>
                    <option value="6" <?php if(isset($month)) if($month == 6) echo "selected";?> >June</option>
                    <option value="7" <?php if(isset($month)) if($month == 7) echo "selected";?> >July</option>
                    <option value="8" <?php if(isset($month)) if($month == 8) echo "selected";?> >August</option>
                    <option value="9" <?php if(isset($month)) if($month == 9) echo "selected";?> >September</option>
                    <option value="10" <?php if(isset($month)) if($month == 10) echo "selected";?> >October</option>
                    <option value="11" <?php if(isset($month)) if($month == 11) echo "selected";?> >November</option>
                    <option value="12" <?php if(isset($month)) if($month == 12) echo "selected";?> >December</option>
                    <option value="1" <?php if(isset($month)) if($month == 1) echo "selected";?> >January</option>
                    <option value="2" <?php if(isset($month)) if($month == 2) echo "selected";?> >February</option>
                    <option value="3" <?php if(isset($month)) if($month == 3) echo "selected";?> >March</option>
                </select>
                
                <input type="text" class="input_txt full_third month_group" <?php if(empty($_SESSION['month'])) echo "style='display:none;'"; if(isset($month)) {echo "placeholder='".num_alpha_month($month)."' disabled";}?> >
                
                <input type="text" class="input_txt full_third month_group" <?php if($_SESSION['type'] == 'm'){
                    echo "style='display:none;'";} else{ echo "placeholder='--Select Month--' disabled";}?> >
           </div>
            
            <?php
                if((empty($_SESSION['month']) || empty($_SESSION['std_name']) || empty($_SESSION['fname'])) && $_SESSION['type'] !== 'a'){
                    echo'<div style="width:100%;margin-top:30px;">
                        <button type="submit" class="btn_submit btn full_half" id="btn_submit" name="submit_month">Next</button>
                        <button type="" class="btn_back btn full_half" name="btn_back"> Back</button>
                    </div>';
                    if(isset($_POST['btn_back'])){
                        header("Location: fee_deposite.php");
                    }
                    if(isset($_POST['submit_month']) && !empty($_SESSION['month']) && !empty($_SESSION['std_name']) && !empty($_SESSION['fname'])){
                        header("location: fee_deposite_view.php");
                    }
                    #if blanks
                    elseif(isset($_POST['submit_month']) && $_SESSION['std_name'] == ''){
                        echo "<script>
                                $('.input_std_name').css('box-shadow','1px 1px 30px red');
                              </script>
                             ";
                        echo '<div class="error" style="top:0px;"><b>Errors:</b><br>1. Please Enter Student\'s Name.</div>';
                    }elseif(isset($_POST['submit_month']) && $_SESSION['fname'] == ''){
                        echo "<script>
                                $('.input_fname').css('box-shadow','1px 1px 30px red');
                              </script>
                             ";
                        echo '<div class="error" style="top:0px;"><b>Errors:</b><br>1. Please Enter Father\'s Name.</div>';
                    }elseif(isset($_POST['submit_month']) && $_SESSION['month'] == ''){
                        echo "<script>
                                $('.month_group').css('box-shadow','1px 1px 30px red');
                              </script>
                             ";
                        echo '<div class="error" style="top:0px;"><b>Errors:</b><br>1. Please Select Month</div>';
                    }
                    return false;#write code above this to be read by server if condition is false
                                 #no code after "return false" will be executed neither php nor html, js and jquer
                }
            ?>
            <div style="background-color:#203265;margin-top:10px;padding:10px;">
                <div style="width:100%;font-size:90%;color:lightblue;">
                    <label class="lbl full_half" style="margin-bottom:0">
                        <span class="lbl_unhidden full_half">Fees Type: </span>
                        <span class="lbl_unhidden full_half">Fees Structure&nbsp; <small style="padding-top:2px;font-size:70%;">(<?php echo num_alpha_class($class);?>)</small></span>
                    </label>
                    <label class="lbl full_quater"  style="margin-bottom:10px;">
                        <span class="lbl_unhidden">Fee Already Recieved</span>
                    </label>
                    <label class="lbl full_quater"  style="margin-bottom:10px;">
                        <span class="lbl_unhidden">Fee Recieved</span>
                    </label>
                </div>
                    <hr class="lbl">
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Admission Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $admission;?>.00)</span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_admission_fee" value="<?php
                                    if(isset($get_admission_fee)){
                                        echo "$get_admission_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="<?php if($_SESSION['type'] !== 'a') echo 'display:none;'?>" class="input_txt full_quater value adm_fee" id="value" placeholder="Admission Fee" name="admission_fee" value="<?php
                                    if(isset($already_admission)){
                                        echo "$already_admission";
                                    }
                               ?>"
                               <?php
                                    if($_SESSION['type'] !== 'a'){
                                        echo "disabled";
                                    }
                               ?>>
                </div>
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Monthly Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $monthly;?>.00)<small>&nbsp;X 12 = <?php echo $monthly*12;?></small></span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_monthly_fee" value="<?php
                                    if(isset($get_monthly_fee)){
                                        echo "$get_monthly_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="<?php if($_SESSION['type'] == 'a') echo 'display:none;'?>" class="input_txt full_quater value mon_fee" id="value" placeholder="Monthly Fee" name="monthly_fee" value="<?php
                                    if(isset($already_monthly)){
                                        echo "$already_monthly";
                                    }
                               ?>"
                              <?php
                                    if($_SESSION['type'] == 'a'){
                                        echo "disabled";
                                    }
                               ?>>

                </div>
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Sports Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $sports;?>.00)</span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_sports_fee" value="<?php
                                    if(isset($get_sports_fee)){
                                        echo "$get_sports_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="" class="input_txt full_quater value spo_fee" id="value" placeholder="Sports Fee" name="sports_fee" value="<?php
                                    if(isset($already_sports)){
                                        echo "$already_sports";
                                    }
                               ?>"
                              <?php
                                    if($_SESSION['type'] == 'a'){
                                        #echo "disabled";
                                    }
                               ?>>

                </div>
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Building Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $building;?>.00)</span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_building_fee" value="<?php
                                    if(isset($get_building_fee)){
                                        echo "$get_building_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="" class="input_txt full_quater value bld_fee" id="value" placeholder="Building Fee" name="building_fee" value="<?php
                                    if(isset($already_building)){
                                        echo "$already_building";
                                    }
                               ?>" 
                              <?php
                                    if($_SESSION['type'] == 'a'){
                                        #echo "disabled";
                                    }
                               ?>>

                </div>
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Computer Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $computer;?>.00)</span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_computer_fee" value="<?php
                                    if(isset($get_computer_fee)){
                                        #echo "$get_computer_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="" class="input_txt full_quater value com_fee" id="value" placeholder="Computer Fee" name="computer_fee" value="<?php
                                    if(isset($already_computer)){
                                        echo "$already_computer";
                                    }
                               ?>" 
                              <?php
                                    if($_SESSION['type'] == 'a'){
                                        #echo "disabled";
                                    }
                               ?>>

                </div>
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Generator Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $generator;?>.00)</span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_generator_fee" value="<?php
                                    if(isset($get_generator_fee)){
                                        echo "$get_generator_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="" class="input_txt full_quater value gen_fee" id="value" placeholder="Generator Fee" name="generator_fee" value="<?php
                                    if(isset($already_generator)){
                                        echo "$already_generator";
                                    }
                               ?>"
                              <?php
                                    if($_SESSION['type'] == 'a'){
                                        #echo "disabled";
                                    }
                               ?>>

                </div>
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Other/Misc Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $other;?>.00)</span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_other_fee" value="<?php
                                    if(isset($get_other_fee)){
                                        echo "$get_other_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="" class="input_txt full_quater value oth_fee" id="value" placeholder="Other/Misc. Fee" name="other_fee" value="<?php
                                    if(isset($already_other)){
                                        echo "$already_other";
                                    }
                               ?>" >
                </div>
                <div style="width:100%;margin-bottom:10px;">
                    <label class="lbl_unhidden full_half">
                        <span class="lbl_unhidden full_half">Total Fee: </span>
                        <span class="lbl_unhidden full_half">(<?php echo $total;?>.00)</span>
                    </label>
                        <input type="number" style="" class="input_txt full_quater" placeholder="0.00" name="old_total_fee" value="<?php
                                    if(isset($get_total_fee)){
                                        echo "$get_total_fee".".00";
                                    }
                               ?>" disabled>
                        <input type="number" style="" class="total_value input_txt full_quater tot_fee" id="total_value" placeholder="Total Recieved Fee" name="total_fee" value="<?php
                                    if(isset($already_total)){
                                        echo "$already_total";
                                    }else{
                                        echo $total_fee;
                                    }
                               ?>" disabled>
                </div>
            </div>
                                    
            <div style="width:100%;margin-top:30px;">
                <button type="submit" class="btn_submit btn full_half" id="btn_submit" onClick="" name="submit_fields">Submit</button>
                <button type="" class="btn_back btn full_half" name="btn_back"> Back</button>
            </div>
            <?php
                if(isset($_POST['btn_back']))
                    header("location:fee_deposite.php")
            ?>

        </form>
    </div>
<?php
    require("includes/footer.php");
?>