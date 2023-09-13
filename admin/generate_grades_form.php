<?php 
include '../config.php';
if(isset($_GET['Id'])) {
    $Id = $_GET['Id'];
  
    $fetch = mysqli_query($conn, "SELECT * FROM student JOIN year_level ON student.year_level=year_level.level_Id JOIN department ON student.dept_Id=department.Id JOIN subject ON student.year_level=subject.Sub_level JOIN student_grade ON student.Id=student_grade.student_id WHERE student.Id='$Id'");
    $row1 = mysqli_fetch_array($fetch);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enrollment | NLPSC</title>

  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="../images/occ.png">

  <!-- BOOTSTRAP 5 CSS LINK -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- BOOTSTRAP ICON LINK -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <style>
    #printElement, #printButton {
  margin: 30px;
}
.col-sm-4 {
  padding: 10px;
  border: 1px solid grey;
}
  </style>
</head>
<body>

  <div class="col-lg-12 d-flex justify-content-end">
    <button class="btn btn-secondary" id="printButton"  style="margin-right: 200px;"><i class="bi bi-printer"></i> Print</button>
  </div>
  <div class="card p-5 mb-5" style="width: 70vw; display: block; margin-left: auto; margin-right: auto;">
  <div id="printElement" >
      <div class="col-lg-12" >
          <div class="text-center">
            <div style="position: absolute;">
              <img src="../images/logo.png" alt="brgylogo" width="60">
            </div>
            <h6 style="margin-bottom: 0px;">Republic of the Philippines</h6>
            <h6 style="margin-bottom: 0px;">North Luzon Philippines State College</h6>
            <h6 style="margin-top: 0px;">Candon City, Ilocos Sur</h6>
            <hr>
          </div>
          
          <div class="text-center mb-5" style="margin-top: 20px;">
            <h5><b>CERTIFICATION</b></h5>
          </div>
          
          <div class="mt-5" >
            <p class="">To whom it may concern:</p>
          </div>


          <div class="mt-2">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that Mr. <b><?php echo $row1['firstname']; echo ' '; echo $row1['middlename']; echo ' '; echo $row1['lastname'];?></b>, a <b><?php echo $row1['level']; echo ' '; echo $row1['section']; ?> </b> of the course <b><?php echo $row1['dept_name'];?></b> of this Institution requested the list of grade on the subjects that follows. </p>
          </div>

          <!-- END FETCHING RESIDENTS DATA -->
        
          <!-- END FETCHING RESIDENTS DATA -->
          <div class="row ">
            <div class="col-md-12 mt-4 mb-5">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>CODE</th>
                    <th>DESCRIPTIVE TITLE</th>
                    <th>GRADE</th>
                    <th>UNITS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                  $count = mysqli_query($conn, "SELECT SUM(Units) as unit FROM subject JOIN student ON subject.Sub_level=student.Id JOIN student_grade ON subject.sub_Id=student_grade.subject_id WHERE student.Id='$Id'  ");
                  $row_count = mysqli_fetch_array($count);

                  $ave = mysqli_query($conn, "SELECT AVG(grade) as grade FROM student_grade JOIN student ON student_grade.student_id=student.Id  WHERE student.Id='$Id'  ");
                  $row_ave = mysqli_fetch_array($ave);


                  $fetch1 = mysqli_query($conn, "SELECT * FROM subject JOIN student ON subject.Sub_level=student.Id JOIN student_grade ON subject.sub_Id=student_grade.subject_id WHERE student.Id='$Id'");
                  while($row = mysqli_fetch_array($fetch1)){ ?>
                  <tr>

                    <td><?php echo $row['Sub_code']; ?></td>
                    <td><?php echo $row['Sub_name']; ?></td>
                    <td><?php echo $row['grade']; ?> </td>
                    <td><?php echo $row['Units']; ?></td>

                    <?php }?>
                  </tr>
                
                </tbody>
              </table>
              <p style="position: absolute; right: 230px;">Gen. Weighted Ave. <span style="border-bottom: 1px solid grey;"><b><?php echo number_format((float)$row_ave['grade'], 2, '.', ''); ?></b></span>
              <p style="position: absolute; right: 125px;">Units <span style="border-bottom: 1px solid grey;"><b><?php echo $row_count['unit']; ?></b></span></p>
            </div>

          </div>


          <div>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is issued upon the request of <b><?php echo $row1['firstname']; echo ' '; echo $row1['middlename']; echo ' '; echo $row1['lastname'];?></b> this <b><?php echo date('Y-m-d'); ?><?php echo date('Y-m-d'); ?></b> for reference purposes only.</p>
          </div>
         
          

          <div class="mt-5">
            <p>Not valid without a seal:</p>
          </div>
          <?php 
            $official = mysqli_query($conn, "SELECT * FROM user WHERE usertype='Teacher' ");
            $row_officials = mysqli_fetch_array($official);
          ?>

          <div class="mt-5">
            <p class="justify-content-end d-flex"><b><?php echo $row_officials['firstname']; echo ' '; echo $row_officials['middlename']; echo ' '; echo $row_officials['lastname'];?></b></p>
            <span class="justify-content-end d-flex" style="font-size: 12px; margin-right: 70px;margin-top: -18px;">Registrar II</span>
          </div>


        <?php } ?>




      </div>
  </div>
  </div>

  


   <script src="print.js"> </script>
</body>
</html>