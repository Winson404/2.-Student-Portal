
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<!-- FONT STYLE -->
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

	<!-- BOOTSTRAP LINK -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<style>
		/*********************LOGIN CCS********************/
.center {
	justify-content: center;
	align-items: center;
	display: flex;
	position: relative;
	top: 95px;
	font-family: 'Poppins';
}

.center .loginform {
	border: 1px solid grey;
	border-radius: 10px;
	box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}

.center div form div img {
	width: 80px;
}

.center div form div label {
	margin-bottom: -5px;
}
p .password {
	font-size: 14px;
}

.sign {
	font-size: 15px;
}

a {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
/*********************END LOGIN CCS********************/
	</style>

	<!---ICON FOR WEBSITE--->
	<link rel="shortcut icon" type="image/png" href="img/crmc.png">
</head>
<body>

		<div class="center">
			<div class="col-lg-3 border p-3 loginform">
				<form action="/action_page.php">
					  
					  <div class="row justify-content-center mt-2">
				  		<img src="img/user.png" class="img-responsive">
				  		<h5 class="text-center mt-2"><strong>Log in</strong></h5>
					  </div>
					  
					  <div class="mb-3 mt-3">
					    <label for="email" class="form-label"><strong>Email</strong></label>
					    <input type="email" class="form-control p-2" id="email" placeholder="Enter email" name="email">
					  </div>

					  <div class="mb-3">
					    <label for="pwd" class="form-label"><strong>Password</strong></label>
					    <input type="password" class="form-control p-2" id="pwd" placeholder="Enter password" name="pswd">
					  </div>

					  <button type="submit" class="form-control btn btn-primary mb-1">Login</button>
					  
					  <!-- <p class="text-center"><a href="" class="password">Forgot password?</a></p> -->
					  <hr>

					  <p class="sign">Don't have an account? <a href="register.php" class="sign-up_link"><span><strong>Click here!</strong></span></a></p>
					
					  
					  <p>Back to <a href="index.php">Home</a></p>
				</form>
			</div>
		</div>

</body>
</html>