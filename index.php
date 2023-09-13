<?php 
	include 'topbar.php';
?>

	<section id="featured">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="./img/slides/1.jpg" alt=""/>
                <div class="flex-caption">
                   <div class="item_introtext"> 
												<strong>Online Education</strong>
												<p>The best educational template</p> </div>
                </div>
              </li>
              <li>
                <img src="img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                     <div class="item_introtext"> 
													<strong>School Education</strong>
													<p>Get all courses with on-line content</p> </div>
                </div>
              </li>
              <li>
                <img src="img/slides/3.jpg" alt="" />
                <div class="flex-caption">
                     <div class="item_introtext"> 
													<strong>Collage Education</strong>
													<p>Awesome Template get it know</p> </div>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
	</section>



	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">Login</h2>
				</div>
			</div>
		</div>
	</section>

	
	<div class="container">
		<div class="row"  >
			<div class="col-md-6" style="min-height: 200px;  margin-right: auto; margin-left: auto; display: block;">
				<div class="contact-form">

					<form action="login.php" method="POST" >

						<div class="form-group has-feedback">
							<label for="email">Username</label>
							<input type="text" class="form-control" name="username" placeholder="" required>
							<i class="fa fa-user form-control-feedback"></i>
						</div>

						<div class="form-group has-feedback">
							<label for="message">Password</label>
							<input type="password" class="form-control" name="password" placeholder="" required>
							<i class="fa fa-lock form-control-feedback"></i>
						</div>

						<button type="submit" class="btn btn-primary" name="login">Login</button>

					</form>
					<br>	
					<span>Don't have an account yet? <a href="register.php"><b>Click here!</b></a></span>
				</div>
			</div>
		</div>
	</div>


	
	<section class="courses" >
		<div class="container" id="courses">
			<div class="row">
				<div class="col-lg-12">
					<div class="aligncenter"><h2 class="aligncenter">Courses We Offer</h2>
						<span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"></span>A course description is a brief summary of the significant learning experiences for a course. Course descriptions appear in individual Course Outlines and in the Program of Studies (POSs) for individual programs.
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
					include 'config.php';
					$department = mysqli_query($conn,"SELECT * FROM department");
					while ($row = mysqli_fetch_array($department)) {
				?>
	      <div class="col-md-4" style="margin-top: 20px;">
					<div class="textbox" style=" height: 200px; overflow: auto;">
		        <h3><?php echo $row['dept_name']; ?></h3>
						<p><?php echo $row['department_description']; ?></p>
		       </div> 
	      </div>
	    <?php } ?>
			</div>
	</section>


	<section class="courses" >
		<div class="container" id="announcement">
			<div class="row">
				<div class="col-lg-12">
					<div class="aligncenter"><h2 class="aligncenter">Departmental Announcements</h2>
					<span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"></span>A course description is a brief summary of the significant learning experiences for a course. Course descriptions appear in individual Course Outlines and in the Program of Studies (POSs) for individual programs.
					</div>
				</div>
			</div>
			<div class="row" style="display: flex; flex-direction: row; justify-content: space-around;">
				<?php 
					include 'config.php';
					$department = mysqli_query($conn,"SELECT * FROM department JOIN announcement ON department.Id=announcement.department_id");
					while ($row = mysqli_fetch_array($department)) {
				?>
				 <div class="card" style="width: 30rem; background-color: #EBECF0; padding: 10px; border-radius: 2px;">
					 	<h4><?php echo $row['dept_name'];?></h4>
					  <img class="img-responsive" src="./images-announcements/<?php echo $row['image'];?>" alt="image" style="height: 20rem;">
					  <div class="card-body" style="height: 20rem; overflow: auto;">
					  	<h5><?php echo $row['announcement_topic'];?></h5>
					    <p class="card-text"><?php echo $row['description'];?></p>
					  </div>
				</div>
	      <?php } ?>
			</div>
	</section>

<?php
	include 'footer.php';
 ?>
