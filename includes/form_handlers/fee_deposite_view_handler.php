<?php

    #if redirected from "print_receipts_view_single" then session variables are as following:
    #i.e. session variables values will be collected from the url by get method 

    if(isset($_GET['fee_session']) && isset($_GET['admission_num']) && isset($_GET['student_name']) && isset($_GET['student_class']) && isset($_GET['fee_month']) && isset($_GET['rec_date'])){
        $_SESSION['session'] = $_GET['fee_session'];
        $_SESSION['adm_num'] = $_GET['admission_num'];
        $_SESSION['std_name'] = $_GET['student_name'];
        $_SESSION['classes'] = $_GET['student_class'];
        $_SESSION['type'] = $_GET['fee_month'];
        if($_SESSION['type'] == '0')
            $_SESSION['type'] = 'a';
        else
            $_SESSION['type'] = 'm';

        $_SESSION['bill_date'] = $_GET['rec_date'];
        $_SESSION['month'] = $_GET['fee_month'];
        
    }
    #Go back if previouse page values not given.        
    if(!isset($_SESSION['session']) || !isset($_SESSION['adm_num']) || !isset($_SESSION['classes']) || !isset($_SESSION['type']) || !isset($_SESSION['bill_date'])){
        header("location: fee_deposite.php");
    }
    else{#if all values on previous page are given that continue to this page.

        #declaring variables from session variables from previous webpage. 
        $session = $_SESSION['session'];    #variable1
        $adm_num = $_SESSION['adm_num'];    #variable2
        $class = $_SESSION['classes'];      #variable3
        $_SESSION['sel_class'] = $_SESSION['classes'];      #variable required to redirect 'print receipt' page
        $fee_type = $_SESSION['type'];      #variable4
        if($fee_type == 'm')
            $fee_type = "Monthly Fee";
        elseif($fee_type == 'a'){
            $fee_type = "Admission/Other Fee";
            $_SESSION['month'] = '0';
        }
        $bill_date = $_SESSION['bill_date'];#variable5
        
        #query to GET COMPLETE FEE STRUCTURE for the submitted class. 
        $fee_structure_q = "SELECT * FROM fee_structure WHERE class = '$class'";
        $fee_structure = mysqli_query($db_con, $fee_structure_q);
        $fee_struc_row = mysqli_num_rows($fee_structure);
        if($fee_struc_row > 0){
            $fee_struc = mysqli_fetch_array($fee_structure);
            #declaring "FEE STRUCTURE VARIABLES" value recieved from database table
            $admission = $fee_struc['admission'];
            $monthly = $fee_struc['monthly'];
            $sports = $fee_struc['sports'];
            $building = $fee_struc['building'];
            $computer = $fee_struc['computer'];
            $generator = $fee_struc['generator'];
            $other = $fee_struc['other'];
            $total = $fee_struc['total'];
        }
        else{
            echo "<div class='error' style='z-index:9999;'>please add fee structure for the selected class.";
            echo "<br>Please wait...</div>";
            unset($_SESSION['session']);
            unset($_SESSION['adm_num']);
            header("Refresh: 3");
            return false;
        }
        #queries to "Get Total Deposited Fee by a Student in whole Session".
        $deposited_fee_q = "SELECT name, fname, SUM(admission_fee) AS ADMISSION_FEE, SUM(monthly_fee) AS MONTHLY_FEE, SUM(sports_fee) AS SPORTS_FEE, SUM(building_fee) AS BUILDING_FEE, SUM(computer_fee) AS COMPUTER_FEE, SUM(generator_fee) AS GENERATOR_FEE, SUM(other_fee) AS OTHER_FEE, SUM(total_fee) AS TOTAL_FEE FROM fee_deposit WHERE session = '$session' AND admission = '$adm_num' AND `class` = '$class'";
        $deposited_fee = mysqli_query($db_con, $deposited_fee_q);
        $deposited_fee_row = mysqli_num_rows($deposited_fee);
        if($deposited_fee_row > 0){
            $fee_deposited = mysqli_fetch_array($deposited_fee);
            #declaring variables recieved values from database table for selected session and admission number
            $get_std_name = $fee_deposited['name'];
            $get_fname = $fee_deposited['fname'];
            $get_admission_fee = $fee_deposited['ADMISSION_FEE'];
            $get_monthly_fee = $fee_deposited['MONTHLY_FEE'];
            $get_sports_fee = $fee_deposited['SPORTS_FEE'];
            $get_building_fee = $fee_deposited['BUILDING_FEE'];
            $get_computer_fee = $fee_deposited['COMPUTER_FEE'];
            $get_generator_fee = $fee_deposited['GENERATOR_FEE'];
            $get_other_fee = $fee_deposited['OTHER_FEE'];
            $get_total_fee = $fee_deposited['TOTAL_FEE'];
        }
        
        if(isset($_POST['submit_month'])){
            $_SESSION['month'] = $_POST['month'];
            $_SESSION['std_name'] = $_POST['std_name'];
        }elseif($_SESSION['type'] == 'a'){
            if(isset($_POST['std_name']))
            $_SESSION['std_name'] = $_POST['std_name'];
        }
        
        #when month submitted check whether fee is deposited for the selected month or not?
        if(isset($_SESSION['month'])){
            $month = $_SESSION['month'];
            if($_SESSION['type'] != 'a')
                $std_name = $_SESSION['std_name'];
            $get_month_fee_q = "SELECT * FROM fee_deposit WHERE session = '$session' AND month='$month' AND admission = '$adm_num' LIMIT 1";
            $get_month_fee = mysqli_query($db_con, $get_month_fee_q);
            $get_month_fee_row = mysqli_num_rows($get_month_fee);
            if($get_month_fee_row > 0){
                $_SESSION['already_month_fee'] = $get_month_fee_row;

                $get_month_fee = mysqli_fetch_array($get_month_fee);
                
                $already_admission = $get_month_fee['admission_fee'];
                $already_monthly = $get_month_fee['monthly_fee'];
                $already_sports = $get_month_fee['sports_fee'];
                $already_building = $get_month_fee['building_fee'];
                $already_computer = $get_month_fee['computer_fee'];
                $already_generator = $get_month_fee['generator_fee'];
                $already_other = $get_month_fee['other_fee'];
                $already_total = $get_month_fee['total_fee'];
                if(!isset($_POST['submit_fields'])){
                    if($_SESSION['type'] != 'a'){
                        echo "<script>alert('Fees by \"".strtoupper($std_name)."\" for ".num_alpha_month($_SESSION['month'])." (".$session.") against Admission No. ".$adm_num." is already deposited')</script>";
                    }else{
                        echo "<script>alert('Admission Fees against Admission No. ".$adm_num." is already deposited.')</script>";
                        
                    }
                }
                
            }
        }
        if(isset($_POST['submit_fields'])){
            $_SESSION['std_name'] = $_POST['std_name'];
            $_SESSION['fname'] = $_POST['fname'];
            if(isset($_POST['admission_fee'])){
                $_SESSION['admission_fee'] = $_POST['admission_fee'];
            }else{
                $_SESSION['admission_fee'] = 0;
            }
            $_SESSION['other_fee'] = $_POST['other_fee'];
        }
        #When fees detail submitted
        if(isset($_POST['submit_fields']) && isset($_SESSION['std_name']) && isset($_SESSION['fname']) && isset($_SESSION['month'])){
            if(isset($_SESSION['already_month_fee']) && ($_SESSION['already_month_fee'] > 0)){
                if($_SESSION['type'] !='a' && $_POST['monthly_fee'] != '' && $_POST['sports_fee'] != '' && $_POST['building_fee'] != '' && $_POST['computer_fee'] != '' && $_POST['generator_fee'] != '' && $_POST['other_fee'] != ''){
                    $std_name = $_SESSION['std_name'];
                    $fname = $_SESSION['fname'];
                    
                    $monthly_fee = $_POST['monthly_fee'];
                    $sports_fee = $_POST['sports_fee'];
                    $building_fee = $_POST['building_fee'];
                    $computer_fee = $_POST['computer_fee'];
                    $generator_fee = $_POST['generator_fee'];
                    $other_fee = $_POST['other_fee'];

                    $total_fee = 0;
                    $total_fee += $monthly_fee;
                    $total_fee += $sports_fee;
                    $total_fee += $building_fee;
                    $total_fee += $computer_fee;
                    $total_fee += $generator_fee;
                    $total_fee += $other_fee;

                    if( $std_name != "" && $fname != "" && $monthly_fee != "" && $monthly_fee != 0 && $adm_num != ""){
                        $query_select_bill_num = "SELECT bill_num FROM fee_deposit ORDER BY id DESC LIMIT 1";
                        $select_bill_num = mysqli_query($db_con, $query_select_bill_num);
                        $bill_num_data = mysqli_fetch_assoc($select_bill_num);

                        $bill_num = $bill_num_data['bill_num'];
                        $bill_num++;

                        $query = "UPDATE `fee_deposit` SET `bill_date` = '$bill_date', `name` = '$std_name', `fname` = '$fname', `monthly_fee` = '$monthly_fee', `sports_fee` = '$sports_fee', `building_fee` = '$building_fee', `generator_fee` = '$generator_fee', `computer_fee` = '$computer_fee', `other_fee` = '$other_fee', `total_fee` = '$total_fee' WHERE `fee_deposit`.`session` = '$session' AND `admission` = '$adm_num' AND `month` = '$month'";
                        $insert_data  =  mysqli_query($db_con, $query);

                        #selecting data from 'months' table
                        $query1 = "SELECT `months` FROM months WHERE `admission` = '$adm_num' AND `session` = '$session' LIMIT 1";
                        $get_months_data = mysqli_query($db_con, $query1);
                        $get_months_rows = mysqli_num_rows($get_months_data);
                        $get_months = mysqli_fetch_array($get_months_data);

//                        $alpha_month = num_alpha_month_short($month); 
//                        if($get_months_rows > 0){
//                            $months = array($get_months['months']);
//                            if(!in_array($alpha_month, $months)){
//                                array_push($months, "$alpha_month,");
//
//                                #update months table data
//                                $query2 = "UPDATE `months` SET `months` = '";
//                                foreach($months as $months){
//                                    $query2 .= "$months";
//                                }
//                                $query2 .= "'WHERE admission = '$adm_num' and session = '$session'";
//                                $insert_data2 = mysqli_query($db_con, $query2);
//                            }else{
//                                
//                            }
//                        }
//                        else{
//                            $months = $alpha_month.",";
//                            #insert into months table
//                            $query2 = "INSERT INTO `months` VALUES ('', '$adm_num', '$session', '$months')";
//                            $insert_data2  =  mysqli_query($db_con, $query2);
//                        }

                        echo "<div class='error success'><b>Congrats!</b> Details saved successfuly.</div>";
                        echo "<div class='error success'><strong>Congrats!</strong>Fee details updated successfully.</div>";
                        echo "<div class='loading'><img src='includes/images/loading/loading4.gif'></div>";
                        header("refresh:5; url=print_receipts_view_single.php?admissionNumber=$adm_num");
                        unset($_SESSION['adm_num']);
                        
                    }else{
                        echo "<div class='error'>please enter all fields.</div>";
                    }
                }elseif($_SESSION['type'] == 'a' ){        
                    $std_name = $_SESSION['std_name'] = $_POST['std_name'];
                    $fname = $_SESSION['fname'] = $_POST['fname'];

                    if($_POST['admission_fee'] != '')
                        $admission_fee = $_POST['admission_fee'];
                    else
                        $admission_fee = 0;
                    if($_POST['other_fee'] !='')
                        $other_fee = $_POST['other_fee'];
                    else
                        $other_fee = 0;

                    $total_fee = 0;
                    $total_fee += $admission_fee;
                    $total_fee += $other_fee;
                    if( $std_name != "" && $fname != "" && $admission_fee != "" && $admission_fee != 0 && $adm_num != ""){

                        $query_select_bill_num = "SELECT bill_num FROM fee_deposit ORDER BY id DESC LIMIT 1";
                        $select_bill_num = mysqli_query($db_con, $query_select_bill_num);
                        $bill_num_data = mysqli_fetch_assoc($select_bill_num);
                        $bill_num = $bill_num_data['bill_num'];
                        $bill_num++;

                        $query = "UPDATE `fee_deposit` SET `admission_fee` = '$admission_fee', `other_fee` = '$other_fee', `total_fee` = '$total_fee' WHERE `fee_deposit`.`session` = '$session' AND `admission` = '$adm_num' AND `month` = '$month'";
                        $insert_data  =  mysqli_query($db_con, $query);
                        
                        #selecting data from 'months' table
                        $query1 = "SELECT `months` FROM months WHERE `admission` = '$adm_num' AND `session` = '$session' LIMIT 1";
                        $get_months_data = mysqli_query($db_con, $query1);
                        $get_months_rows = mysqli_num_rows($get_months_data);
                        $get_months = mysqli_fetch_array($get_months_data);

//                        $alpha_month = num_alpha_month_short($month); 
//                        if($get_months_rows > 0){
//                            $months = array($get_months['months']);
//                            if(!in_array($alpha_month, $months)){
//                                array_push($months, "$alpha_month,");
//
//                                #update months table data
//                                $query2 = "UPDATE `months` SET `months` = '";
//                                foreach($months as $months){
//                                    $query2 .= "$months";
//                                }
//                                $query2 .= "'WHERE admission = '$adm_num' and session = '$session'";
//                                $insert_data2 = mysqli_query($db_con, $query2);
//                            }else{
//                                
//                            }
//                        }
//                        else{
//                            $months = $alpha_month.",";
//                            #insert into months table
//                            $query2 = "INSERT INTO `months` VALUES ('', '$adm_num', '$session', '$months')";
//                            $insert_data2  =  mysqli_query($db_con, $query2);
//                        }                        

                        echo "<div class='error success'><strong>Congrats!</strong> Details saved successfuly.</div>";
                        echo "<div class='loading'><img src='includes/images/loading/loading4.gif'></div>";
                        header("refresh:5");
                        unset($_SESSION['session']);
                        unset($_SESSION['adm_num']);

                    }else{
                        echo "<div class='error'>please enter all fields.</div>";
                    }
                }else{
                        echo "<div class='error'>please enter all fields.</div>";
                }
            }elseif($_SESSION['type'] != 'a' && $_POST['monthly_fee'] != '' && $_POST['sports_fee'] != '' && $_POST['building_fee'] != '' && $_POST['computer_fee'] != '' && $_POST['generator_fee'] != '' && $_POST['other_fee'] != ''){
                $std_name = $_SESSION['std_name'];
                $fname = $_SESSION['fname'];

                $monthly_fee = $_POST['monthly_fee'];
                $sports_fee = $_POST['sports_fee'];
                $building_fee = $_POST['building_fee'];
                $computer_fee = $_POST['computer_fee'];
                $generator_fee = $_POST['generator_fee'];
                $other_fee = $_POST['other_fee'];

                $total_fee = 0;
                $total_fee += $monthly_fee;
                $total_fee += $sports_fee;
                $total_fee += $building_fee;
                $total_fee += $computer_fee;
                $total_fee += $generator_fee;
                $total_fee += $other_fee;

                if( $std_name != "" && $fname != "" && $monthly_fee != "" && $monthly_fee != 0 && $adm_num != ""){
                    $query_select_bill_num = "SELECT bill_num FROM fee_deposit ORDER BY id DESC LIMIT 1";
                    $select_bill_num = mysqli_query($db_con, $query_select_bill_num);
                    $bill_num_data = mysqli_fetch_assoc($select_bill_num);

                    $bill_num = $bill_num_data['bill_num'];
                    $bill_num++;

                    #insert into fee_deposit table
                    $query = "INSERT INTO `fee_deposit` VALUES ('', '$session', '$month', '$adm_num', '$bill_num', '$bill_date', '$class', '$std_name', '$fname', '', '$monthly_fee', '$sports_fee', '$building_fee', '$generator_fee', '$computer_fee', '$other_fee', '$total_fee')";
                    $insert_data  =  mysqli_query($db_con, $query);
                    
                    #selecting data from 'months' table
                    $query1 = "SELECT `months` FROM months WHERE `admission` = '$adm_num' AND `session` = '$session' LIMIT 1";
                    $get_months_data = mysqli_query($db_con, $query1);
                    $get_months_rows = mysqli_num_rows($get_months_data);
                    $get_months = mysqli_fetch_array($get_months_data);
                    
                    $alpha_month = num_alpha_month_short($month); 
                    if($get_months_rows > 0){
                        $months = array($get_months['months']);
                        array_push($months, "$alpha_month, ");

                        #update months table data
                        $query2 = "UPDATE `months` SET `months` = '";
                        foreach($months as $months){
                            $query2 .= "$months";
                        }
                        $query2 .= "'WHERE admission = '$adm_num' and session = '$session'";
                        $insert_data2 = mysqli_query($db_con, $query2);
                    }
                    else{
                        $months = $alpha_month.",";
                        #insert into months table
                        $query2 = "INSERT INTO `months` VALUES ('', '$adm_num', '$session', '$months')";
                        $insert_data2  =  mysqli_query($db_con, $query2);
                    }
                    
                    echo "<div class='error success'><b>Congrats!</b> Details saved successfuly.</div>";
                    echo "<div class='error success'><strong>Congrats!</strong>Fee details updated successfully.</div>";
                    echo "<div class='loading'><img src='includes/images/loading/loading4.gif'></div>";
                    header("refresh:5; url=print_receipts_view_single.php?admissionNumber=$adm_num");
                    unset($_SESSION['adm_num']);

                }else{
                    echo "<div class='error'>please enter all fields.</div>";
                }
            }elseif(isset($_POST['submit_fields']) && $_SESSION['type'] =='a' ){        
                    $std_name = $_SESSION['std_name'] = $_POST['std_name'];
                    $fname = $_SESSION['fname'] = $_POST['fname'];

                    if($_POST['admission_fee'] != '')
                        $admission_fee = $_POST['admission_fee'];
                    else
                        $admission_fee = 0;
                    if($_POST['other_fee'] !='')
                        $other_fee = $_POST['other_fee'];
                    else
                        $other_fee = 0;

                    $total_fee = 0;
                    $total_fee += $admission_fee;
                    $total_fee += $other_fee;
                    if( $std_name != "" && $fname != "" && $admission_fee != "" && $admission_fee != 0 && $adm_num != ""){

                        $query_select_bill_num = "SELECT bill_num FROM fee_deposit ORDER BY id DESC LIMIT 1";
                        $select_bill_num = mysqli_query($db_con, $query_select_bill_num);
                        $bill_num_data = mysqli_fetch_assoc($select_bill_num);
                        $bill_num = $bill_num_data['bill_num'];
                        $bill_num++;

                        $query = "INSERT INTO `fee_deposit` VALUES ('', '$session', 0, '$adm_num', '$bill_num', '$bill_date', '$class', '$std_name', '$fname', '$admission_fee', 0, 0, 0, 0, 0, '$other_fee', '$total_fee')";

                        #selecting data from 'months' table
                        $query1 = "SELECT `months` FROM months WHERE `admission` = '$adm_num' AND `session` = '$session' LIMIT 1";
                        $get_months_data = mysqli_query($db_con, $query1);
                        $get_months_rows = mysqli_num_rows($get_months_data);
                        $get_months = mysqli_fetch_array($get_months_data);

                        $alpha_month = num_alpha_month_short($month);
                        if($get_months_rows > 0){
                            $months = array($get_months['months']);
                            array_push($months, "$alpha_month,");

                            #update months table data
                            $query2 = "UPDATE `months` SET `months` = '";
                            foreach($months as $months){
                                $query2 .= "$months";
                            }
                            $query2 .= "'WHERE admission = '$adm_num' and session = '$session'";
                            $insert_data2 = mysqli_query($db_con, $query2);
                        }
                        else{
                            $months = $alpha_month.",";
                            #insert into months table
                            $query2 = "INSERT INTO `months` VALUES ('', '$adm_num', '$session', '$months')";
                            $insert_data2  =  mysqli_query($db_con, $query2);
                        }

                        $insert_data  =  mysqli_query($db_con, $query);
                        echo "<div class='error success'><strong>Congrats!</strong> Details saved successfuly.</div>";
                        echo "<div class='loading'><img src='includes/images/loading/loading4.gif'></div>";
                        header("refresh:5");
                        unset($_SESSION['session']); unset($_SESSION['adm_num']);

                    }else{
                        echo "<div class='error'>please enter all fields.</div>";
                    }
                }else{
                        echo "<div class='error'>please enter all fields.</div>";
                }
            }
        }
