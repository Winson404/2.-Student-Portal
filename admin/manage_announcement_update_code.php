<?php 
  session_start();
  include '../config.php';
  ##<!-----------------------------------------SAVE ANNOUNCEMENT------------------------------------------------------------------->
  if(isset($_POST['update_announcement'])) {

        $announcement_id = $_POST['ann_id'];
        $dept_id         = $_POST['dept_id'];
        $topic           = $_POST['topic'];
        $description     = $_POST['description'];
        $file            = basename($_FILES["fileToUpload"]["name"]);

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } else {
                               
               $sql = " UPDATE announcement SET announcement_topic='$topic', description='$description', department_id='$dept_id', image='$file' WHERE Id='$announcement_id' ";
                if(mysqli_query($conn, $sql)) {
                $_SESSION['success']  = "You have successfully added an announcement";
                header("Location: manage_announcement.php");                                
                } else {
                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                  header("Location: manage_announcement_update.php");
                }

     }

   }

  
?>


 <!-- $sql = " UPDATE announcement SET announcement_topic='$topic', description='$description', department_id='$dept_id', image='$file' WHERE Id='$announcement_id' "; -->