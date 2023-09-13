 <?php include 'sidebar.php'; ?>



<div id="content" class="p-4 p-md-5 pt-5">
  <div class="card p-5 d-flex flex-row ">
    <div class="row justify-content-around">

    <div class="card p-2 bg-light mb-4" style="width: 18rem;">
        <img src="../img/department.png" class="card-img-top" alt="users" class="img-fluid" style="width: 80px; margin-left: 20px;">  
        <div class="card-body mt-3">
          <?php 
            $Department = mysqli_query($conn,"SELECT Id FROM department");
            $row_Department = mysqli_num_rows($Department);
          ?>
          <h5 class="card-title">Total Department: <span style="font-size: 26px;"><?php echo $row_Department; ?></span></h5>
        </div>
    </div>

    <div class="card p-2 bg-light mb-4" style="width: 18rem;">
        <img src="../img/users.png" class="card-img-top" alt="users" class="img-fluid" style="width: 80px; margin-left: 20px;">  
        <div class="card-body">
          <?php 
            $student = mysqli_query($conn,"SELECT Id FROM student");
            $row_student = mysqli_num_rows($student);
          ?>
          <h5 class="card-title">Total Student: <span style="font-size: 26px;"><?php echo $row_student; ?></span></h5>
        </div>
    </div>

    <div class="card p-2 bg-light mb-4" style="width: 18rem;">
        <img src="../img/announcement.png" class="card-img-top" alt="users" class="img-fluid" style="width: 80px; margin-left: 20px;">  
        <div class="card-body mt-4">
          <?php 
            $announcement = mysqli_query($conn,"SELECT Id FROM announcement");
            $row_announcement = mysqli_num_rows($announcement);
          ?>
          <h5 class="card-title">Total Anouncements: <span style="font-size: 26px;"><?php echo $row_announcement; ?></span></h5>
        </div>
    </div>

    <div class="card p-2 bg-light mb-4" style="width: 18rem;">
        <img src="../img/users.png" class="card-img-top" alt="users" class="img-fluid" style="width: 80px; margin-left: 20px;">  
        <div class="card-body">
          <?php 
            $users = mysqli_query($conn,"SELECT Id FROM user");
            $row_users = mysqli_num_rows($users);
          ?>
          <h5 class="card-title">Total Users: <span style="font-size: 26px;"><?php echo $row_users; ?></span></h5>
        </div>
    </div>

    </div>
    </div>
</div>



