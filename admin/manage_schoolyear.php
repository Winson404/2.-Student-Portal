 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Manage School Year</strong></h4>  
    
    <div class="table-responsive p-4">
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-plus-square"></i> Create new</button>
<!-----------------------------------------SUCCESS SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert bg-success text-white" role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
        <?php unset($_SESSION['success']); } ?>
<!-----------------------------------------EXISTS  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h6 class="alert bg-danger text-white" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>

        <?php  if(isset($_SESSION['exists'])) { ?>
            <h6 class="alert bg-danger text-white" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
        <?php unset($_SESSION['exists']); } ?>
<!--###################################################################################################################################-->
      <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
          <tr>
            <th>Id</th>
            <th>School Year</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT * FROM schoolyear ORDER BY schoolyear asc";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
                <td><?php echo $row["Id"];?></td>
                <td><?php echo $row["schoolyear"];?></td>

                <?php if($row['status'] == "Active"): ?>
                <td>
                    <span class="btn btn-primary"><?php echo $row['status'];?></span>
                </td>
                <?php else: ?>
                <td>
                    <span class="btn btn-danger"><?php echo $row['status'];?></span>
                </td>                              
                <?php endif; ?>
              <td>               
                  <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updateschoolyear_modal<?php echo $row['Id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteschoolyear_modal<?php echo $row['Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
              </td>                
          </tr>
            <?php 
                 include 'manage_schoolyear_update.php';
                 include 'manage_schoolyear_delete.php';
                }  
            ?> 
        </tbody>
      </table>
    </div>
      </div>
    </div>



  <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-white"><i class="bi bi-plus-square"></i> Create School Year</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_save.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group">
                  <label>School Year</label>
                  <select class="form-control form-select" name="schoolyear" required="">
                      <option value="" selected="" disabled>Select School Year</option>
                      <option value="2020-2021">2020-2021</option>
                      <option value="2021-2022">2021-2022</option>
                      <option value="2022-2023">2022-2023</option>
                      <option value="2023-2024">2023-2024</option>
                      <option value="2024-2025">2024-2025</option>
                      <option value="2025-2026">2025-2026</option>
                      <option value="2026-2027">2026-2027</option>
                      <option value="2027-2028">2027-2028</option>
                      <option value="2028-2029">2028-2029</option>
                      <option value="2029-2030">2029-2030</option>
                      <option value="2030-2031">2030-2031</option>
                      <option value="2031-2032">2031-2032</option>
                  </select>
              </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="saveschoolyear"><i class="bi bi-save2"></i> Save</button>
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