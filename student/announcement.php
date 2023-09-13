<?php 
include 'sidebar.php'; 
$id = $_SESSION['student_id'];

$student = mysqli_query($conn, "SELECT * FROM department JOIN announcement ON department.Id=announcement.department_id JOIN student ON department.Id=student.dept_id AND student.Id='$id'");
while ($row = mysqli_fetch_array($student)) {
?>



 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-5 bg-light">
          <h3><?php echo $row['dept_name']; ?>: <span class="badge btn-primary"><?php echo $row['announcement_topic']; ?></span></h3>
          <hr>
          <div class="d-flex justify-content-center p-2">
            <div class="card p-3" style="width: 28rem;">
              <img class="img-responsive" src="../images-announcements/<?php echo $row['image'];?>" alt="image">
              <div class="card-body">
                <p class="card-text text-justify"><?php echo $row['description']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>


<?php } ?>



<!-- END TAG FOR SIDEBAR -->
</div>
<!-- END TAG FOR SIDEBAR -->