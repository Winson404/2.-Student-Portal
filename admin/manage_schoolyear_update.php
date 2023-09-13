<!-- The Modal -->
<div class="modal fade" id="updateschoolyear_modal<?php echo $row['Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Update School Year</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST">
          <div class="modal-body">
                <input type="hidden" class="form-control" name="Id" value="<?php echo $row['Id']?>">
                <div class="form-group">
                      <label for="">School year</label>
                      <input type="text" class="form-control" name="schoolyear" value="<?php echo $row['schoolyear']; ?>">
                    
                </div>
                <!--#########################################################################################-->
                <div class="form-group">
                        <label for="">School year status</label>
                      <input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>">
                </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="update_schoolyear"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>