<?php 
	session_start();
	include '../config.php'; 
	if(isset($_POST['delete_department'])) {
		$id = $_POST['dept_id'];

		$delete = mysqli_query($conn, "DELETE FROM department WHERE Id='$id' ");

		if($delete) {
			$_SESSION['success']  = "Department has been deleted.";
        	header("Location: manage_department.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_department.php");
		}
	}


	// DELETE SCHOOL YEAR
	

	if(isset($_POST['delete_schoolyear'])) {
		$id = $_POST['id'];

		$delete = mysqli_query($conn, "DELETE FROM schoolyear WHERE Id='$id' ");

		if($delete) {
			$_SESSION['success']  = "School year has been deleted.";
        	header("Location: manage_schoolyear.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_schoolyear.php");
		}
	}
	


	// DELETE SEMESTER
	
	if(isset($_POST['delete_semester'])) {
		$id = $_POST['semester_Id'];

		$delete = mysqli_query($conn, "DELETE FROM semester WHERE Id='$id' ");

		if($delete) {
			$_SESSION['success']  = "Semester has been deleted.";
        	header("Location: manage_semester.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_semester.php");
		}
	}
	

	// DELETE STUDENT
	
	if(isset($_POST['delete_student'])) {
		$id = $_POST['stud_id'];

		$delete = mysqli_query($conn, "DELETE FROM student WHERE Id='$id' ");

		if($delete) {
			$_SESSION['success']  = "Student account has been deleted.";
        	header("Location: manage_student.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_student.php");
		}
	}
	


	// DELETE USER
	
	if(isset($_POST['delete_user'])) {
		$id = $_POST['user_id'];

		$delete = mysqli_query($conn, "DELETE FROM user WHERE Id='$id' ");

		if($delete) {
			$_SESSION['success']  = "User account has been deleted.";
        	header("Location: manage_user.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_user.php");
		}
	}




	// DELETE ANNOUNCMENT
	
	if(isset($_POST['delete_announcement'])) {
		$announcement_id = $_POST['announcement_id'];

		$delete_announcement_id = mysqli_query($conn, "DELETE FROM announcement WHERE Id='$announcement_id' ");

		if($delete_announcement_id) {
			$_SESSION['success']  = "Announcement has been deleted.";
        	header("Location: manage_announcement.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_announcement.php");
		}
	}



	// DELETE ACTIVITY
	
	if(isset($_POST['delete_activity'])) {
		$activity_id = $_POST['activity_id'];

		$delete_announcement_id = mysqli_query($conn, "DELETE FROM daily_activities WHERE Id='$activity_id' ");

		if($delete_announcement_id) {
			$_SESSION['success']  = "Activity has been deleted.";
        	header("Location: manage_daily_activities.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_daily_activities.php");
		}
	}



	// DELETE SUBJECT
	
	if(isset($_POST['delete_subject'])) {
		$delete_subject = $_POST['delete_subjects'];

		$delete_announcement_id = mysqli_query($conn, "DELETE FROM subject WHERE sub_Id='$delete_subject' ");

		if($delete_announcement_id) {
			$_SESSION['success']  = "Subject has been deleted.";
        	header("Location: manage_subject.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_subject.php");
		}
	}




	// DELETE LEVEL
	
	if(isset($_POST['delete_level'])) {
		$lev_id = $_POST['level_id'];

		$delete_announcement_id = mysqli_query($conn, "DELETE FROM year_level WHERE level_Id='$lev_id' ");

		if($delete_announcement_id) {
			$_SESSION['success']  = "Level has been deleted.";
        	header("Location: manage_level.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_level.php");
		}
	}







	// DELETE LEVEL
	
	if(isset($_POST['delete_grade'])) {
		$grade_id = $_POST['grade_id'];

		$delete_grade_id = mysqli_query($conn, "DELETE FROM student_grade WHERE grade_id='$grade_id' ");

		if($delete_grade_id) {
			$_SESSION['success']  = "Student remark has been deleted.";
        	header("Location: manage_grades.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon deleting the data.";
        	header("Location: manage_grades.php");
		}
	}



?>