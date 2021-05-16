<?php
    require("includes/config/config.php");
    require("includes/header.php");
?>
<?php
    #clear session variables
    unset($_SESSION['session']);
    unset($_SESSION['month']);
    unset($_SESSION['adm_num']);
    unset($_SESSION['classes']);
    unset($_SESSION['type']);
    unset($_SESSION['bill_date']);
    unset($_SESSION['std_name']);
    unset($_SESSION['fname']);
    unset($_SESSION['month']);
    if(isset($_SESSION['already_month_fee']))
        unset($_SESSION['already_month_fee']);

    #when submitted
    if(isset($_POST['submit_fields'])){
		$session = $_POST['session'];
		$adm_num = $_POST['adm_num'];
		$class = $_POST['classes'];
        $fee_type = $_POST['type'];
        $bill_date = $_POST['bill_date'];
        		
		if( $session != "" && $adm_num != "" && $class != "" && $fee_type != "" && $bill_date != "" && strlen($bill_date) === 10){
            $_SESSION['session'] = $session;
            $_SESSION['adm_num'] = $adm_num;
            $_SESSION['classes'] = $class;
            $_SESSION['type'] = $fee_type;
            $_SESSION['bill_date'] = $bill_date;
            
            header ("Location: fee_deposite_view.php");
        }elseif($session == '')
            echo "<div class='error'><strong>error:</strong> Please select Session.</div>";
        elseif($adm_num == '')
            echo "<div class='error'><strong>error:</strong> Please enter Admission Number.</div>";
		elseif($class == '')
            echo "<div class='error'><strong>error:</strong> Please select Class.</div>";
		elseif($fee_type == '')
            echo "<div class='error'><strong>error:</strong> Please select Fees Type.</div>";
		elseif(strlen($bill_date) != 10)
            echo "<div class='error'><strong>error:</strong> Please enter a valid date format DD/MM/YYYY.</div>";
		
	}			
?>

    <div class="container" <?php if(isset($_POST['submit_fields'])) echo "style='top:170;'";
                                     if(isset($_POST['reset_fields'])) echo "style='top:110;'";?>>
        <h3>
            Deposite Fee
        </h3>
        <form action="" method="POST">
           
            <label for="session" class="lbl">
                <span class="lbl">Session: </span>
            </label>
            <select name="session" id="session" class="input_txt classes">
                <option name="session_val" value="" <?php if(isset($_POST['submit_fields']) && ($_POST['session'] == "") ) echo "selected"; ?>>--Select Session--</option>
                <option name="session_val" value="2019-20" <?php if(isset($_POST['submit_fields']) && ($_POST['session'] == "2019-20") ) echo "selected"; ?>>2019-20</option>
                <option name="session_val" value="2020-21" <?php if(isset($_POST['submit_fields']) && ($_POST['session'] == "2020-21") ) echo "selected"; ?>>2020-21</option>
            </select>
            <br>
            <label for="adm_num" class="lbl">
                <span class="lbl">Admission Number: </span>
            </label>
            <input type="number" class="input_txt input_adm_num" placeholder="Admission Number" name="adm_num" max="13000" min="1" value="<?php if(isset($_POST['submit_fields'])) echo $_POST['adm_num']?>" />
            <br>
            <label for="class" class="lbl">
                <span class="lbl">Student Class: </span>
            </label>
            <select name="classes" class="input_txt classes">
                <option class="class_val" name="class_val" value="" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "") ) echo "selected"; ?>>--Select Class--</option>
                <option class="class_val" name="class_val" value="0" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "0") ) echo "selected"; ?>>Nursery/LKG/UKG</option>
                <option class="class_val" name="class_val" value="1" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "1") ) echo "selected"; ?>>1st</option>
                <option class="class_val" name="class_val" value="2" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "2") ) echo "selected"; ?>>2nd</option>
                <option class="class_val" name="class_val" value="3" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "3") ) echo "selected"; ?>>3rd</option>
                <option class="class_val" name="class_val" value="4" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "4") ) echo "selected"; ?>>4th</option>
                <option class="class_val" name="class_val" value="5" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "5") ) echo "selected"; ?>>5th</option>
                <option class="class_val" name="class_val" value="6" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "6") ) echo "selected"; ?>>6th</option>
                <option class="class_val" name="class_val" value="7" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "7") ) echo "selected"; ?>>7th</option>
                <option class="class_val" name="class_val" value="8" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "8") ) echo "selected"; ?>>8th</option>
                <option class="class_val" name="class_val" value="9" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "9") ) echo "selected"; ?>>9th</option>
                <option class="class_val" name="class_val" value="10" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "10") ) echo "selected"; ?>>10th</option>
                <option class="class_val" name="class_val" value="11" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "11") ) echo "selected"; ?>>11th</option>
                <option class="class_val" name="class_val" value="12" <?php if(isset($_POST['submit_fields']) && ($_POST['classes'] == "12") ) echo "selected"; ?>>12th</option>
            </select>
            <br />
            <label for="" class="lbl">
                <span class="lbl">Fee Type: </span>
            </label>
            <select class="input_txt" name="type">
                <option value="" <?php if(isset($_POST['type']) && ($_POST['type'] == "") ) echo "selected"; ?>>
                    --Fees Type--
                </option>
                <option value="m" <?php if(isset($_POST['type']) && ($_POST['type'] == "m") ) echo "selected"; ?>>
                    Monthly Fee
                </option>
                <option value="a" <?php if(isset($_POST['type']) && ($_POST['type'] == "a") ) echo "selected"; ?>>
                    Admission/Other Fee
                </option>
            </select>
            <br>
            <label for="bill_date" class="lbl">
                <span class="lbl">Bill Date: </span>
            </label>
            <input type="text" class="input_txt input_billdate txtDate ws-date" id="bill_date" placeholder="Bill Date" name="bill_date" maxlength="10" value="<?php
