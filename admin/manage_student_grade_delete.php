  <!-- CREATE NEW -->
  <div class="modal fade" id="deletegrade_modal<?php echo $row['grade_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title text-white" id="exampleModalLabel">Delete remark</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process_delete.php" method="POST">
        <div class="modal-body">
            <input type="hidden" value="<?php echo $row['grade_id']; ?>" name="grade_id">
            <h5>Are you sure you want to delete this student remark?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="delete_grade">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>