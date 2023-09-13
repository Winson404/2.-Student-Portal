<?php 
	session_start();
	include '../config.php'; 
	if(isset($_POST['save_department'])) {
		$department = $_POST['department'];
    $description = $_POST['description'];

		$check = mysqli_query($conn, "SELECT * FROM department WHERE dept_name ='$department' ");

		if(mysqli_num_rows($check)) {
			$_SESSION['exists']  = "Department already exist.";
            header("Location: manage_department.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO department (dept_name, department_description) VALUES ('$department', '$description')");
			if($save) {
				$_SESSION['success']  = "New department has been added.";
            	header("Location: manage_department.php");
			} else {
				$_SESSION['exists']  = "There is something wrong upon saving the data.";
            	header("Location: manage_department.php");
			}
		}
	}




##<!-----------------------------------------SAVE SCHOOL YEAR CODE------------------------------------------------------------------->
	if(isset($_POST['saveschoolyear'])) {
        $schoolyear = $_POST['schoolyear'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
              $query = mysqli_query($conn, "SELECT * FROM schoolyear WHERE schoolyear='$schoolyear' ");
              if(mysqli_num_rows($query)>0) {
              $_SESSION['exists']  = "Academic School Year already exist!";
              header("Location: manage_schoolyear.php");
              } else {                  
                      $sql = " INSERT INTO schoolyear (schoolyear) VALUES ('$schoolyear')";
                      if(mysqli_query($conn, $sql)) {    
                      $_SESSION['success']  = "New Academic School Year has been saved!";
                      header("Location: manage_schoolyear.php");                                 
                      } else {
                              $_SESSION['danger']   = "Opps, something went wrong. Please try again.";
                              header("Location: manage_schoolyear.php");
                              } 
                      }
              }  
     }



     ##<!-----------------------------------------SAVE SEMESTER------------------------------------------------------------------->
	if(isset($_POST['savessemester'])) {
        $semester = $_POST['semester'];
        $schoolyear = $_POST['schoolyear'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
              $query = mysqli_query($conn, "SELECT * FROM semester WHERE semester='$semester' AND school_id='$schoolyear' ");
              if(mysqli_num_rows($query)>0) {
              $_SESSION['exists']  = "This semester is already in the active year. Choose other semeter.";
              header("Location: manage_semester.php");
              } else {                  
                      $sql = " INSERT INTO semester (Semester, school_id) VALUES ('$semester','$schoolyear')";
                      if(mysqli_query($conn, $sql)) {    
                      $_SESSION['success']  = "New Semester has been added!";
                      header("Location: manage_semester.php");                                 
                      } else {
                              $_SESSION['danger']   = "Opps, something went wrong. Please try again.";
                              header("Location: manage_semester.php");
                              } 
                      }
              }  
     }



  ##<!-----------------------------------------SAVE ANNOUNCEMENT------------------------------------------------------------------->
  if(isset($_POST['save_announcement'])) {
        $dept_id = $_POST['dept_id'];
        $topic = $_POST['topic'];
        $description = $_POST['description'];
        $file         = basename($_FILES["fileToUpload"]["name"]);

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
              $query = mysqli_query($conn, "SELECT * FROM announcement WHERE announcement_topic='$topic'");
              if(mysqli_num_rows($query)>0) {
              $_SESSION['exists']  = "This topic is already exist.";
              header("Location: manage_announcement_create.php");
              } else {                  
                     // Check if image file is a actual image or fake image
                $target_dir = "../images-announcements/";
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
                      header("Location: manage_announcement_create.php");
                      // if everything is ok, try to upload file
                      } else {

                          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                          $sql = " INSERT INTO announcement (announcement_topic, description, department_id, image) VALUES ('$topic', '$description', '$dept_id', '$file')";
                                if(mysqli_query($conn, $sql)) {
                                $_SESSION['success']  = "You have successfully added an announcement";
                                header("Location: manage_announcement.php");                                
                                } else {
                                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                                  header("Location: manage_announcement_create.php");
                                }
                          } else {
                                $_SESSION['exists'] = "There was an error uploading your file.";
                                header("Location: manage_announcement_create.php");
                          }
                      }
              }  
     }

   }









   ##<!-----------------------------------------SAVE ACTIVITY------------------------------------------------------------------->
  if(isset($_POST['save_activity'])) {
        $topic       = $_POST['topic'];
        $description = $_POST['description'];
        $date        = $_POST['date'];
        $file        = basename($_FILES["fileToUpload"]["name"]);

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
              $query = mysqli_query($conn, "SELECT * FROM daily_activities WHERE Activity_topic='$topic'");
              if(mysqli_num_rows($query)>0) {
              $_SESSION['exists']  = "This topic is already exist.";
              header("Location: manage_daily_activities_create.php");
              } else {                  
                     // Check if image file is a actual image or fake image
                $target_dir = "../images-activities/";
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
                      header("Location: manage_daily_activities_create.php");
                      // if everything is ok, try to upload file
                      } else {

                          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                          $sql = " INSERT INTO daily_activities (Activity_topic, Activity_description, time_date, Image) VALUES ('$topic', '$description', '$date', '$file')";
                                if(mysqli_query($conn, $sql)) {
                                $_SESSION['success']  = "You have successfully added an activity";
                                header("Location: manage_daily_activities.php");                                
                                } else {
                                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                                  header("Location: manage_daily_activities_create.php");
                                }
                          } else {
                                $_SESSION['exists'] = "There was an error uploading your file.";
                                header("Location: manage_daily_activities_create.php");
                          }
                      }
              }  
     }

   }







     ##<!-----------------------------------------SAVE SUBJECT------------------------------------------------------------------->
  if(isset($_POST['savessched'])) {
                 
                  
        $year         = $_POST['year'];
        $semester     = $_POST['semester'];
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $subject_desc = $_POST['subject_desc'];
        $teacher      = $_POST['teacher'];
        $day          = $_POST['day'];
        $time         = $_POST['time'];
        $level        = $_POST['level'];
        $units        = $_POST['units'];


        $day_type="";  
        foreach($day as $days)  
           {  
              $day_type .= $days.",";  
           } 


        $check = mysqli_query($conn, "SELECT * FROM subject WHERE Sub_name='$subject_name'");
        if(mysqli_num_rows($check)>0) {
              $_SESSION['exists']  = "This subject already exists.";
              header("Location: manage_subject.php");
        } else {

            $check = mysqli_query($conn, "SELECT * FROM subject WHERE Sub_code='$subject_code'");
            if(mysqli_num_rows($check)>0) {
                  $_SESSION['exists']  = "This subject code already exists.";
                  header("Location: manage_subject.php");
            } else {

                    $sql = mysqli_query($conn, "INSERT INTO subject (school_yr_Id, semester_id, Sub_code, Sub_name, Sub_description, Teacher, Sub_level, day, time_sched, Units) VALUES ('$year','$semester','$subject_code','$subject_name', '$subject_desc', '$teacher', '$level', '$day_type', '$time', '$units')");

                    if($sql) {
                        $_SESSION['success']  = "You have successfully added a subject";
                        header("Location: manage_subject.php"); 
                    } else {
                        $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                        header("Location: manage_subject.php");
                    }
            }

        }
                      
     }








     ##<!-----------------------------------------SAVE LEVEL------------------------------------------------------------------->
  if(isset($_POST['save_level'])) {

        $level = $_POST['level'];
        $section = $_POST['section'];
        

  

        $check = mysqli_query($conn, "SELECT * FROM year_level WHERE section='$section'");
        if(mysqli_num_rows($check)>0) {
              $_SESSION['exists']  = "This section already exists.";
              header("Location: manage_level.php");
        } else {
          $sql = mysqli_query($conn, "INSERT INTO year_level (level, section) VALUES ('$level', '$section')");

          if($sql) {
              $_SESSION['success']  = "You have successfully added a new year level";
              header("Location: manage_level.php"); 
          } else {
              $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
              header("Location: manage_level.php");
          }
        }
                      
     }






##<!-----------------------------------------SAVE GRADE------------------------------------------------------------------->
  if(isset($_POST['save_grade'])) {

        $student_id = $_POST['student_id'];
        $subject    = $_POST['subject'];
        $grade      = $_POST['grade'];

  

        $check = mysqli_query($conn, "SELECT * FROM student_grade WHERE subject_id='$subject'");
        if(mysqli_num_rows($check)>0) {
              $_SESSION['exists']  = "This subject has been graded.";
              header("Location: manage_student_add_grade.php?id=$student_id");
        } else {
          $sql = mysqli_query($conn, "INSERT INTO student_grade (student_id, subject_id, grade) VALUES ('$student_id', '$subject', '$grade')");

          if($sql) {
              $_SESSION['success']  = "You have successfully added a grade to this subject.";
              header("Location: manage_student_add_grade.php?id=$student_id");
          } else {
              $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
              header("Location: manage_student_add_grade.php?id=$student_id");
          }
        }
                      
     }



	
?>