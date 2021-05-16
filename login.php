<?php
    require "includes/config/config.php";
//    require "includes/form_handlers/create_account_handler.php";
    require "includes/form_handlers/login_handler.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="shortcut icon" href="includes/images/logo.ico" />
    <link href="includes/css/login.css" rel="stylesheet" />
</head>
<body>
    <div class="login-area">
        <div class="container">
            <h3>
                <?php
                if(in_array("Welcome!",$errorArray))
                echo "<span class='done'>Welcome!</span><br />";
                ?>
                Please enter login details.
            </h3>
            <form action="login.php" class="login-form" method="POST">
                <label for="log_email" class="lbl-username"> Username: </label>
                <input type="text" class="input-username" name="log_email" placeholder="Enter Username" value="<?php
                if(isset($_SESSION['log_email'])){
                    echo $_SESSION['log_email'];
                }
                ?>"autofocus autocomplete="on" />
                <br />
                <label for="log_password" class="lbl-password">Password: </label>
                <input type="password" class="input-password" name="log_password" placeholder="Enter Password" value="<?php
                if(isset($_POST['log_password'])) {
                    echo $_POST['log_password'];
                }
                ?>"autofocus autocomplete="on" />
                <br />
                <?php
                    if(in_array("Incorrect Password.",$errorArray))
                    echo "<span class='error'>*Incorrect Password.</span><br />";

                    else if(in_array("Given Username is not registered.",$errorArray))
                    echo "<span class='error'>*Given Username is not registered.</span><br />";

                    else if(in_array("Please enter your email.", $errorArray))
                    echo "<span class='error'>Please enter your email.</span><br />";

                    else if(in_array("Please enter your password.", $errorArray))
                    echo "<span class='error'>Please enter your password.</span><br />";

                ?>
                <p class="forget">
<!--                    <a href="#"><b>Forget Password</b></a>-->
                </p>
                <button type="submit" name="login_button" class="btn-login" >Login</button>
            </form>
        </div>
    </div>
</body>
</html>