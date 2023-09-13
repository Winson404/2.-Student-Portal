<?php 
include 'sidebar.php'; 

$student = mysqli_query($conn, "SELECT * FROM daily_activities ORDER BY time_date asc");

?>



 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5 d-flex justify-content-center flex-column align-items-center" >
        <?php 
        while ($row = mysqli_fetch_array($student)) {
          ?>
        <div class="card p-5 bg-light mb-4" style="width: 500px;">
          <h3>What: <span class="badge btn-primary"><?php echo $row['Activity_topic']; ?></span></h3>
          <h6>When: <span class="badge badge-success"><?php echo $row['time_date']; ?> </span></h6>
          <hr>
          <div class="d-flex justify-content-center p-2">
            <div class="card p-3" style="width: 28rem;">
              <img class="img-responsive" src="../images-activities/<?php echo $row['Image'];?>" alt="image">
              <div class="card-body">
                <p class="card-text text-justify"><?php echo $row['Activity_description']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>






<!-- END TAG FOR SIDEBAR -->
</div>
<!-- END TAG FOR SIDEBAR -->