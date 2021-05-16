<?php	
    $errorArray = array(); //error messages
	if(isset($_POST['login_button'])) {
		
		$email = $_POST['log_email'];

		$_SESSION['log_email'] = $email;
		$password = md5($_POST['log_password']);

		$check_database_query_email = mysqli_query($db_con, "SELECT * FROM users WHERE username='$email'");
		$check_database_query_email_password = mysqli_query($db_con, "SELECT * FROM users WHERE username='$email' AND password='$password'");


		$check_login_query_email = mysqli_num_rows($check_database_query_email);
		$check_login_query_email_password = mysqli_num_rows($check_database_query_email_password);

		if($email==""){
			array_push($errorArray, "Please enter your email.", "Welcome!");
		}
		else if($_POST['log_password']==""){
			array_push($errorArray, "Please enter your password.");
		}
		
		else if($check_login_query_email == 0){
			array_push($errorArray, "Given Username is not registered.");
		}
		else if($check_login_query_email_password == 1){
			$row = mysqli_fetch_array($check_database_query_email_password);
			$username = $row['username'];

			$_SESSION['username'] = $username;
			header('Location: index.php');
			exit();

		}
		else {
			array_push($errorArray, "Incorrect Password.");
		}
	}
	else if(!isset($_POST['login_button'])) {
		array_push($errorArray, "Welcome!");
	}
?>