 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Manage Level</strong></h4>  
          <div class="table-responsive p-4">
              <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-square"></i> Create new</button>
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
                    <th>Level</th>
                    <th>Section</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    include("../config.php");
                    $query ="SELECT * FROM year_level";
                    $sql = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?php echo $row["level"];?></td>
                    <td><?php echo $row["section"];?></td>
                    <td>
                        <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updatelevel_modal<?php echo $row['level_Id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                        <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletelevel_modal<?php echo $row['level_Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
                    </td>                
                </tr>
                <?php 
                  include 'manage_level_delete.php';
                  include 'manage_level_update.php';
                     }  
                ?> 
              </tbody>
            </table>
        </div>
      </div>
    </div>



  <!-- CREATE NEW -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title text-white" id="exampleModalLabel">New Year level</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process_save.php" method="POST">
        <div class="modal-body">
            <label for=""><b>Level</b></label>
            <select class="form-select form-control" aria-label="Default select example" name="level" required>
              <option selected value="">Select year level</option>
              <option value="1st year">1st year</option>
              <option value="2nd year">2nd year</option>
              <option value="3rd year">3rd year</option>
              <option value="4th year">4th year</option>
            </select>
        </div>
        <div class="modal-body">
            <label for=""><b>Section</b></label>
            <input type="text" class="form-control" name="section" placeholder="Section">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="save_level">Save changes</button>
        </div>
        </form>
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