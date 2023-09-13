<?php 

	session_start();
	include '../config.php';

	// REQUEST ENROLLMENT
	if(isset($_POST['enrollment'])) {
		$id = $_POST['id'];
		$date = date('Y-m-d H:i:s');

		$check = mysqli_query($conn, "SELECT * FROM enrollment WHERE student_Id='$id' AND request_status='Confirmed' || request_status='Pending'");
		if(mysqli_num_rows($check)>0) {
			echo '<script> alert ("You have done requested your enrollment before."); </script>';
			echo '<script> window.history.go(-1); </script>';
		} else {
			$save = mysqli_query($conn, "INSERT INTO enrollment (student_Id,date_requested) VALUES ('$id', '$date') ");
			echo '<script> alert ("You have successfully requested your enrollment."); </script>';
			echo '<script> window.history.go(-1); </script>';
		}
	}




	// REQUEST GRADE
	if(isset($_POST['grade'])) {
		$id = $_POST['id'];
		$date = date('Y-m-d H:i:s');

		$check = mysqli_query($conn, "SELECT * FROM request_grade WHERE student_Id='$id' AND request_grade_status='Confirmed' || request_grade_status='Pending'");
		if(mysqli_num_rows($check)>0) {
			echo '<script> alert ("You have done requested your grades before."); </script>';
			echo '<script> window.history.go(-1); </script>';
		} else {
			$save = mysqli_query($conn, "INSERT INTO request_grade (student_Id,grade_date_requested) VALUES ('$id', '$date') ");
			echo '<script> alert ("You have successfully requested your enrollment."); </script>';
			echo '<script> window.history.go(-1); </script>';
		}
	}
	


?>