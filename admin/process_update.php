<?php 
	session_start();
	include '../config.php'; 
	if(isset($_POST['update_department'])) {
		$id = $_POST['dept_id'];
		$department = $_POST['department'];
    $description = $_POST['description'];
		$update = mysqli_query($conn, "UPDATE department set dept_name='$department', department_description='$description' WHERE Id='$id' ");

		if($update) {
			$_SESSION['success']  = "Department has been update.";
        	header("Location: manage_department.php");
		} else {
			$_SESSION['exists']  = "There is something wrong upon updating the data.";
        	header("Location: manage_department.php");
		}
	}





##<!-----------------------------------------UPDATE SCHOOL YEAR CODE------------------------------------------------------------------->

	if(isset($_POST['update_schoolyear'])) {
          $id         = $_POST['Id'];
          $schoolyear = $_POST['schoolyear'];
          $status     = $_POST['status'];

          if(!$conn) {
          die("Connection failed " . mysqli_connect_error());
          } 
           else {         
                $query = mysqli_query($conn, "SELECT * FROM schoolyear WHERE status='$status'");
                $row = mysqli_fetch_array($query);
                $active = $row['status'];
                if($active == 'Active' AND $status == 'Active') {
                $_SESSION['exists'] = "There is already an active year";   
                header("Location: manage_schoolyear.php");    
                exit();            
                } else {
                      $sql ="UPDATE schoolyear SET schoolyear='$schoolyear', status = '$status' WHERE Id = '$id' ";
                      if(mysqli_query($conn, $sql)) {
                      $_SESSION['success'] = "School year has been updated.";   
                      header("Location: manage_schoolyear.php");
                      } else {
                          $_SESSION['exists'] = "Something went wrong while updating the data.";   
                          header("Location: manage_schoolyear.php");
                      }     
                }                                      
          } 
      }



   
    // CONFIRM STUDENT ACCOUNT
    include '../config.php'; 
    if(isset($_POST['approve'])) {
      $id = $_POST['approve_id'];

      $update = mysqli_query($conn, "UPDATE student set status='Confirmed' WHERE Id='$id' ");

      if($update) {
        $_SESSION['success']  = "Student account has been confirmed.";
            header("Location: manage_student.php");
      } else {
        $_SESSION['exists']  = "There is something wrong upon updating the data.";
            header("Location: manage_student.php");
      }

    }






  ##<!-----------------------------------------SAVE ANNOUNCEMENT------------------------------------------------------------------->
  if(isset($_POST['update_activity'])) {

        $announcement_id = $_POST['ann_id'];
        $topic           = $_POST['topic'];
        $description     = $_POST['description'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
                               
               $sql = " UPDATE daily_activities SET Activity_topic='$topic', Activity_description='$description' WHERE Id='$announcement_id' ";
                if(mysqli_query($conn, $sql)) {
                $_SESSION['success']  = "You have updated added an activity";
                header("Location: manage_daily_activities.php");                                
                } else {
                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                  header("Location: manage_daily_activities.php");
                }

     }

   }







   ##<!-----------------------------------------UPDATE SUBJECT SCHEDULE ------------------------------------------------------------->
  if(isset($_POST['update_sched'])) {

        $sub_ID          = $_POST['sub_ID'];
        $subject_code    = $_POST['subject_code'];
        $subject_name    = $_POST['subject_name'];
        $subject_desc    = $_POST['subject_desc'];
        $teacher         = $_POST['teacher'];
        $day             = $_POST['day'];
        $time            = $_POST['time'];
        $level           = $_POST['level'];

        $day_type="";  
        foreach($day as $day)  
         {  
            $day_type .= $day.",";  
         } 

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
                               
               $sql = " UPDATE subject SET Sub_code='$subject_code', Sub_name='$subject_name', Sub_description='$subject_desc', Teacher='$teacher', Sub_level='$level', day='$day_type', time_sched='$time' WHERE sub_Id='$sub_ID' ";
                if(mysqli_query($conn, $sql)) {
                $_SESSION['success']  = "You have successfully updated the subject";
                header("Location: manage_subject.php");                                
                } else {
                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                  header("Location: manage_subject.php");
                }

     }

   }





   ##<!-----------------------------------------UPDATE LEVEL------------------------------------------------------------------->
  if(isset($_POST['save_level'])) {

        $level_id   = $_POST['level_id'];
        $level      = $_POST['level'];
        $section    = $_POST['section'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
                               
               $sql = " UPDATE year_level SET level='$level', section='$section' WHERE level_Id='$level_id' ";
                if(mysqli_query($conn, $sql)) {
                $_SESSION['success']  = "You have successfully updated level.";
                header("Location: manage_level.php");                                
                } else {
                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                  header("Location: manage_level.php");
                }

     }

   }




    ##<!-----------------------------------------UPDATE LEVEL------------------------------------------------------------------->
  if(isset($_POST['update_grade'])) {

        $grade_id   = $_POST['grade_id'];
        $grade      = $_POST['grade'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
                               
               $sql = " UPDATE student_grade SET grade='$grade' WHERE grade_id='$grade_id' ";
                if(mysqli_query($conn, $sql)) {
                $_SESSION['success']  = "You have successfully updated student's grade.";
                header("Location: manage_grades.php");                                
                } else {
                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                  header("Location: manage_grades.php");
                }

     }

   }




   ##<!-----------------------------------------UPDATE STATUS ENROLLMENT------------------------------------------------------------------->
  if(isset($_POST['enroll'])) {

        $id   = $_POST['id'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
                               
               $sql = " UPDATE enrollment SET request_status='Confirmed' WHERE enrollment_Id='$id' ";
                if(mysqli_query($conn, $sql)) {
                $_SESSION['success']  = "You have successfully confirmed student enrollment.";
                header("Location: manage_enrollment.php");                                
                } else {
                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                  header("Location: manage_enrollment.php");
                }

     }

   }




    ##<!-----------------------------------------UPDATE STATUS ENROLLMENT------------------------------------------------------------------->
  if(isset($_POST['gnerate_grade'])) {

        $id   = $_POST['id'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
                               
               $sql = " UPDATE request_grade SET request_grade_status='Confirmed' WHERE request_grade_Id='$id' ";
                if(mysqli_query($conn, $sql)) {
                $_SESSION['success']  = "You have successfully confirmed student grade request.";
                header("Location: manage_request_grades.php");                                
                } else {
                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                  header("Location: manage_request_grades.php");
                }

     }

   }


	
?>