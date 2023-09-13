<?php 
include 'sidebar.php'; 
$id = $_SESSION['student_id'];

$student = mysqli_query($conn, "SELECT * FROM student JOIN department ON student.dept_id=department.Id JOIN year_level ON student.Id=year_level.level_Id WHERE student.Id='$id'");
while ($row = mysqli_fetch_array($student)) {
?>
<style>
        #aboutme-img {
          height: 120px;
          width: 120px;
          border-radius: 50%;
          margin-right: auto;
          margin-left: auto;
          display: block;
          border:  2px solid white;
        }
    </style>
 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      	<h4 class="">About Me</h4>
        <div class="card p-4 bg-light">
        	
	        <div class="row bg-light p-4">
	        	<div class="col-lg-12 mb-5">
	        		<img class="img-responsive" src="../images-students/<?php echo $row['images'];?>" alt="image" id="aboutme-img">
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>ID NO.</h6>
	        		<label for="fdf"><?php echo $id = $_SESSION['student_id']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>First name</h6>
	        		<label for="fdf"><?php echo $row['firstname']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Middle name</h6>
	        		<label for="fdf"><?php echo $row['middlename']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Last name</h6>
	        		<label for="fdf"><?php echo $row['lastname']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Date of Birth</h6>
	        		<label for="fdf"><?php echo $row['dob']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Age</h6>
	        		<label for="fdf"><?php echo $row['age']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Email</h6>
	        		<label for="fdf"><?php echo $row['email']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Contact No.</h6>
	        		<label for="fdf"><?php echo $row['contact']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Address</h6>
	        		<label for="fdf"><?php echo $row['address']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Username</h6>
	        		<label for="fdf"><?php echo $row['username']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Department name</h6>
	        		<label for="fdf"><?php echo $row['dept_name']; ?></label>
	        	</div>
	        	<div class="col-lg-3 mb-4">
	        		<h6>Year level</h6>
	        		<label for="fdf"><?php echo $row['level']; echo '-'; echo $row['section']; ?></label>
	        	</div>
	        </div>
        </div>
      </div>



<?php } ?>


<!-- END TAG FOR SIDEBAR -->
</div>
<!-- END TAG FOR SIDEBAR -->