  <!-- CREATE NEW -->
  <div class="modal fade" id="updategrade_modal<?php echo $row['grade_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title text-white" id="exampleModalLabel">Update Announcement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process_update.php" method="POST">
        <div class="modal-body">
            <input type="hidden" value="<?php echo $row['grade_id']; ?>" name="grade_id">
            
            <div class="form-group">
              <label for=""><b>Student name</b></label>
              <input class="form-control" type="text" value="<?php echo $row['firstname']; echo ' '; echo $row['middlename']; echo ' '; echo $row['lastname'];  ?>" readonly>
            </div>

            <div class="form-group">
              <label for=""><b>Subject name</b></label>
              <input class="form-control" type="text" value="<?php echo $row['Sub_name']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for=""><b>Grade</b></label>
              <input class="form-control" type="number" value="<?php echo $row['grade']; ?>" name="grade">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="update_grade">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>