//                          echo date("D");
                        if(isset($_POST['submit_fields']))
                            echo $_POST['bill_date'];
                        else
                            echo date("d/m/Y");
            ?>" />
            <br />
            <div style="width:100%;margin-top:30px;">
                <button type="" class="btn_submit btn full_half" id="btn_submit" onClick="" name="submit_fields">Next</button>
                <button type="reset" class="btn_reset btn full_half" name="reset_fields"> Reset</button>
            </div>

        </form>
    </div>

    <script type="text/javascript">
        //            $('#bill_date').val(new Date().toISOString().substring(0, 10));
        $(document).ready(function() {
//            $('#bill_date').on('focus', function() {
//                $(this).attr('type', 'date');
//            });
//            $('#bill_date').on('blur', function() {
//                $(this).attr('type', 'text');
//            });
            $('input').focus(function(){
                $(this).attr('autocomplete','off');
            });
            $(this).delay(3000).queue(function() {
                $('.error').slideUp();
                $('.container').animate({
                    top: 110
                }, 'slow');
            });
            $('.btn_reset').on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, '1000');
                $('.btn_reset').delay(1500).queue(function() {
                    location.reload(true);
                });
            });
            $("input[type=text].ws-date").keyup(function (e) {
                var textSoFar = $(this).val();
                if (e.keyCode != 191) {
                    if (e.keyCode != 8) {
                        if (textSoFar.length == 2 || textSoFar.length == 5) {
                            $(this).val(textSoFar + "/");
                            if(textSoFar.substr(0, 2) > 31 || textSoFar.substr(0, 2) < 1){
                                alert("Date Must be only between 1 and 31");
                                $(this).val("");
                            }
                            else if(textSoFar.substr(3, 2) > 12){
                                var dd = textSoFar.substr(0, 3);
                                $(this).val(dd);
                                alert("Date Must be only between 1 and 12");
                            }
                        }
                        else if (textSoFar.length == 10) {
                            var y = new Date();
                            var year_now = y.getFullYear();
                            var year_least = year_now - 50;
                            if(textSoFar.substr(6, 4) < year_least || textSoFar.substr(6, 4) > year_now){
                                alert("Year Must be only between" + year_least + " and " + year_now);
                                $(this).val(textSoFar.substr(0, 6));
                            }
                        }
                            //to handle copy & paste of 8 digit
                        else if (e.keyCode == 86 && textSoFar.length == 8) {
                            $(this).val(textSoFar.substr(0, 2) + "/" + textSoFar.substr(2, 2) + "/" + textSoFar.substr(4, 4));
                        }
                    }
                    else {
                        //backspace would skip the slashes and just remove the numbers
                        if (textSoFar.length == 5) {
                            $(this).val(textSoFar.substring(0, 4));
                        }
                        else if (textSoFar.length == 2) {
                            $(this).val(textSoFar.substring(0, 1));
                        }
                    }
                }
                else {
                    //remove slashes to avoid 12//01/2014
                    $(this).val(textSoFar.substring(0, textSoFar.length - 1));
                }
            });

            //only numeric keys allowed in date field
            $(".ws-date").keypress(function(e){
                var keyCode = e.which;
                /*
                8 - (backspace)
                32 - (space)
                48-57 - (0-9)Numbers
                */
                if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
                  return false;
                }
              });

              $("#name").keypress(function(e){
                var keyCode = e.which;

                /* 
                48-57 - (0-9)Numbers
                65-90 - (A-Z)
                97-122 - (a-z)
                8 - (backspace)
                32 - (space)
                */
                // Not allow special 
                if ( !( (keyCode >= 48 && keyCode <= 57) 
                  ||(keyCode >= 65 && keyCode <= 90) 
                  || (keyCode >= 97 && keyCode <= 122) ) 
                  && keyCode != 8 && keyCode != 32) {
                  e.preventDefault();
                }
              });
            $(".ws-date").blur(function(){
                var date = $(this).val();
                if(date.length != 10 && date.length != 0){
                    $(this).after("<span class='date_error' style='color:red;'>Please enter a valid date format (dd/mm/yyyy)</span>");
                }else{
                    $(this).next(".date_error").remove();
                }
                $(this).focus(function(){
                    $(this).next(".date_error").remove();
                })
            });

        });

    </script>


<?php
    require("includes/footer.php");
?>