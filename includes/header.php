<?php
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit();
    }
    else{
//        require_once("includes/classes/Institute.php");
//
//        $inst_obj = new Institute($db_con);
//        $inst = $inst_obj->showInstData();
//        if($inst == ""){
//        }
    }
    #hide warnings
	#error_reporting(E_ERROR | E_PARSE);

?>
<html>

<head>
    <title>Receipt Form</title>
    <link rel="icon" href="includes/images/logo.ico" />
    <link rel="stylesheet" href="mystyle.css" />
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="header">
        <h1 class="company_name">
            <a href="index.php">
                S.D.P.P. Sr. Sec. School
            </a>
        </h1>
    </div>
    <div class="nav_bar">
        <a href="index.php">
            <div class="nav_left link1">
                Home            
            </div>
        </a>
        <a href="fee_structure.php">
            <div class="nav_left link2">
                Fee Structure            
            </div>
        </a>
        <a href="fee_deposite.php">
            <div class="nav_left link3">
                Deposit Fees            
            </div>
        </a>
        <a href="print_receipts.php">
            <div class="nav_left link4">
                Print Receipts
            </div>
        </a>
        <a href="includes/logout.php">
            <div name="logout_btn" class="nav_right logout">
                Logout
            </div>
        </a>
        <a class="nav_right date_now">
            Date:
            <?php 
                $datenow = date_default_timezone_set("Asia/Kolkata");
                echo date("d/m/Y");
            ?>
        </a>
    </div>
