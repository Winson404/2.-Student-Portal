<?php
	session_start();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<!-- FONT STYLE -->
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

	<!-- BOOTSTRAP LINK -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script src="js/jquery.min.js"></script>

	<style>

		body {
			background-color: lightgray;
			font-family: 'Poppins';
		}

		div.card {
			display: block; 
			margin-right: auto; 
			margin-left: auto;
		}
		div span a {
			text-decoration: none;
		}
		div span a:hover {
			text-decoration: underline;
		}
	</style>

</head>
<body class="p-5">
	
	<section>
			<div class="col-lg-6 p-5 card">
				<h2>Register</h2>
				<hr>
				
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert bg-success text-white" role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
        <?php unset($_SESSION['success']); } ?>
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h6 class="alert bg-danger text-white"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>
        <?php  if(isset($_SESSION['exists'])) { ?>
            <h6 class="alert bg-danger text-white"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
        <?php unset($_SESSION['exists']); } ?>

				<form action="register_process.php" method="POST" enctype="multipart/form-data">
					<div class="row mb-3">
						<div class="col-lg-12">
							<label for=""><b>ID No:</b></label>
							<input type="text" class="form-control" name="id_no">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-6">
							<label for=""><b>First name</b></label>
							<input type="text" class="form-control" name="firstname" required>
						</div>
						<div class="col-lg-6">
							<label for=""><b>Middle name</b></label>
							<input type="text" class="form-control" name="middlename" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-12 mb-3">
							<label for=""><b>Last name</b></label>
							<input type="text" class="form-control" name="lastname" required>
						</div>
						<div class="col-lg-6">
							<label for=""><b>Date of Birth</b></label>
							<input type="date" class="form-control" name="dob" required>
						</div>
						<div class="col-lg-6">
							<label for=""><b>Age</b></label>
							<input type="number" class="form-control" name="age" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-12">
							<label for=""><b>Address</b></label>
							<input type="text" class="form-control" name="address" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-6">
							<label for=""><b>Email</b></label>
							<input type="email" class="form-control" name="email" required>
						</div>
						<div class="col-lg-6">
							<label for=""><b>Contact</b></label>
							<input type="number" class="form-control" name="contact" required>
						</div>
					</div>
					<div class="row mb-3">
						<?php 
							include 'config.php';
							$dept = mysqli_query($conn, "SELECT * FROM department");
						 ?>
						 <div class="col-lg-12 mb-3">
							<label for=""><b>Department</b></label>
							<select class="form-select" aria-label="Default select example" name="department" required>
							  <option selected>Select department</option>
							  <?php 
							  	 	while($row = mysqli_fetch_array($dept)) { 
							  ?>
							  <option value="<?php echo $row['Id']; ?>"> <?php echo $row['dept_name']; ?> </option>
							  <?php 
									} 
							  ?>
							</select>
						</div>
						<div class="col-lg-6">
							<label for=""><b>Year level</b></label>
							<select class="form-select" aria-label="Default select example" name="level" required>
							  <option selected>Select year level</option>
							  <option value="1st year">1st year</option>
							  <option value="2nd year">2nd year</option>
							  <option value="3rd year">3rd year</option>
							  <option value="4th year">4th year</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label for=""><b>Username</b></label>
							<input type="text" class="form-control" name="username" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-6">
							<label for=""><b>Password</b></label>
							<input type="password" class="form-control" name="password" required>
						</div>
						<div class="col-lg-6">
							<label for=""><b>Confirm password</b></label>
							<input type="password" class="form-control" name="cpassword" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-12">
							<label for=""><b>Images</b></label>
							<input type="file" class="form-control" name="fileToUpload" required>						
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<hr>
							<button type="submit" class="btn btn-primary mb-2" style="width: 100%;" name="register">Register</button>
							<span>Already have an account? <a href="login.php"><b>Click here!</b></a></span>
						</div>
					</div>
				</form>
			</div>
 	</section>

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