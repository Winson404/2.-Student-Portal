 <?php include 'sidebar.php'; ?>

 <?php 
    if(isset($_GET['id']))
    $id = $_GET['id'];

    $query ="SELECT * FROM daily_activities WHERE Id='$id'";
    $sql = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($sql)) {
 ?>

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-5">
          <h4 class="bg-light p-3" align="center"><strong>Update Activity</strong></h4>  
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
          <form action="process_update.php" method="POST">
          <div class="row">
            <input type="hidden" class="form-control" value="<?php echo $row['Id']; ?>" name="ann_id">
            <div class="col-md-6" >
              <div class="contact-form">
                <div class="form-group has-feedback">
                  <label for=""><b>Announcement Topic</b></label>
                  <input type="text" class="form-control" name="topic" value="<?php echo $row['Activity_topic']; ?>" required>
                </div>
              </div>
            </div>
            <div class="col-md-12" >
              <div class="contact-form">
                <div class="form-group has-feedback">
                  <label for=""><b>Description</b></label>
                  <input class="form-control" name="description" value="<?php echo $row['Activity_description']; ?>"></input>
                </div>
              </div>
            </div>
           <!--  <div class="col-md-4" >
              <div class="contact-form">
                <div class="form-group has-feedback">
                  <label for=""><b>Images</b></label>
                  <input type="file" class="form-control" name="fileToUpload"> 
                </div>
              </div>
            </div> -->
            <?php } ?>
            <div class="col-md-12">
              <hr>
              <button type="submit" class="btn btn-success" name="update_activity">Update Activity</button>
            </div>
          </div>
        </form>
    </div>
</div>

