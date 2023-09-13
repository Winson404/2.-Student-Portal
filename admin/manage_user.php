 <?php include 'sidebar.php'; ?>

 <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card p-3">
          <h4 class="bg-light p-3" align="center"><strong>Manage Users</strong></h4>  
    
    <div class="table-responsive p-4">
      <a href="manage_user_create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Create new</a>
        <!-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-plus-square"></i> Create new</button> -->
<!-----------------------------------------SUCCESS SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert bg-success text-white mt-1" role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
        <?php unset($_SESSION['success']); } ?>
<!-----------------------------------------EXISTS  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h6 class="alert bg-danger text-white mt-1" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>

        <?php  if(isset($_SESSION['exists'])) { ?>
            <h6 class="alert bg-danger text-white mt-1" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
        <?php unset($_SESSION['exists']); } ?>
<!--###################################################################################################################################-->
      <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
          <tr>
            <th>Id</th>
            <th>Student name</th>
            <th>Email</th>
            <th>Usertype</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            $query ="SELECT * FROM user";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row["firstname"]; echo " "; echo $row["middlename"]; echo " "; echo $row["lastname"];?></td>
              <td><?php echo $row["email"];?></td>
              <td>
                <?php if($row['usertype'] == 'Admin'): ?>
                <span class="badge btn-primary"><?php echo $row["usertype"];?></span>
                <?php else: ?>
                <span class="badge btn-danger"><?php echo $row["usertype"];?></span>
                <?php endif; ?>
              </td>
              <td> 
                  <a href="manage_user_update.php?id=<?php echo $row['Id']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit</a> 
                  <!-- <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updateschoolyear_modal<?php echo $stud_id; ?>"><i class="bi bi-pencil-square"></i> Edit</button>            -->
                  <?php if($row['usertype'] == 'Admin'): ?>
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletestudent_modal<?php echo $row['Id']; ?>" disabled><i class="bi bi-trash"></i> Delete</button>
                  <?php else: ?>
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteuser_modal<?php echo $row['Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
                  <?php endif; ?>
              </td>                
          </tr>
            <?php 
              // include 'manage_student_confirm_account.php';
               include 'manage_user_delete.php';
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