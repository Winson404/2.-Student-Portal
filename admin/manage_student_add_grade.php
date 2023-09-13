 <?php include 'sidebar.php'; ?>

 <?php 
    if(isset($_GET['id']))
    $stud_id = $_GET['id'];

    $student = mysqli_query($conn, "SELECT * FROM student WHERE Id='$stud_id'");
    // $query ="SELECT * FROM student JOIN subject ON student.year_level=subject.Sub_level WHERE student.Id='$stud_id' LIMIT 1";
    
    while($row = mysqli_fetch_array($student)) {
 ?>


 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Add grade for student</strong></h4>  
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert bg-success success text-white"role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
        <?php unset($_SESSION['success']); } ?>
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h6 class="alert bg-danger invalid text-white"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>
        <?php  if(isset($_SESSION['exists'])) { ?>
            <h6 class="alert bg-danger exists text-white"  role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
        <?php unset($_SESSION['exists']); } ?>

    <form action="process_save.php" method="POST">
    
      <input type="hidden" value="<?php echo $row['Id']; ?>" name="student_id">

    <div class="row">
      <div class="col-md-12" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>First name </b></label>
            <input type="text" class="form-control" value="<?php echo $row['firstname']; echo ' '; echo $row['middlename']; echo ' '; echo $row['lastname']; ?>" readonly>
          </div>
        </div>
      </div>
      <div class="col-md-4" > 
        <div class="contact-form">
          <div class="form-group has-feedback">
            
            <label for=""><b>Subject</b></label>
            <select name="subject" id="" class="form-select form-control" required>
              <option value="" selected disabled>Select subject</option>
              <?php
                 $stud_id = $_GET['id'];
                 $query = mysqli_query($conn, "SELECT * FROM subject JOIN student ON subject.Sub_level=student.year_level WHERE subject.sub_Id NOT IN (SELECT subject_id FROM student_grade) AND student.Id='$stud_id'");
               while($row_sub = mysqli_fetch_array($query)){;
              ?>
                <option value="<?php echo $row_sub['sub_Id']; ?>"><?php echo $row_sub['Sub_name']; ?></option>
                 <?php } ?>
            </select>

          </div>
        </div>
      </div>
      <div class="col-md-2" >
        <div class="contact-form">
          <div class="form-group has-feedback">
            <label for=""><b>Grade</b></label>
            <input type="number" class="form-control" name="grade" required placeholder="Enter grade" required>
          </div>
        </div>
      </div>
     

    <?php } ?>
      <div class="col-md-12">
        <button type="submit" class="btn btn-success" name="save_grade"><i class="bi bi-save"></i> Save </button>
        <a href="manage_grades.php" class="btn btn-primary"><i class="bi bi-arrow-right"></i> Go to student grades</a>
      </div>


    </div>
  </form>
      </div>
    </div>

