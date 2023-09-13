 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>School year</strong></h4>  
    
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive p-4">

      <table class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="exampless">
        <thead>
          <tr>
            <th>School Year</th>
            <th>Semester</th>
            <!-- <th>Active</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT * FROM semester JOIN schoolyear WHERE semester.school_id=schoolyear.Id ORDER BY semester";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $row["schoolyear"];?></td>
              <td><?php echo $row["Semester"];?></td>
              <!-- <td><span class="badge badge-success"><?php //echo $row["status"];?></span></td>                -->
          </tr>
            <?php 
                }  
            ?> 
        </tbody>
      </table>
    </div>
      </div>
      <div class="col-md-6">
        <div class="table-responsive p-4">

      <table class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="examples">
        <thead>
          <tr>
            <th>School Year</th>
            <th>Semester</th>
            <!-- <th>Active</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT * FROM semester JOIN schoolyear WHERE semester.school_id=schoolyear.Id ORDER BY semester";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $row["schoolyear"];?></td>
              <td><?php echo $row["Semester"];?></td>
              <!-- <td><span class="badge badge-success"><?php //echo $row["status"];?></span></td>                -->
          </tr>
            <?php 
                }  
            ?> 
        </tbody>
      </table>
    </div>
      </div>
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