 <?php include 'sidebar.php'; ?>

 <?php 
    if(isset($_GET['id']))
    $user_id = $_GET['id'];

    $query ="SELECT * FROM user WHERE Id='$user_id'";
    $sql = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($sql)) {
 ?>

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
    <form action="manage_user_update_code.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <input type="hidden" class="form-control" name="faculty_id" value="<?php echo $row['Id']; ?>" required>
            <label for=""><b>First name</b></label>
            <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Middle name</b></label>
            <input type="text" class="form-control" name="middlename" value="<?php echo $row['middlename']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Last name</b></label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" required>
          </div>
        </div>
      </div>
    
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Date of Birth</b></label>
            <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-2" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Age</b></label>
            <input type="number" class="form-control" name="age" value="<?php echo $row['age']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-6" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Address</b></label>
            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Email</b></label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Contact</b></label>
            <input type="text" class="form-control" name="contact" value="<?php echo $row['contact']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Username</b></label>
            <?php if($row['username'] =='Admin'): ?>
            <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required readonly>
            <?php else: ?>
            <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Password</b></label>
            <input type="password" class="form-control" name="password" value="<?php echo $row['firstname']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Confirm password</b></label>
            <input type="password" class="form-control" name="cpassword" value="<?php echo $row['firstname']; ?>" required>
          </div>
        </div>
      </div> -->
     <!--  <div class="col-md-4" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Images</b></label>
            <input type="file" class="form-control" name="fileToUpload" value="<?php echo $row['image']; ?>" required> 
          </div>
        </div>
      </div> -->

     <?php } ?>
      <div class="col-md-12">
        <button type="submit" class="btn btn-success" name="update_user">Update user</button>
      </div>
    </div>
  </form>
      </div>
    </div>

