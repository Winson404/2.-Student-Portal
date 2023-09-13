 <!-- CREATE NEW -->
  <div class="modal fade" id="approve_grade<?php echo $row['request_grade_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm grade request</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['request_grade_Id']; ?>">

        <div class="modal-body">
           <h6>Are you sure you want to generate grade for this student?</h6>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="gnerate_grade">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>