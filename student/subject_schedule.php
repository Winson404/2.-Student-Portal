 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>My schedule</strong></h4>  
    
    <div class="table-responsive p-4">

      <table class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="examples">
        <thead>
          <tr>
            <th>Subject Code</th>
            <th>Subject name</th>
            <th>Teacher</th>
            <th>Time Schedule</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $id = $_SESSION['student_id'];
            $query ="SELECT * FROM student JOIN year_level ON student.year_level=year_level.level_Id JOIN subject ON year_level.level_Id=subject.Sub_level AND student.Id='$id'";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $row["Sub_code"];?></td>
              <td><?php echo $row["Sub_name"];?></td>
              <td><?php echo $row["Teacher"];?></td>     
              <td><?php echo $row["day"]; echo ' '; echo $row['time_sched']; ?></td>
                        
          </tr>
            <?php 
                }  
            ?> 
        </tbody>
      </table>
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