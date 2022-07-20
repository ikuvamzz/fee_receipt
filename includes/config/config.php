<?php
	ob_start(); //Turns on output buffering
	$timezone = date_default_timezone_set("Asia/Kolkata");
    session_start();
    $db_urls = parse_url(getenv('DATABASE_URL'));
    $db_host = $db_urls["host"];
    $db_user = $db_urls["user"];
    $db_pass = $db_urls["pass"];
    $db_name = ltrim($db_urls["path"],'/');

    $db_con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    //test connection
    if(mysqli_connect_error())
        die("<div class='error'><b>Database query faild</b>" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")</div>");
    
    //select institute data
    $inst_table = "SELECT * from institute";
    $result = mysqli_query($db_con, $inst_table);
    if(!$result){
        die("<div class='error'><b>Oh! sorry,</b> Unable to find '<b>Institute</b>' table in database.</div>");
    }
?>
