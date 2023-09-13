<?php
session_start();
include '../config.php';
  if(isset($_SESSION['admin_username']) && isset($_SESSION['admin_id'])) {
    $id = $_SESSION['admin_id'];

    $admin = mysqli_query($conn, "SELECT * FROM user WHERE usertype='Admin' AND Id='$id'");
    while($row = mysqli_fetch_array($admin)) {
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>NLPSC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS FOR DATATABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <style>
    ul li a, h1 a {
      text-decoration: none;
    }
  </style>

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <h1><a href="dashboard.php" class="logo"><i class="bi bi-house-fill"></i> NLPSC</a><img src="../images/logo.png" alt="" width="40" style="position: absolute; right: 12px; top: 7px;"></h1>
        <div class="bg-secondary">
              <ul class="list-unstyled components ">
                <li>
                  <a href="">
                    <i class="bi bi-people-fill"></i> Welcome, <?php echo $row['username']; ?> !
                  </a>
                </li>
              </ul>
        </div>
        <ul class="list-unstyled components mb-5">
          <li>
              <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
          </li>
          <li>
            <a href="manage_daily_activities.php"><i class="bi bi-bookmark-check-fill"></i> School Daily Activities</a>
          </li>
          <li>
            <a href="manage_department.php"><i class="bi bi-bookmark-check-fill"></i> Department</a>
          </li>
          <li>
            <a href="manage_student.php"><i class="bi bi-people-fill"></i> Student</a>
          </li>
          <li>
            <a href="manage_grades.php"><i class="bi bi-people-fill"></i> Student grade</a>
          </li>
          <li>
            <a href="manage_subject.php"><i class="bi bi-puzzle"></i> Subject</a>
          </li>
          <li>
            <a href="manage_level.php"><i class="bi bi-puzzle"></i> Year level</a>
          </li>
          <li>
            <a href="manage_semester.php"><i class="bi bi-bookmark-check-fill"></i> Semester</a>
          </li>
          <li>
            <a href="manage_schoolyear.php"><i class="bi bi-bookmark-check-fill"></i> School Year</a>
          </li>
          <li>
            <a href="manage_announcement.php"><i class="bi bi-info-circle-fill"></i> Announcements</a>
          </li>
          <li>
             <?php
            $check = mysqli_query($conn, "SELECT enrollment_Id FROM enrollment");
            $count = mysqli_num_rows($check);
            ?>
            <a href="manage_enrollment.php"><i class="bi bi-info-circle-fill"></i> Enrollment req. <span class="badge bg-danger"><?php echo $count; ?></span></a>
          </li>
           <li>
             <?php
            $check2 = mysqli_query($conn, "SELECT request_grade_Id FROM request_grade");
            $count2 = mysqli_num_rows($check2);
            ?>
            <a href="manage_request_grades.php"><i class="bi bi-info-circle-fill"></i> Grade req. <span class="badge bg-danger"><?php echo $count2; ?></span></a>
          </li>
          <li>
            <a href="manage_user.php"><i class="bi bi-people-fill"></i> Users</a>
          </li>
          <li>
            <a href="../logout.php"><i class="bi bi-door-closed-fill"></i> Logout</a>
          </li>
        </ul>

      </nav>

       <?php } ?>

		
       <!-- FOR DATATABLES LINKS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- END FOR DATATABLES LINKS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>

<script>
  //-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,6000);
  }
  );
//-----------------------------END ALERT TIMEOUT---------------------//
</script>


<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../index.php');
    }
?>