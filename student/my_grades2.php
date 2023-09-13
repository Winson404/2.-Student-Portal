 <?php include 'sidebar.php'; ?>
<?php 
  
  $semester = mysqli_query($conn, "SELECT * FROM semester WHERE Semester='1st Semester'");
  $one = mysqli_fetch_array($semester);

  $semester2 = mysqli_query($conn, "SELECT * FROM semester WHERE Semester='2nd Semester'");
  $two = mysqli_fetch_array($semester2);

  $year = mysqli_query($conn, "SELECT * FROM schoolyear WHERE schoolyear='2019-2020'");
  $three = mysqli_fetch_array($year);
 ?>
 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Grades</strong></h4>  
    
    <div class="table-responsive p-4 ">
      <div class="d-flex">
        <h5><b>Semester: </b><?php echo $one['Semester']; ?></h5>
        <h5 style="position: absolute;right:150px;"><b>School year:</b> <?php echo $three['schoolyear']; ?> </h5>
      </div>
      <table class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl " id="examples">
        <thead>
          <tr>
            <!-- <th>Semester</th> -->
            <th>Subject code</th>
            <th>Subject name</th>
            <th>Units</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT * FROM subject JOIN student_grade ON subject.Sub_level=student_grade.subject_id";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr> 
              <!-- <td><?php //echo $row["Semester"];?></td> -->
              <td><?php echo $row["Sub_code"];?></td>
              <td><?php echo $row["Sub_name"];?></td>
              <td><?php echo $row["Units"];?></td>
              <td><?php echo $row["grade"];?></td>
          </tr>
            <?php 
                }  
            ?> 
        </tbody>
      </table>







       <div class="d-flex mt-5" style="margin-top: 100px;">
        <h5><b>Semester: </b><?php echo $two['Semester']; ?></h5>
      </div>
      <table class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl " id="examples">
        <thead>
          <tr>
            <!-- <th>Semester</th> -->
            <th>Subject code</th>
            <th>Subject name</th>
            <th>Units</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query ="SELECT * FROM student_grade JOIN student ON student_grade.student_id=student.Id JOIN subject ON student_grade.subject_id=subject.sub_Id JOIN semester ON subject.semester_id=semester.Id WHERE Semester.Semester='2nd Semester'";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr> 
              <!-- <td><?php //echo $row["Semester"];?></td> -->
              <td><?php echo $row["Sub_code"];?></td>
              <td><?php echo $row["Sub_name"];?></td>
              <td><?php echo $row["Units"];?></td>
              <td><?php echo $row["grade"];?></td>
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