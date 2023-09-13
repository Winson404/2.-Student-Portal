 <?php include 'sidebar.php'; ?>

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-5">
          <h4 class="bg-light p-3" align="center"><strong>Create Announcement</strong></h4>  
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
          <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="contact-form">
                <div class="form-group has-feedback">
                  <?php 
                    $dept_name = mysqli_query($conn, "SELECT * FROM department");
                  ?>
                    <label for=""><b>Department name</b></label>
                    <select class="form-control form-select" name="dept_id" required="">
                    <option value="" selected="" disabled>Select department</option>
                    <?php
                      while($row = mysqli_fetch_array($dept_name)) {
                    ?>
                    <option value="<?php echo $row['Id']; ?>"><?php echo $row['dept_name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
              </div>
            </div>
            <div class="col-md-6" >
              <div class="contact-form">
                <div class="form-group has-feedback">
                  <label for=""><b>Announcement Topic</b></label>
                  <input type="text" class="form-control" name="topic" required>
                </div>
              </div>
            </div>
            <div class="col-md-12" >
              <div class="contact-form">
                <div class="form-group has-feedback">
                  <label for=""><b>Description</b></label>
                  <textarea class="form-control" name="description"></textarea>
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
              <hr>
              <button type="submit" class="btn btn-primary" name="save_announcement">Create Announcement</button>
            </div>
          </div>
        </form>
    </div>
</div>

