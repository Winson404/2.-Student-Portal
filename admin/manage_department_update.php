  <!-- CREATE NEW -->
  <div class="modal fade" id="updatedept_modal<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title text-white" id="exampleModalLabel">Update Department</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process_update.php" method="POST">
        <div class="modal-body">
            <input type="hidden" value="<?php echo $row['Id']; ?>" name="dept_id">
            <label for="">Department name</label>
            <input type="text" class="form-control" value="<?php echo $row['dept_name']; ?>" name="department">
        </div>
        <div class="modal-body">
            <label for="">Department description</label>
            <input type="text" class="form-control" value="<?php echo $row['department_description']; ?>" name="description">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="update_department">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>