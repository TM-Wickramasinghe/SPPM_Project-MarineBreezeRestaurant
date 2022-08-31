<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>MB - Feedback</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="jquery-3.3.1.min.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="@sweetalert2/theme-dark/dark.css">
	<!-- Vendor CSS Files -->
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<?php
	include('config.php');
	if (isset($_POST['submit1'])) {

		$fName = $_POST["fname"];
		$fComment = $_POST["feedback"];


		$sql = "INSERT INTO `feedback` (`fID`,`fName`, `fComment`) VALUES (NULL,'$fName', '$fComment');";



		$result = mysqli_query($con, $sql);

		header("Location: feedback.php?feed=1");
	}

	?>



</head>

<body>
	<?php

	if (isset($_GET['feed'])) {
		//echo "<script>alert('Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!');
		//		</script>";
		echo '<script>Swal.fire({
            title: "Feedback Successfully sent !",
            text: "Thank you!",
            icon: "success",
            button: "Ok",
            timer: 5000
        })
				</script>";';
	}
	?>
	<!-- ======= Top Bar ======= -->
	<div id="topbar" class="d-flex align-items-center fixed-top">
		<div class="container d-flex justify-content-center justify-content-md-between">

			<div class="contact-info d-flex align-items-center">
				<i class="bi bi-phone d-flex align-items-center"><span>+94 71 9984 540</span></i>
				<i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sun: 11AM - 11PM</span></i>
			</div>

			<div class="languages d-none d-md-flex align-items-center">
				<!--<ul>
          <li>En</li>
          <li><a href="#">De</a></li>
        </ul>
		-->
			</div>
		</div>
	</div>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top d-flex align-items-cente">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

			<a href="index.php">
				<h1 class="index.php">Marine Breeze</h1>
			</a>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto" href="index.php#home">Home</a>
					</li>
					<li><a class="nav-link scrollto" href="index.php#about">About</a>
					</li>
					<li><a class="nav-link scrollto" href="index.php#menu">Menu</a>
					</li>
					<li><a class="nav-link scrollto" href="index.php#specials">Specials</a>
					</li>
					<li><a class="nav-link scrollto" href="index.php#events">Events</a>
					</li>
					<li><a class="nav-link scrollto" href="index.php#chefs">Chefs</a>
					</li>
					<li><a class="nav-link scrollto" href="index.php#gallery">Gallery</a>
					</li>
					<li><a class="nav-link scrollto active" href="feedback.php">Feedback</a>
					</li>
					<li><a class="nav-link scrollto" href="index.php#contact">Contact</a>
					</li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
			<!-- .navbar -->
			<a href="index.php#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

		</div>
	</header>
	<!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section>
		<div class="container" data-aos="fade-up">


			<div class="section-title" style="margin-top: 100px">
				<h2>Feedback</h2>
				<p>Share your feedback with us</p>
			</div>
			<form method="post" class="php-email-form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-12  form-group">
						<input type="text" name="fname" class="form-control" placeholder="Your Name(Optional)" />

					</div>
				</div>
				<div class="form-group mt-3">
					<textarea class="form-control" name="feedback" rows="7" placeholder="Feedback" required></textarea>

				</div>

				<div class="text-center"><input type="submit" name="submit1" class="btn btn-primary mr-2" value="Send Feedback" style="background-color: #A38212; margin-top: 15px" />
				</div>

			</form>





		</div>
	</section>
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Contact</h2>
				<p>Contact Us</p>
			</div>
		</div>

		<div class="container" data-aos="fade-up">

			<div class="row mt-5">

				<center>
					<div class="col-lg-4">
						<div class="info">
							<div class="address">
								<i class="bi bi-geo-alt"></i>
								<h4>Location:</h4>
								<p>24, Galle Road, Kalutara.</p>
							</div>

							<div class="open-hours">
								<i class="bi bi-clock"></i>
								<h4>Open Hours:</h4>
								<p>
									Monday-Sunday:<br> 11:00 AM - 11:00 PM
								</p>
							</div>

							<div class="email">
								<i class="bi bi-envelope"></i>
								<h4>Email:</h4>
								<p>marinebreeze.kal@gmail.com</p>
							</div>

							<div class="phone">
								<i class="bi bi-phone"></i>
								<h4>Call:</h4>
								<p>+94 71 9984 540</p>
							</div>

						</div>

					</div>
				</center>

			</div>

		</div>
	</section>
	<!-- End Contact Section -->

	</main>
	<!-- End #main -->



	<div class="container">
		<div class="copyright">
			<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Marine Breeze
				2022</span>
		</div><br>
		<div class="credits">
			<!-- All the links in the footer should remain intact. -->
			<!-- You can delete the links only if you purchased the pro version. -->
			<!-- Licensing information: https://bootstrapmade.com/license/ -->
			<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
		</div>
	</div>
	</footer>
	<!-- End Footer -->

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
	<!-- AI CHATBOT -->
	<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
	<df-messenger intent="WELCOME" chat-title="Mr.Bot" agent-id="8daef6bb-751e-4dd2-a504-c6754ba7b3cb" language-code="en"></df-messenger>
</body>
