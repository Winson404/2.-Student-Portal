<?php
  session_start();
  include '../config.php';
  if(isset($_SESSION['student']) && isset($_SESSION['student_id'])) {
    $id = $_SESSION['student_id'];

    $student = mysqli_query($conn, "SELECT * FROM student WHERE Id='$id'");
    while($row = mysqli_fetch_array($student)) {
?>



<!doctype html>
<html lang="en">
  <head>
  	<title>NLPSC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<!-- CSS FOR DATATABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		<link rel="stylesheet" href="../css/style.css">

    <style>
        #img {
          height: 80px;
          width: 80px;
          border-radius: 50%;
          margin-right: auto;
          margin-left: auto;
          display: block;
          border:  2px solid white;
        }
    </style>

  </head>
  <body>



<!--REQUEST ENROLLMENT Modal -->
<div class="modal fade" id="enrollment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request enrollment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
        <h6>Are you gonna request for enrollment?</h6>
        <input type="hidden" class="form-control" value="<?php echo $row['Id']; ?>" name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" name="enrollment">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!--REQUEST GRADE Modal -->
<div class="modal fade" id="grade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request grade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
        <h6>Are you gonna request for your grades?</h6>
        <input type="hidden" class="form-control" value="<?php echo $row['Id']; ?>" name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" name="grade">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>


		
		<div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <h1><a href="dashboard.php" class="logo"><i class="bi bi-house-fill"></i> NLPSCs</a> <img src="../images/logo.png" alt="" width="40" style="position: absolute; right: 12px; top: 7px;"></h1>
         <div class="p-1 mb-1">
              <ul class="list-unstyled components">
                <li>
                  <a href="dashboard.php">
                    <img id="img" class="img-responsive" src="../images-students/<?php echo $row['images'];?>" alt="image">
                    <i class="bi bi-people-fill"></i> Welcome, <?php echo $row['firstname']; ?> !
                  </a>
                </li>
              </ul>
        </div>
        <ul class="list-unstyled components mb-5">
          <li>
            <?php
            $check = mysqli_query($conn, "SELECT student_Id from enrollment WHERE student_Id='$id' AND request_status='Pending'");
            $count = mysqli_num_rows($check);
            ?>
              <a type="button" data-bs-toggle="modal" data-bs-target="#enrollment"><i class="bi bi-puzzle"></i> Req. enrollment <span class="badge bg-danger"><?php echo $count; ?></span></a>
          </li>
          <li>
            <?php
            $check2 = mysqli_query($conn, "SELECT student_Id from request_grade WHERE student_Id='$id' AND request_grade_status='Pending'");
            $count2 = mysqli_num_rows($check2);
            ?>
              <a href="my_grades.php" data-bs-toggle="modal" data-bs-target="#grade"><i class="bi bi-puzzle"></i> Request grades <span class="badge bg-danger"><?php echo $count2; ?></span></a>
          </li>
          <li>
              <a href="my_grades.php"><i class="bi bi-house-fill"></i> My grades</a>
              <!-- <div class="dropdown"> -->
              <!-- <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-speedometer2"></i> My grades</a> -->
              <!-- </button> -->
              <!-- <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> -->
                <!-- <li><a href="my_grades.php"><i class="bi bi-puzzle"></i> Grades</a></li> -->
                <!-- <li><a class="dropdown-item" href="1st_semester.php">1st Semester</a></li>
                <li><a class="dropdown-item" href="2nd_semester.php">2nd Semester</a></li> -->
              <!-- </ul> -->
            <!-- </div> -->
          </li>
          <li>
               <div class="dropdown">
              <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-speedometer2"></i> School year</a>
              </button>
              <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
                <li><a href="my_grades2.php"><i class="bi bi-puzzle"></i> 2019-2020</a></li>
                <li><a href="my_grades3.php"><i class="bi bi-puzzle"></i> 2020-2021</a></li>
                <li><a href="my_grades4.php"><i class="bi bi-puzzle"></i> 2021-2022</a></li>
                <li><a href="my_grades.php"><i class="bi bi-puzzle"></i> 2022-2023</a></li>
              </ul>
            </div>
          </li>
          <li>
              <a href="schoolcalendar.php"><i class="bi bi-house-fill"></i> School Calendar</a>
          </li>
          <li>
              <a href="announcement.php"><i class="bi bi-speedometer2"></i> Dept. announcement</a>
          </li>
         
          <!-- <li>
              <a href="semester.php"><i class="bi bi-puzzle"></i> Semester</a>
          </li> -->
          <li>
              <a href="subject_schedule.php"><i class="bi bi-puzzle"></i> My schedule</a>
          </li>
          <li>  
            <a href="about_me.php"><i class="bi bi-info-circle-fill"></i> About me</a>
          </li>
          <li>
            <a href="../logout.php"><i class="bi bi-door-closed-fill"></i> Logout</a>
          </li>
        </ul>

      </nav>
<?php } ?>
       

		

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>


<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ./index.php');
    }
?>