<?php
    //Declaring Variables
    $fname = ""; //first name
    $lname = ""; //last name
    $dob = ""; //date of birth
    $gender = ""; //
    $mobile = ""; //mobile number
    $email = ""; //
    $password = ""; //
    $password2 = ""; //verify password
    $signup_date = ""; //date of registration
    $profile_pic = "";
    $errorArray = array(); //error messages
        
    if(isset($_POST['submit_reg'])) {
        
        //registration First Name
        $fname = strip_tags($_POST['fname']);//remove html tags
        $fname = str_replace(' ', '', $fname); //remove spaces
        $fname = ucfirst(strtolower($fname)); //Uper Case first letter
        $_SESSION['fname'] = $fname;
        
        //registration Last Name
        $lname = strip_tags($_POST['lname']);//remove html tags
        $lname = str_replace(' ', '', $lname); //remove spaces
        $lname = ucfirst(strtolower($lname)); //Uper Case first letter
        $_SESSION['lname'] = $lname;

        //registration date of birth
        $dob = strip_tags($_POST['dob']);//remove html tags
        $dob = str_replace(' ', '', $dob); //remove spaces
        $_SESSION['dob'] = $dob;

        //registration gender
        $gender = strip_tags($_POST['gender']);//remove html tags
        $_SESSION['gender'] = $gender;

        //registration date of birth
        $mobile = strip_tags($_POST['mobilenum']);//remove html tags
        $mobile = str_replace(' ', '', $mobile); //remove spaces
        $_SESSION['mobilenum'] = $mobile;

        //registration email
        $email = strip_tags($_POST['email']);//remove html tags
        $email = str_replace(' ', '', $email); //remove spaces
        $email = strtolower($email); //Lower Case letter
        $_SESSION['email'] = $email;

        //registration Password
        $password = strip_tags($_POST['password']);//remove html tags
        $password2 = strip_tags($_POST['password2']);//remove html tags

        $signup_date = date("Y-m-d"); //current date
        
        //check if email is in valid format
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            
            //check if email already exists
            $email_check = mysqli_query($connection, "SELECT username FROM users WHERE username='$email'");
            
            //count the number of rows returned
            $num_rows = mysqli_num_rows($email_check);
            
            if($num_rows > 0){
                array_push($errorArray, "<span class='error'>Email already in use</span><br />");
            }
        }
        else {
            array_push($errorArray, "<span class='error'>Invalid email format</span><br />");
        }
        
        if(strlen($fname) > 25 || strlen($fname) < 2){
            array_push($errorArray, "<span class='error'>Your first name must be between 2 and 25 charachters</span><br />");
        }
        if(strlen($lname) > 25 || strlen($fname) < 2){
            array_push($errorArray, "<span class='error'>Your last name must be between 2 and 25 charachters</span><br />");
        }
        if($gender == ""){
            array_push($errorArray, "<span class='error'>Please select your gender</span><br />");
        }
        if(strlen($mobile) != 10 ){
            array_push($errorArray, "<span class='error'>Please enter a valid mobile number</span><br />");
        }
        if ($password !== $password2){
            array_push($errorArray, "<span class='error'>Passwords do not match</span><br />");
        }
        else if (strlen($password) < 5 || strlen($password) > 30){
            array_push($errorArray, "<span class='error'>Password lenth must be between 5 to 30 characters</span><br />");
        }
        else{
            $_SESSION['password'] = $password;
            $_SESSION['password2'] = $password2;

        }
        if(empty($errorArray)){
            $password = md5($password); //Encrypt Password before submitting to database

            //generate username by concatinating first name and last name
            $username = strtolower($fname . "_" . $lname);
            $check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");

            $i = 0;
            //if username exists add a number to username
            while(mysqli_num_rows($check_username_query) != 0){
                    $username = $username . ++$i; //add a number in loop to username if exiset

                    //below will execute when unique username found
                    if (mysqli_num_rows($check_username_query) != 0){
                        $username = strtolower($fname . "_" . $lname . "_" . $i);
                        $check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username = '$username'");
                    }
            }
            $rand = rand(1,16);
            if($rand == 1)
            $profile_pic = "assets/images/profile_pics/defaults/head_alizarin.png";
            else if($rand == 2)
            $profile_pic = "assets/images/profile_pics/defaults/head_amethyst.png";
            else if($rand == 3)
            $profile_pic = "assets/images/profile_pics/defaults/head_belize_hole.png";
            else if($rand == 4)
            $profile_pic = "assets/images/profile_pics/defaults/head_carrot.png";
            else if($rand == 5)
            $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
            else if($rand == 6)
            $profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";
            else if($rand == 7)
            $profile_pic = "assets/images/profile_pics/defaults/head_green_sea.png";
            else if($rand == 8)
            $profile_pic = "assets/images/profile_pics/defaults/head_nephritis.png";
            else if($rand == 9)
            $profile_pic = "assets/images/profile_pics/defaults/head_pete_river.png";
            else if($rand == 10)
            $profile_pic = "assets/images/profile_pics/defaults/head_pomegranate.png";
            else if($rand == 11)
            $profile_pic = "assets/images/profile_pics/defaults/head_pumpkin.png";
            else if($rand == 12)
            $profile_pic = "assets/images/profile_pics/defaults/head_red.png";
            else if($rand == 13)
            $profile_pic = "assets/images/profile_pics/defaults/head_sun_flower.png";
            else if($rand == 14)
            $profile_pic = "assets/images/profile_pics/defaults/head_turqoise.png";
            else if($rand == 15)
            $profile_pic = "assets/images/profile_pics/defaults/head_wet_asphalt.png";
            else if($rand == 16)
            $profile_pic = "assets/images/profile_pics/defaults/head_wisteria.png";

                
            //users table => ID, first_name, last_name, dob, gender, mobile, email, password, username, signup_date, profile_pic, num_posts, num_likes, user_closed, friend_array.
            $query = mysqli_query($connection, "INSERT INTO users VALUES ('','$fname','$lname','$dob', '$gender', 'mobile', '$email', '$password', '$username', '$signup_date', '$profile_pic', '0', '0', 'no', ',')");

            array_push($errorArray, "<span class='done'>Congrats! Acount has been created successfully, Go ahead to login.</span>");

            //clear values
            $_SESSION['fname'] = "";
	        $_SESSION['lname'] = "";
	        $_SESSION['dob'] = "";
	        $_SESSION['gender'] = "";
	        $_SESSION['mobilenum'] = "";
	        $_SESSION['email'] = "";
	        $_SESSION['password'] = "";
	        $_SESSION['password2'] = "";
        }
    }  

?>