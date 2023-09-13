 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>2nd Semester</strong></h4>  
    
    <div class="table-responsive p-4">

      <table class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
          <tr>
            <th>School year</th>
            <th>Semester</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT * FROM semester JOIN schoolyear ON semester.school_id=schoolyear.Id WHERE Semester='2nd Semester'";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $row["schoolyear"];?></td>
              <td><?php echo $row["Semester"];?></td>
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