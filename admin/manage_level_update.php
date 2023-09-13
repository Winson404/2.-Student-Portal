 <!-- CREATE NEW -->
  <div class="modal fade" id="updatelevel_modal<?php echo $row['level_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title text-white" id="exampleModalLabel">Update Year level</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process_update.php" method="POST">
        <input type="hidden" name="level_id" value="<?php echo $row['level_Id']; ?>">

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
            <input type="text" class="form-control" name="section" placeholder="Section" value="<?php echo $row['section']; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="save_level">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>