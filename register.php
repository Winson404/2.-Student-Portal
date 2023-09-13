<?php 
	include 'topbar.php';
?>

<style>
	#content{
		  border-radius: 10px; 
		  min-height: 450px; 
		  margin-top: 30px; 
		  margin-right: auto; 
		  margin-left: auto; 
		  display: block; 
		  border: 1px solid lightgrey; 
		  margin-bottom: 20px; 
		  padding: 35px;
	}
	h5 {
		 color: white;
	}

	.success {
		background-color: #198754; 
	}
	.invalid {
		background-color: #d64242; 
	}
	.exists {
		background-color: #fa9f47; 
	}
</style>

	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">Register</h2>
				</div>
			</div>
		</div>
	</section>

	
	<div class="container" id="content">
		<?php if(isset($_SESSION['success'])) { ?> 
            <h5 class="alert bg-success success"role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h5> 
        <?php unset($_SESSION['success']); } ?>
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h5 class="alert bg-danger invalid"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h5>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>
        <?php  if(isset($_SESSION['exists'])) { ?>
            <h5 class="alert bg-danger exists"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h5>
        <?php unset($_SESSION['exists']); } ?>
		<form action="register_process.php" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Student ID No:</b></label>
						<input type="text" class="form-control" name="id_no">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>First name</b></label>
						<input type="text" class="form-control" name="firstname" required onkeyup="lettersOnly(this)">
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Middle name</b></label>
						<input type="text" class="form-control" name="middlename" required onkeyup="lettersOnly(this)">
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Last name</b></label>
						<input type="text" class="form-control" name="lastname" required onkeyup="lettersOnly(this)">
					</div>
				</div>
			</div>
		
			<div class="col-md-3" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Date of Birth</b></label>
						<input type="date" class="form-control" name="dob" id="txtbirthdates" onchange="getAgeVals(0)" onblur="getAgeVals(0);" required>
					</div>
				</div>
			</div>
			<div class="col-md-3" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Age (at least 12yrs old and above)</b></label>
						<input type="number" class="form-control" name="age" required id="txtages">
					</div>
				</div>
			</div>
			<div class="col-md-6" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Address</b></label>
						<input type="text" class="form-control" name="address" required>
					</div>
				</div>
			</div>
			<div class="col-md-3" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Email</b></label>
						<input type="email" class="form-control" name="email" required>
					</div>
				</div>
			</div>
			<div class="col-md-2" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Contact</b></label>
						<input type="text" class="form-control" name="contact" required>
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<?php 
							include 'config.php';
							$dept = mysqli_query($conn, "SELECT * FROM department");
						 ?>
							<label for=""><b>Department</b></label>
							<select class="form-select form-control" aria-label="Default select example" name="department" required>
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
				</div>
			</div>

			<div class="col-md-3" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Year level</b></label>
							<select class="form-select form-control" aria-label="Default select example" name="level" required>
							  <option selected>Select year level</option>
							  <option value="1st year">1st year</option>
							  <option value="2nd year">2nd year</option>
							  <option value="3rd year">3rd year</option>
							  <option value="4th year">4th year</option>
							</select>
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Username</b></label>
						<input type="text" class="form-control" name="username" required>
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Password</b></label>
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Confirm password</b></label>
						<input type="password" class="form-control" name="cpassword" required>
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="contact-form">
					<div class="form-group has-feedback">
						<label for=""><b>Images</b></label>
						<input type="file" class="form-control" name="fileToUpload" required>	
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary" name="register">Register</button>
			</div>

		</div>
		<span>Already have an account? <a href="login.php"><b>Click here!</b></a></span>
	</form>
	</div>
 
<script>
//-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,6000);
  }
  );
//-----------------------------END ALERT TIMEOUT---------------------//
//
function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }
</script>

<!-- GETTING AUTOMATICALLY AGE VALUE FROM SETTING BIRTHDATE -->
<script type="text/javascript">
    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
    }
// SENIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
    function getAge(dateString){
        var birthdate = new Date().getTime();
        if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
        // variable is undefined or null value
        birthdate = new Date().getTime();
        }
        birthdate = new Date(dateString).getTime();
        var now = new Date().getTime();
        // now find the difference between now and the birthdate
        var n = (now - birthdate)/1000;
        if (n < 378683112) { // less than 12 years(378683112 seconds)
            var day_n = Math.floor(n/86400);
            if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
            // variable is undefined or null
            return '';
            } else {   
                 return '';  
                 //return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';   
            }
        } else {
            var year_n = Math.floor(n/31556926);
            if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
            return year_n = '';
            } else {
                return year_n + (year_n > 1 ? '' : '') ;
                //return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
            }
        }
    }

// SENIOR HIGH GETTING AGE VALUE--------------------------------------------------------------------->
// -------------------------------------------------------------------------------------------------->
 function getAgeVals(pid) {
        var birthdate = formatDate(document.getElementById("txtbirthdates").value);
        var count = document.getElementById("txtbirthdates").value.length;
        if (count=='10') {
                var age = getAge(birthdate);
                var str = age;
                var res = str.substring(0, 1);
                if (res =='-' || res =='0') {
                    document.getElementById("txtbirthdates").value = "";
                    document.getElementById("txtages").value = "";
                    $('#txtbirthdates').focus();
                    return false;
                } else {
                        document.getElementById("txtages").value = age;
                        // DISPLAYING AUTOMATICALLY THE ERROR MESSAGE IF AGE IS LESS THAN 12 YEARS OLD
                        if(document.getElementById("txtages").value == "") {
                            document.getElementById("agestatuss").style.display = "block";
                            return false;
                        } else {
                            document.getElementById("agestatuss").style.display = "none";
                            return true;
                        }
                }
        } else {
            document.getElementById("txtages").value = "";
            return false;
        }
    }
// END SENIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
</script>


	<?php
		include 'footer.php';
	?>
