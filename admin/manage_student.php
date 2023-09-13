 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Manage Student</strong></h4>  
    
    <div class="table-responsive p-4">
      <a href="manage_student_create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Create new</a>
        <!-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-plus-square"></i> Create new</button> -->
<!-----------------------------------------SUCCESS SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert bg-success text-white mt-1" role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
        <?php unset($_SESSION['success']); } ?>
<!-----------------------------------------EXISTS  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h6 class="alert bg-danger text-white mt-1" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>

        <?php  if(isset($_SESSION['exists'])) { ?>
            <h6 class="alert bg-danger text-white mt-1" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
        <?php unset($_SESSION['exists']); } ?>
<!--###################################################################################################################################-->
      <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
          <tr>
            <th>ID No.</th>
            <th>Year level</th>
            <th>Student name</th>
            <th>Department</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT student.Id as stud_id, student.id_no, student.firstname, student.middlename, student.lastname, student.dob, student.age, student.email, student.contact, student.address, student.username, student.password, student.images, student.dept_id, student.year_level, student.status, department.*, year_level.* FROM student JOIN department oN student.dept_id=department.Id LEFT JOIN year_level ON student.year_level=year_level.level_Id";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
            $stud_id = $row['stud_id'];
          ?>
          <tr>
              <td><?php echo $row["id_no"];?></td>
              <td><?php echo $row["level"]; echo '-'; echo $row["section"];?></td>
              <td><?php echo $row["firstname"]; echo " "; echo $row["middlename"]; echo " "; echo $row["lastname"];?></td>
              <td><?php echo $row["dept_name"];?></td>
              <td>
                <?php if($row['status'] == 'Pending'): ?>
                  <span class="badge bg-danger" data-bs-toggle="modal" type="button" data-bs-target="#confirmstudent_modal<?php echo $stud_id; ?>"><?php echo $row["status"];?></span>
                <?php else: ?>
                  <span class="badge bg-success"><?php echo $row["status"];?></span>
                <?php endif; ?>
              </td>
              <td> 
                  <a href="manage_student_update.php?id=<?php echo $stud_id; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> 
                  <!-- <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updateschoolyear_modal<?php echo $stud_id; ?>"><i class="bi bi-pencil-square"></i> Edit</button>            -->
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletestudent_modal<?php echo $stud_id; ?>"><i class="bi bi-trash"></i></button>

                  <a href="manage_student_add_grade.php?id=<?php echo $stud_id;?>" class="btn btn-primary">Add grade</a>
              </td>                
          </tr>


            <?php 
               include 'manage_student_confirm_account.php';
               include 'manage_student_delete.php';
                }  
            ?> 
        </tbody>
      </table>
      <p><b>NOTE:</b> To confirm student account, just click the <span class="text-danger"><b>Pending status</b></span> of the student.</p>
    </div>
      </div>
    </div>



  <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-white"><i class="bi bi-plus-square"></i> Create Semester</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_save.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control form-select" name="semester" required="">
                      <option value="" selected="" disabled>Select Semester</option>
                      <option value="1st Semester">1st Semester</option>
                      <option value="2nd Semester">2nd Semester</option>
                  </select>
              </div>
              <div class="form-group">
              	<?php 
              		$active = mysqli_query($conn, "SELECT * FROM schoolyear WHERE status='Active'");
              	?>
                  <label>School Year</label>
                  <?php
                  	while($row = mysqli_fetch_array($active)) {
                  ?>
                  <select class="form-control form-select" name="schoolyear" required="">
                      <option value="" selected="" disabled>Select Semester</option>
                      <option value="<?php echo $row['Id']; ?>"><?php echo $row['schoolyear']; ?></option>
                   
                   <?php } ?>
                  </select>
              </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="savessemester"><i class="bi bi-save2"></i> Save</button>
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