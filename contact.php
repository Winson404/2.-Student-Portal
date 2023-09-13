<?php 
	include 'topbar.php';
?>


	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">Contact Us</h2>
				</div>
			</div>
		</div>
	</section>

	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<br>
				<div class="alert alert-success hidden" id="contactSuccess">
					<strong>Success!</strong> Your message has been sent to us.
				</div>
				<div class="alert alert-error hidden" id="contactError">
					<strong>Error!</strong> There was an error sending your message.
				</div>
				<div class="contact-form">
					<form id="contact-form" role="form" novalidate="novalidate">
						<div class="form-group has-feedback">
							<label for="name">Name*</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="">
							<i class="fa fa-user form-control-feedback"></i>
						</div>
						<div class="form-group has-feedback">
							<label for="email">Email*</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="">
							<i class="fa fa-envelope form-control-feedback"></i>
						</div>
						<div class="form-group has-feedback">
							<label for="subject">Subject*</label>
							<input type="text" class="form-control" id="subject" name="subject" placeholder="">
							<i class="fa fa-navicon form-control-feedback"></i>
						</div>
						<div class="form-group has-feedback">
							<label for="message">Message*</label>
							<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
							<i class="fa fa-pencil form-control-feedback"></i>
						</div>
						<input type="submit" value="Submit" class="btn btn-default">
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="span4">
					<div class="title-box clearfix ">
						<h3 class="title-box_primary">Contact info</h3>
					</div> 
				<h5 class="">Office of the President</h5>

				<p>2/F Administration Bldg.
					North Luzon Philippines State College
					San Nicolas, Candon City, Ilocos Sur
					Contact Nos: 644-0210 | 09175020684
					<br>
					Email: nlpsc_candon@yahoo.com
				</p>
				<br>

				<h5 class="">Office of Admissions and Scholarships</h5>

				<p>1/F Administration Bldg.
					North Luzon Philippines State College
					San Nicolas, Candon CIty, Ilocos Sur
					Contact Nos: 674-0992 | 09166853308
					<br>
					Email: nlpscregistrar@yahoo.com
				</p>
				<br>

				<h5 class="">For Inquiries on PBB: Mrs. Jessica D. Guitba</h5>

				<p>1/F Administration Bldg.
					North Luzon Philippines State College
					San Nicolas, Candon CIty, Ilocos Sur
					Tel. Nos: 674-0992 | 09361078102
				</p>
				</div> 
			</div>
		</div>
	</div>
 
	<?php
		include 'footer.php';
	?>
