<?php
	
	session_start();
	include '../config.php';

	if(isset($_POST['update_user'])) {
		$faculty_id   = $_POST['faculty_id'];
		$firstname    = $_POST['firstname'];
		$middlename   = $_POST['middlename'];
		$lastname     = $_POST['lastname'];
		$dob          = $_POST['dob'];
		$age          = $_POST['age'];
		$address      = $_POST['address'];
		$email        = $_POST['email'];
		$contact      = $_POST['contact'];
		$username     = $_POST['username'];
		//$department   = $_POST['department'];
		//$password     = md5($_POST['password']);
		//$cpassword    = md5($_POST['cpassword']);
		//$file         = basename($_FILES["fileToUpload"]["name"]);
		//$year_level   = $_POST['level'];
	

		if(!$conn) {
        	die("Connection failed " . mysqli_connect_error());
        } else {
            $sql = mysqli_query($conn, "UPDATE user SET firstname='$firstname', middlename='$middlename', lastname='$lastname', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', username='$username' WHERE Id='$faculty_id' ");

                  if($sql) {
                  $_SESSION['success']  = "Student information has been updated.";
                  header("Location: manage_user.php");                                
                  } else {
                    $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                    header("Location: manage_user_update.php");
                  }
			}
	}
?>