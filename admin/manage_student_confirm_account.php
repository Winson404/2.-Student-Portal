  
  <!-- CREATE NEW -->
  <div class="modal fade" id="confirmstudent_modal<?php echo $stud_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title text-white" id="exampleModalLabel">Confirm student account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process_update.php" method="POST">
          <div class="modal-body">
              <input type="hidden" value="<?php echo $stud_id; ?>" name="approve_id">
              <h6>Do you want to approve this student account?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning" name="approve">Approve</button>
          </div>
        </form>
      </div>
    </div>
  </div>