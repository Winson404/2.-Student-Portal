<?php 
	include 'topbar.php';
?>



<?php
		
		if(isset($_POST['login'])) {

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$login = mysqli_query($conn, "SELECT * FROM student WHERE username='$username' AND password='$password' AND status='Confirmed'");	


		// STUDENT LOGIN
		if(mysqli_num_rows($login) == 1) {

		    $row = mysqli_fetch_array($login);

              if ($row['username'] === $username && $row['password'] === $password) {
                   $_SESSION['student']    = $row['username'];
                   $_SESSION['student_id'] = $row['Id'];
                   header("Location: student/about_me.php");
              } else {
                   $_SESSION['error'] = "Password is incorrect. Try again!"; 
            	   // $script =  "<script> $(document).ready(function(){ $('#loginmodal').modal('show'); }); </script>";   
              }
          //ADMIN LOGIN    
		} else {
			$admin_login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' AND usertype='Admin' ");

			if(mysqli_num_rows($admin_login) == 1) {

				  $row = mysqli_fetch_array($admin_login);

	              if ($row['username'] === $username && $row['password'] === $password) {
	                   $_SESSION['admin_username']    = $row['username'];
	                   $_SESSION['admin_id'] = $row['Id'];
	                   header("Location: admin/dashboard.php");
	              } else {
	                   $_SESSION['error'] = "Password is incorrect. Try again!"; 
	            	   // $script =  "<script> $(document).ready(function(){ $('#loginmodal').modal('show'); }); </script>";   
	              }
			} else {
				$_SESSION['error'] = "Password is incorrect. Try again!"; 
			}

		}
	}

?>




	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">Login</h2>
				</div>
			</div>
		</div>
	</section>

	
	<div class="container">
		<div class="row"  style="min-height: 380px; margin-top: 50px; margin-right: auto; margin-left: auto; display: block;">
			<div class="col-md-6" >
				<div class="contact-form">

					<form action="" method="POST" >

						<div class="form-group has-feedback">
							<label for="email">Username</label>
							<input type="text" class="form-control" name="username" placeholder="" required>
							<i class="fa fa-user form-control-feedback"></i>
						</div>

						<div class="form-group has-feedback">
							<label for="message">Password</label>
							<input type="password" class="form-control" name="password" placeholder="" required>
							<i class="fa fa-lock form-control-feedback"></i>
						</div>

						<button type="submit" class="btn btn-primary" name="login">Login</button>

					</form>
					<br>	
					<span>Don't have an account yet? <a href="register.php"><b>Click here!</b></a></span>
				</div>
			</div>
		</div>
	</div>
 
	<?php
		include 'footer.php';
	?>
