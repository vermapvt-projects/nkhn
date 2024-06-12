<?php
include "includes/config.php";
if (isset($_POST['submit'])) {
	$Mainname = mysqli_escape_string($conn, $_POST['name']);
	$name = htmlspecialchars($Mainname);
	$name = encrypt_decrypt('encrypt', $name, $enckey);

	$Mainemail = mysqli_escape_string($conn, $_POST['email']);
	$email = htmlspecialchars($Mainemail);
	$email = encrypt_decrypt('encrypt', $email, $enckey);

	$phone = mysqli_escape_string($conn, $_POST['phone_number']);
	$phone = htmlspecialchars($phone);
	$phone = encrypt_decrypt('encrypt', $phone, $enckey);

	$message = mysqli_escape_string($conn, $_POST['message']);
	$message = htmlspecialchars($message);
	$message = encrypt_decrypt('encrypt', $message, $enckey);	

$crossCheck = mysqli_query($conn, "SELECT * FROM leads WHERE email='$email' OR phone_number='$phone';");
if(mysqli_num_rows($crossCheck) > 0){
	$arrBlock = array(
		'status' => 'blocked',
		'reason' => 'Duplicate entries not allowed');
	echo json_encode($arrBlock, JSON_PRETTY_PRINT);
	exit;
}else{

	mysqli_query($conn, "INSERT INTO leads (name,email,phone_number,data) VALUES ('$name','$email', '$phone', '$message');");
	// To Admin
	sendEmail("info@nkhn.nl", $Mainname, "New Lead Recieved from $Mainname", "
		Hello Sander,<br>
		We've recived a new inquiry for security services at NKHN Security. Kindly login into the Secure Dashboard to Check the details.
		<br>
		<a href='https://security.nkhn.nl/nkhnpanel/login.php'>Click Here to Login</a>
		", "altbody");

	// To User
	sendEmail($Mainemail, $Mainname, "Thanks for choosing us @$Mainname", "
		Hello $Mainname,<br>
		We've recived your inquiry for security services at NKHN Security. One of our associates will get in touch with you shortly. Thanks for choosing us.
		<br><br>
		--<br>
		Thanks & Regards,<br>
		Sander Ruitenbeek<br>
		Chief Executive Officer<br>
		NKHN Security<br>
		", "altbody");
}
}

?>
<!doctype html>
<html lang="zxx">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Links Of CSS File -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/flaticon.css">
		<link rel="stylesheet" href="assets/css/remixicon.css">
		<link rel="stylesheet" href="assets/css/meanmenu.min.css">
		<link rel="stylesheet" href="assets/css/odometer.min.css">
		<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/responsive.css">
		
		<!-- Favicon -->
		<link rel="icon" type="image/png" href="assets/images/favicon.png">
		<!-- Title -->
		<title>Contact Us - NKHN</title>
    </head>

    <body>
		<!-- Start For overflow-hidden & tween-animation -->
		<div class="overflow-hidden tween-animation">
			<!-- Start Preloader Area -->
			<div class="preloader">
				<div class="lds-ripple">
					<div class="preloader-container">
						<div class="petal"></div>
						<div class="petal"></div>
						<div class="petal"></div>
						<div class="petal"></div>
						<div class="petal"></div>
						<div class="petal"></div>
						<div class="petal"></div>
						<div class="petal"></div>
						<div class="petal-1"></div>
						<div class="petal-1"></div>
						<div class="petal-1"></div>
						<div class="ball"></div>
					</div>
				</div>
			</div>
			<!-- End Preloader Area -->

			<!-- Start Header Area -->
			<div class="header-area bg-color-eff1f6">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3">
							<ul class="header-left-content">
								<li>
									Welcome to NKHN. Need Help?  <a href="contact-us.php">Contact Us</a>
								</li>
							</ul>
						</div>
						<div class="col-xl-9">
							<ul class="heaqder-right-content">
								<li>
									<img src="assets/images/svg-icon/location.svg" alt="Image">
									Address:  Netherlands
								</li>
								<li>
									<img src="assets/images/svg-icon/call.svg" alt="Image">
									Contact:
									<a href="tel:+31 6 22518788">+31 6 22518788</a>
								</li>
								<li>
									<img src="assets/images/svg-icon/mail.svg" alt="Image">
									Contact Email: info@nkhn.com
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Header Area -->
			
			<!-- Start Navbar Area --> 
			<div class="navbar-area bg-color-272b3a">
				<div class="mobile-responsive-nav">
					<div class="container">
						<div class="mobile-responsive-menu">
							<div class="logo">
								<a href="index.php">
									<img src="assets/logo/Frame 269.png"  style="width:100px;" class="main-logo" alt="logo">
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="desktop-nav">
					<div class="container-fluid">
						<nav class="navbar navbar-expand-md navbar-light">
							<a class="navbar-brand" href="index.php">
								<img src="assets/logo/Frame 269.png"  style="width:100px;" class="main-logo" alt="logo">
							</a> 
							
							<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
								<ul class="navbar-nav ms-auto">
									

								<div class="others-options">
									<ul>
										
										
										<li>
											<a href="contact-us.php" class="default-btn active">Get Started Now</a>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>

				<div class="others-option-for-responsive">
					<div class="container">
						<div class="dot-menu">
							<div class="inner">
								<div class="circle circle-one"></div>
								<div class="circle circle-two"></div>
								<div class="circle circle-three"></div>
							</div>
						</div>
						
						<div class="container">
							<div class="option-inner">
								<div class="others-options justify-content-center">
									<ul>
										<li>
											<a href="cart.php" class="cart-btn">
												<i class="ri-shopping-cart-line"></i>
												<span>0</span>
											</a>
										</li>
										<li>
											<a href="contact-us.php" class="default-btn active">Get Started Now</a>
										</li>
									</ul>

									<form class="search-form">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Search here">
											<button type="submit" class="src-btn">
												<i class="ri-search-line"></i>
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Navbar Area -->

			<!-- Start Page Banner Area -->
			<div class="banner-page-area">
				<div class="container">
					<div class="page-banner-content">
						<ul>
							<li>
								<a href="index.php">Home</a>
							</li>
							<li>
								<span class="active">Contact Us</span>
							</li>
						</ul>

						<div class="ptb-100">
							<h2>Contact Us</h2>
							<p>Integrate local and cloud resources, protect user traffic and endpoints, and create custom, scalable network.</p>
						</div>
					</div>
				</div>

				<div class="only-shape banner-shape-1" data-speed="0.04" data-revert="true">
					<img src="assets/images/banner/banner-shape-2.png" alt="Image">
				</div>
				<div class="only-shape banner-shape-2" data-speed="0.06" data-revert="true">
					<img src="assets/images/banner/banner-shape-1.png" alt="Image">
				</div>
				<div class="only-shape banner-shape-3" data-speed="0.08" data-revert="true">
					<img src="assets/images/banner/banner-shape-4.png" alt="Image">
				</div>
			</div>
			<!-- End Page Banner Area -->

			<!-- Start Conatct Us Area -->
			<div class="contact-us-area default-shape bg-color-linear-5 ptb-100">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="contact-info-content">
								<span class="span">GET IN TOUCH</span>
								<h2>To Make Requests For Further Information Contact Us</h2>

								<div class="contat-social-wrap">
									<ul class="contact-info">
										<li>
											<span>Address :</span>
											Netherlands
										</li>
										<li>
											<span>Email :</span>
											info@nkhn.com
										</li>
										<li>
											<span>Phone :</span>
											<a href="tel:+31 6 22518788">+31 6 22518788</a>
										</li>
										<li>
											<span>Fax :</span>
											<a href="tel:+31 6 22518788">+31 6 22518788</a>
										</li>
									</ul>
	
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="contact-form">
								<h3>Send Us A Message</h3>

								<form method="POST">
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
												<div class="help-block with-errors"></div>
											</div>
										</div>
			
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
												<div class="help-block with-errors"></div>
											</div>
										</div>
			
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone No">
												<div class="help-block with-errors"></div>
											</div>
										</div>
			
								
			
										<div class="col-lg-12">
											<div class="form-group">
												<textarea name="message" class="form-control" id="message" cols="30" rows="4" required data-error="Write your message" placeholder="Enter you message"></textarea>
												<div class="help-block with-errors" aria-placeholder="Your Message"></div>
											</div>
										</div>
			
										<div class="col-12">
											<div class="form-check">
												<div class="form-group">
													<div class="form-check">
														<input
															name="gridCheck"
															value="I agree to the terms and privacy policy."
															class="form-check-input"
															type="checkbox"
															id="gridCheck"
															required
														>
												
														<label class="form-check-label" for="gridCheck">
															I agree to the <a href="#">Terms &amp; conditions</a>
														</label>
														<div class="help-block with-errors gridCheck-error"></div>
													</div>
												</div>
											</div>
										</div>
			
										<div class="col-lg-12 col-md-12">
											<button type="submit" class="default-btn" name="submit">
												Send Message
											</button>
											
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="only-shape shape-1" data-speed="0.04" data-revert="true">
					<img src="assets/images/team/team-shape-1.png" alt="Image">
				</div>
				<div class="only-shape shape-2" data-speed="0.06" data-revert="true">
					<img src="assets/images/team/team-shape-2.png" alt="Image">
				</div>
			</div>
			<!-- End Conatct Us Area -->

			<!-- Start Consultations Area -->
			<div class="consultations-area bg-color-linear-2">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-9">
							<div class="consultations-content">
								<h2>Ready To Get Free Consultations For Any Kind Of Solutions?</h2>
							</div>
						</div>

						<div class="col-lg-6 col-md-3">
							<div class="consultations-content-btn">
								<a href="contact-us.php" class="default-btn">
									Get A Quote
									<i class="ri-arrow-right-line"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="only-shape shape-1" data-speed="0.04" data-revert="true">
					<img src="assets/images/consultations-shape-1.png" alt="Image">
				</div>
				<div class="only-shape shape-2" data-speed="0.06" data-revert="true">
					<img src="assets/images/consultations-shape-2.png" alt="Image">
				</div>
			</div>
			<!-- End Consultations Area -->

			<!-- Start Footer Area -->
		<div class="footer-area pt-100 pb-70">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="single-footer-widget">
								<a href="index.php">
									<img src="assets/logo/Frame 269.png" class="main-logo" alt="Image">
								</a>

								<p>Uncover, Protect, and Secure with our Expert VAPT Services.
								Stay Ahead of Threats with NKHN’s Cutting-Edge Security Services And Solutions.</p>

								<ul class="social-link">
									<li>
										<a href="https://www.linkedin.com/company/nkhn-security/" target="_blank">
											<i class="ri-linkedin-fill"></i>
										</a>
									</li>
									<li>
										<a href="https://x.com/NkhnSecurity" target="_blank">
											<i class="ri-twitter-line"></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/nkhn_security" target="_blank">
											<i class="ri-instagram-line"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>

								<div class="col-lg-3 col-sm-6">
									<div class="single-footer-widget">
										<h3>Contact Us</h3>
		
										<ul class="contact-info">
											<li>
												<span>Address:</span>
												Netherlands
											</li>
											<li>
												<span>Email:</span>
												info@nkhn.com
											</li>
											<li>
												<span>Phone:</span>
												<a href="tel:+31 6 22518788">+31 6 22518788</a>
											</li>
											<li>
												<span>Phone:</span>
												<a href="tel:+31 6 22518788">+31 6 22518788</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Area -->

			<!-- Start Copyright Area -->
			<div class="copy-right-area">
				<div class="container">
					<p>© <span>NKHN</span> ALL RIGHTS RESERVED</p>
				</div>
			</div>
			<!-- End Copyright Area -->

			<!-- Start Go Top Area -->
			<div class="go-top">
				<i class="ri-arrow-up-s-fill"></i>
				<i class="ri-arrow-up-s-fill"></i>
			</div>
			<!-- End Go Top Area -->
		</div>
		<!-- End For overflow-hidden & tween-animation -->

        <!-- Links of JS File -->
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/meanmenu.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/tween-max.min.js"></script>
		<script src="assets/js/appear.min.js"></script>
		<script src="assets/js/odometer.min.js"></script>
		<script src="assets/js/smoothscroll.min.js"></script>
		<script src="assets/js/magnific-popup.min.js"></script>
		<script src="assets/js/form-validator.min.js"></script>
		<script src="assets/js/contact-form-script.js"></script>
		<script src="assets/js/ajaxchimp.min.js"></script>
		<script src="assets/js/custom.js"></script>
    </body>
</html>