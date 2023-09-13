 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Manage Daily Activities</strong></h4>  
          <div class="table-responsive p-4">
            <a href="manage_daily_activities_create.php" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Create new</a>
              <!-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-square"></i> Create new</button> -->
            <!-----------------------------SUCCESS SESSION ALERT MESSAGES---------------------------------------------------------------->
              <?php if(isset($_SESSION['success'])) { ?> 
                  <h6 class="alert bg-success text-white" role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
              <?php unset($_SESSION['success']); } ?>
            <!-----------------------------EXISTS  SESSION ALERT MESSAGES---------------------------------------------------------------->
              <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                  <h6 class="alert bg-danger text-white" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
              <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>

              <?php  if(isset($_SESSION['exists'])) { ?>
                  <h6 class="alert bg-danger text-white" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
              <?php unset($_SESSION['exists']); } ?>
            <!--#######################################################################################################################-->
            <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm " id="example">
              <thead>
                <tr>
                    <th>Activity topic</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    include("../config.php");
                    $query ="SELECT * FROM daily_activities";
                    $sql = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?php echo $row["Activity_topic"];?></td>
                    <td><?php echo $row["Activity_description"];?></td>
                    <td>
                        <a href="manage_daily_activities_update.php?id=<?php echo $row['Id']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit </a>
                      
                        <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteactivity_modal<?php echo $row['Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
                    </td>                
                </tr>
                <?php 
                   include 'manage_daily_activities_delete.php';
                     }  
                ?> 
              </tbody>
            </table>
        </div>
      </div>
    </div>


<!-- FOR DATATABLES LINKS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- END FOR DATATABLES LINKS -->

<script>



  $(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "All"]]
    } );
} );
</script>