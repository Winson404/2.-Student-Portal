
  <!-- The Modal -->
<div class="modal fade" id="updatesubject_modal<?php echo $row['sub_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white"><i class="bi bi-plus-square"></i> Update Subject</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST">
          <input type="hidden" value="<?php echo $row['sub_Id']; ?>" name="sub_ID">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Subject Code</b></label>
                <input type="text" name="subject_code" class="form-control" required value="<?php echo $row['Sub_code']; ?>">
              </div>

              <div class="form-group">
                <label for=""><b>Subject Name</b></label>
                <input type="text" name="subject_name" class="form-control" required value="<?php echo $row['Sub_name']; ?>">
              </div>

              <div class="form-group">
                <label for=""><b>Subject Description</b></label>
                <input type="text" name="subject_desc" class="form-control" required value="<?php echo $row['Sub_description']; ?>">
              </div>

              <div class="form-group">
                <label for=""><b>Teacher</b></label>
                <input type="text" name="teacher" class="form-control" required value="<?php echo $row['Teacher']; ?>">
              </div>

              <div class="form-group bg-light">
                <label for=""><b>Saved schedule</b></label>
                <input type="text" class="form-control" value="<?php echo $row['day']; echo '-'; echo $row['time_sched']; ?>" readonly>
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

              <div class="form-group bg-light">
                <label for=""><b>Subject level before</b></label>
                <input type="text" class="form-control" value="<?php echo $row['level']; echo '-'; echo $row['section']; ?>" readonly>
              </div>
              <div class="form-group bg-light">
                <label for=""><b>Unit</b></label>
                <input type="text" name="teacher" class="form-control" required value="<?php echo $row['Units']; ?>">
              </div>
              <div class="form-group">
                 <?php 
                  include '../config.php';
                  $dept = mysqli_query($conn, "SELECT * FROM year_level");
                 ?>
                  <label for=""><b>Subject level to update</b></label>
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
              
             
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="update_sched"><i class="bi bi-save2"></i> Save</button>
          </div>
      </form>
    </div>
  </div>
</div>
