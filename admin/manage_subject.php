 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Manage Subject Schedules</strong></h4>  
    
    <div class="table-responsive p-4">
      <form action="import.php" method="post" enctype="multipart/form-data">
        <input class="form-control" type="file" name="upcsv" accept=".csv" required/>
        <input class="btn btn-success" type="submit" value="Upload"/>
      </form>
        <button type="button" class="btn btn-primary mb-2 mt-2 data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-plus-square"></i> Create new</button>

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
            <th>Code</th>
            <th>Subject name</th>
            <th>Teacher</th>
            <th>Time</th>
            <th>Level</th>
            <th>Units</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT * FROM subject LEFT JOIN year_level ON subject.Sub_level=year_level.level_Id";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $row["Sub_code"];?></td>
              <td><?php echo $row["Sub_name"];?></td>
              <td><?php echo $row["Teacher"];?></td>
              <td><?php echo $row["day"]; echo '@';echo $row["time_sched"];?></td>
              <td><?php echo $row["level"]; echo '-'; echo $row["section"];?></td>
              <td><?php echo $row["Units"];?></td>
              <td>         
                  <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updatesubject_modal<?php echo $row['sub_Id']; ?>"><i class="bi bi-pencil-square"></i></button>


                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletesubject_modal<?php echo $row['sub_Id']; ?>"><i class="bi bi-trash"></i></button>
              </td>                
          </tr>
            <?php 
                 include 'manage_subject_update.php';
                 include 'manage_subject_delete.php';
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
        <h4 class="modal-title text-white"><i class="bi bi-plus-square"></i> Create Subject</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_save.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group">
                <?php 
                  $active = mysqli_query($conn, "SELECT * FROM schoolyear");
                ?>
                  <label>School year</label>
                  <select class="form-control form-select" name="year" required="">
                      <option value="" selected="" disabled>Select school year</option>
                 <?php
                    while($row = mysqli_fetch_array($active)) {
                ?>
                      <option value="<?php echo $row['Id']; ?>"><?php echo $row['schoolyear']; ?></option>
                   
                 <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <?php 
                  $active = mysqli_query($conn, "SELECT * FROM semester");
                ?>
                  <label>Semester</label>
                  <select class="form-control form-select" name="semester" required="">
                      <option value="" selected="" disabled>Select Semester</option>
                 <?php
                    while($row = mysqli_fetch_array($active)) {
                ?>
                      <option value="<?php echo $row['Id']; ?>"><?php echo $row['Semester']; ?></option>
                   
                 <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label for=""><b>Subject Code</b></label>
                <input type="text" name="subject_code" class="form-control" required>
              </div>

              <div class="form-group">
                <label for=""><b>Subject Name</b></label>
                <input type="text" name="subject_name" class="form-control" required>
              </div>

              <div class="form-group">
                <label for=""><b>Subject Description</b></label>
                <input type="text" name="subject_desc" class="form-control" required>
              </div>

              <div class="form-group">
                <label for=""><b>Teacher</b></label>
                <input type="text" name="teacher" class="form-control" required>
              </div>

              <div class="form-group ">
                <label for=""><b>Day</b></label>
                  <div class="dowPicker d-flex">
                    <div class="dowPickerOption">
                      <input type="checkbox" id="dow2" name="day[]" value="Monday">
                      <label for="dow2">Monday&nbsp;&nbsp;</label>
                    </div>
                    <div class="dowPickerOption">
                      <input type="checkbox" id="dow3" name="day[]" value="Tuesday">
                      <label for="dow3">Tuesday&nbsp;&nbsp;</label>
                    </div>
                    <div class="dowPickerOption">
                      <input type="checkbox" id="dow4" name="day[]" value="Wednesday">
                      <label for="dow4">Wednesday&nbsp;&nbsp;</label>
                    </div>
                    <div class="dowPickerOption">
                      <input type="checkbox" id="dow5" name="day[]" value="Thursday">
                      <label for="dow5">Thursday&nbsp;&nbsp;</label>
                    </div>
                    <div class="dowPickerOption">
                      <input type="checkbox" id="dow6" name="day[]" value="Friday">
                      <label for="dow6">Friday&nbsp;&nbsp;</label>
                    </div>
                  </div> 
                  <div>
                    <label for=""><b>Time</b></label>
                    <input type="time" name="time" class="form-control" >
                  </div>
              </div>

              <div class="form-group">
                 <?php 
                  include '../config.php';
                  $dept = mysqli_query($conn, "SELECT * FROM year_level");
                 ?>
                  <label for=""><b>Subject level</b></label>
                  <select class="form-select form-control" aria-label="Default select example" name="level" required>
                    <option selected>Select level</option>
                    <?php 
                        while($row = mysqli_fetch_array($dept)) { 
                    ?>
                    <option value="<?php echo $row['level_Id']; ?>"> <?php echo $row['level']; echo '-'; echo $row['section'];  ?> </option>
                    <?php 
                      } 
                    ?>
                  </select>
              </div>
              <div>
                <label for=""><b>Units</b></label>
                <input type="number" name="units" class="form-control" >
              </div>
             
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="savessched"><i class="bi bi-save2"></i> Save</button>
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