<?php
	
	session_start();
	include '../config.php';

	if(isset($_POST['register'])) {
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
		$username     = $_POST['username'];
		$password     = md5($_POST['password']);
		$cpassword    = md5($_POST['cpassword']);
		$file         = basename($_FILES["fileToUpload"]["name"]);
		$year_level   = $_POST['level'];
	

		if(!$conn) {
        	die("Connection failed " . mysqli_connect_error());
        } else {
            $check_email = mysqli_query($conn, "SELECT * FROM student WHERE email= '$email' ");
            if(mysqli_num_rows($check_email) > 0) {
            $_SESSION['exists']  = "Email already exist.";
            header("Location: manage_student_create.php");
	        } else {
	        	$check_id = mysqli_query($conn, "SELECT * FROM student WHERE id_no= '$id_no' ");
	            if(mysqli_num_rows($check_id) > 0) {
	            $_SESSION['exists']  = "This ID No has already been used. Try again!";
	            header("Location: manage_student_create.php");
				} else {
	        		$check_username = mysqli_query($conn, "SELECT * FROM student WHERE username= '$username' ");
					if(mysqli_num_rows($check_username) > 0) {
					$_SESSION['exists']  = "Username has already been used. Try again!";
	            	header("Location: manage_student_create.php");
					} else {
						if($password != $cpassword) {
						$_SESSION['exists']  = "Password didn't matched. Try again.";
	            		header("Location: manage_student_create.php");
					} else {

						// Check if image file is a actual image or fake image
				        $target_dir = "../images-students/";
				        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				        $uploadOk = 1;
				        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				        // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				        // if($check !== false) {
				        // // $_SESSION['exists']  = "File is an image! - " . $check["mime"] . ".";
				        // // header("Location: course.php");
				        // $uploadOk = 1;
				        // } else {
				        // $_SESSION['invalid']  = "File is not an image!";
				        // $uploadOk = 0;
				        // }

				        // // Check if file already exists
				        // if (file_exists($target_file)) {
				        // $_SESSION['invalid']  = "File already exist.";
				        
				        // $uploadOk = 0;
				        // }

				        // Check file size
				        if ($_FILES["fileToUpload"]["size"] > 2000000) {
				        $_SESSION['invalid']  = "Your file is too large.";
				        $uploadOk = 0;
				        }

			                // Allow certain file formats
			                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			                $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
			                $uploadOk = 0;
			                }

			                // Check if $uploadOk is set to 0 by an error
			                if ($uploadOk == 0) {
			                $_SESSION['error']  = "Your file was not uploaded.";
			                header("Location: manage_student_create.php");
			                // if everything is ok, try to upload file
			                } else {

			                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			                    $sql = " INSERT INTO student (id_no, firstname, middlename, lastname, dob, age, email, contact, address, username, password, images, dept_id, year_level) VALUES ('$id_no', '$firstname', '$middlename', '$lastname', '$dob', '$age', '$email', '$contact', '$address', '$username', '$password', '$file', '$department', '$year_level')";
			                          if(mysqli_query($conn, $sql)) {
			                          $_SESSION['success']  = "You have successfully added a student information.";
			                          header("Location: manage_student.php");                                
			                          } else {
			                            $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
			                            header("Location: manage_student_create.php");
			                          }
			                    } else {
			                          $_SESSION['exists'] = "There was an error uploading your file.";
			                          header("Location: manage_student_create.php");
			                    }
			                }
					 }
					}
					
				}
			}
		}
	}
?>