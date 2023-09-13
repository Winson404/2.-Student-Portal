<?php
	
	session_start();
	include '../config.php';

	if(isset($_POST['update'])) {
		$stud_id      = $_POST['student_id'];
		$id_no        = $_POST['id_no'];
		$firstname    = $_POST['firstname'];
		$middlename   = $_POST['middlename'];
		$lastname     = $_POST['lastname'];
		$dob          = $_POST['dob'];
		$age          = $_POST['age'];
		$address      = $_POST['address'];
		$email        = $_POST['email'];
		$contact      = $_POST['contact'];
		$department   = $_POST['department'];
		//$username     = $_POST['username'];
		//$password     = md5($_POST['password']);
		//$cpassword    = md5($_POST['cpassword']);
		//$file         = basename($_FILES["fileToUpload"]["name"]);
		// $year_level   = $_POST['level'];
	

		if(!$conn) {
        	die("Connection failed " . mysqli_connect_error());
        } else {
            $sql = mysqli_query($conn, "UPDATE student SET id_no='$id_no', firstname='$firstname', middlename='$middlename', lastname='$lastname', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', dept_id='$department' WHERE Id='$stud_id' ");

                  if($sql) {
                  $_SESSION['success']  = "You have successfully added a student information.";
                  header("Location: manage_student.php");                                
                  } else {
                    $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                    header("Location: manage_student_update.php");
                  }
			}
	}
?>