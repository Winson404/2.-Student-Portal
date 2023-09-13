 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-5">
          <h4 class="bg-light p-3" align="center"><strong>Create User Information</strong></h4>  
          <hr>
        <?php if(isset($_SESSION['success'])) { ?> 
            <h5 class="alert bg-success success text-white"role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h5> 
        <?php unset($_SESSION['success']); } ?>
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h5 class="alert bg-danger invalid text-white"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h5>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>
        <?php  if(isset($_SESSION['exists'])) { ?>
            <h5 class="alert bg-danger exists text-white"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h5>
        <?php unset($_SESSION['exists']); } ?>
    <form action="manage_user_create_code.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>First name</b></label>
            <input type="text" class="form-control" name="firstname" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Middle name</b></label>
            <input type="text" class="form-control" name="middlename" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Last name</b></label>
            <input type="text" class="form-control" name="lastname" required>
          </div>
        </div>
      </div>
    
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Date of Birth</b></label>
            <input type="date" class="form-control" name="dob" required>
          </div>
        </div>
      </div>
      <div class="col-md-2" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Age</b></label>
            <input type="number" class="form-control" name="age" required>
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
      <div class="col-md-4">
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Email</b></label>
            <input type="email" class="form-control" name="email" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
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
        <button type="submit" class="btn btn-primary" name="register">Create User</button>
      </div>
    </div>
  </form>
      </div>
    </div>

