<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Marine Breeze</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<script src="sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

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
	$sql = "SELECT * FROM `menu`";
	$result = mysqli_query($con, $sql);
	if (isset($_POST['submit'])) {

		$rName = $_POST["name"];
		$rEmail = $_POST["email"];
		$rContactNumber = $_POST["contactNumber"];
		$rDate = $_POST["date"];
		$rTime = $_POST["time"];
		$rNoOfPeople = $_POST["noOfPeople"];
		$rMessage = $_POST["message"];


		$sql = "INSERT INTO `reservation` (`rID`,`rName`, `rEmail`, `rContactNumber`, `rDate`, `rTime`, `rNoOfPeople`, `rMessage`) VALUES (NULL,'$rName', '$rEmail', '$rContactNumber', '$rDate', '$rTime', '$rNoOfPeople', '$rMessage');";



		$result = mysqli_query($con, $sql);

		header("Location: index.php?booking=1");
	}

	?>

</head>

<body>
	<?php

	if (isset($_GET['booking'])) {
		echo "
			<script>
				alert('Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!');
				location.href='index.php'
			</script>
		";
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
					<li><a class="nav-link scrollto active" href="#hero">Home</a>
					</li>
					<li><a class="nav-link scrollto" href="#about">About</a>
					</li>
					<li><a class="nav-link scrollto" href="#menu">Menu</a>
					</li>
					<li><a class="nav-link scrollto" href="#specials">Specials</a>
					</li>
					<li><a class="nav-link scrollto" href="#events">Events</a>
					</li>
					<li><a class="nav-link scrollto" href="#chefs">Chefs</a>
					</li>
					<li><a class="nav-link scrollto" href="#gallery">Gallery</a>
					</li>
					<li><a class="nav-link scrollto" href="feedback.php">Feedback</a>
					</li>
					<li><a class="nav-link scrollto" href="#contact">Contact</a>
					</li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
			<!-- .navbar -->
			<a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

		</div>
	</header>
	<!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
			<div class="row">
				<div class="col-lg-8">
					<h1>Welcome to <span>Marine Breeze Restaurant</span></h1>
					<h2>Great food for more than 2 years!</h2>

					<div class="btns">
						<a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
						<a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Reserve a Table</a>
					</div>
				</div>


			</div>
		</div>
	</section>
	<!-- End Hero -->

	<main id="main">

		<!-- ======= About Section ======= -->
		<section id="about" class="about">
			<div class="container" data-aos="fade-up">

				<div class="row">
					<div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
						<div class="about-img">
							<img src="assets/img/about.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
						<h3>We provide for the most worthy pleasures as if the pleasures of the body were to be assumed.</h3>
						<br>
						<p class="fst-italic">
							The delicious taste of Sri Lankan and international cuisine with the preparation of royal dishes created by our master chefs. From sparkling appetizers to scrumptious desserts and desserts, there's something for everyone in Garton's box, our dishes bursting with amazing flavors, spices and textures are made from quality ingredients that are beautifully presented for a memorable dining experience. Enjoy a Wing meal cart or Set Menu lunches and Breakfast Buffet on Friday, Saturday, and Sunday.
						</p>
					</div>
				</div>

			</div>
		</section>
		<!-- End About Section -->

		<!-- ======= Why Us Section ======= -->
		<section id="why-us" class="why-us">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Why Us</h2>
					<p>Why Choose Our Restaurant</p>
				</div>

				<div class="row">

					<div class="col-lg-4">
						<div class="box" data-aos="zoom-in" data-aos-delay="100">
							<span>01</span>
							<h4> We LOVE our customers.</h4>
							<p>We love receiving customer feedback! It helps us to keep our products and customer services always on highest standard.</p>
						</div>
					</div>

					<div class="col-lg-4 mt-4 mt-lg-0">
						<div class="box" data-aos="zoom-in" data-aos-delay="200">
							<span>02</span>
							<h4> Never serve low quality food.</h4>
							<p>We use fresh vegetables, meats and quality ingredients. We never serve food that has expired.</p>
						</div>
					</div>

					<div class="col-lg-4 mt-4 mt-lg-0">
						<div class="box" data-aos="zoom-in" data-aos-delay="300">
							<span>03</span>
							<h4> Great Ambience.</h4>
							<p>Well tidy atmosphere and music will relief your stress & uplift your mood. Comfortable seating will let you enjoy your food.</p>
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End Why Us Section -->

		<!-- ======= Menu Section ======= -->
		<section id="menu" class="menu section-bg">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Menu</h2>
					<p>Check Our Tasty Menu</p>
				</div>

				<div class="row" data-aos="fade-up" data-aos-delay="100">
					<div class="col-lg-12 d-flex justify-content-center">
						<ul id="menu-flters">
							<li data-filter="*" class="filter-active">All</li>
							<li data-filter=".filter-Appetizers">Appetizers</li>
							<li data-filter=".filter-Side_Dish">Side Dishes</li>
							<li data-filter=".filter-Main_Course">Main Course</li>
							<li data-filter=".filter-Dessert">Desserts</li>
							<li data-filter=".filter-Drinks">Drinks</li>
						</ul>
					</div>
				</div>
				<div class="row menu-container" data-aos="fade-up" data-aos-delay="200" style="margin-left: 150px">
					<?php
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
					?>
							<div class="col-lg-12 menu-item filter-<?php echo $row['Category']; ?>">
								<div clas="row col-lg-12">
									<div class="col-lg-3">
										<img src="<?php echo $row['Picture']; ?>" class="menu-img" alt="">
									</div>
									<div class="col-lg-9">
										<div class="row">
											<div class="col-lg-6">
												<?php echo $row['Name']; ?>
											</div>
											<div class="col-lg-2">
												<?php
												if ($row['PriceSmall'] == 'N/A') {
													echo ('');
												} else {
													echo ('S : Rs.' . $row['PriceSmall'] . ' /-');
												}
												?>

											</div>
											<div class="col-lg-2">
												<?php
												if ($row['PriceMedium'] == 'N/A') {
													echo ('');
												} else {
													echo ('M : Rs.' . $row['PriceMedium'] . ' /-');
												}
												?>

											</div>
											<div class="col-lg-2">
												<?php
												if ($row['PriceLarge'] == 'N/A') {
													echo ('');
												} else {
													echo ('L : Rs.' . $row['PriceLarge'] . ' /-');
												}
												?>
											</div>
											<div class="col-lg-10">
												<?php echo $row['Description']; ?>
											</div>
											<?php
											if ($row['Availability'] == 'Available') {
												echo ('<div class="col-lg-2" style="color: aquamarine">' . $row['Availability'] . '
										</div>');
											} else {
												echo ('<div class="col-lg-2" style="color: red">' . $row['Availability'] . '
										</div>');
											}
											?>

										</div>
									</div>
								</div>
							</div>
					<?php
						}
					}
					//mysqli_close( $con );
					?>

				</div>
			</div>
		</section>
		<!-- End Menu Section -->

		<!-- ======= Specials Section ======= -->
		<section id="specials" class="specials">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Specials</h2>
					<p>Check Our Specials</p>
				</div>

				<div class="row" data-aos="fade-up" data-aos-delay="100">
					<div class="col-lg-3">
						<ul class="nav nav-tabs flex-column">
							<li class="nav-item">
								<a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Marine Breeze Mixed Grill</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-2">Caesar salad with shrimps & Chicken</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-3">Spaghetti Bolognese</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-4">Marinara Spaghetti</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-5">Marine Breeze Special Mix Rice</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-9 mt-4 mt-lg-0">
						<div class="tab-content">
							<div class="tab-pane active show" id="tab-1">
								<div class="row">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Marine Breeze Mixed Grill</h3>
										<p class="fst-italic">A mixed grill is a plate containing a grilled sausage, a grilled chop, a piece of grilled steak, grilled mushrooms and grilled tomatoes, along with the usual chips (fries) and peas. Meaty and incredibly hearty.</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="assets/img/mixedgrill.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-2">
								<div class="row">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Caesar salad with shrimps & Chicken</h3>
										<p class="fst-italic">This recipe uses a combo of Romaine lettuce, chicken, French bread, parmesan cheese, anchovies, greek yogurt then a few more food staples like garlic, olive oil, mayonnaise.
										</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="assets/img/caesersalad.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-3">
								<div class="row">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Spaghetti Bolognese</h3>
										<p class="fst-italic">Consists of spaghetti (long strings of pasta) with an Italian ragù (meat sauce) made with minced beef, bacon and tomatoes, served with Parmesan cheese.
										</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="assets/img/spaghettiBolognese.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-4">
								<div class="row">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Marinara Spaghetti</h3>
										<p class="fst-italic">A classic, easy seafood pasta made using a seafood marinara mix: prawns / shrimp, calamari, fish and mussels tossed through a simple, tasty tomato sauce. Made properly, the real proper Italian way.
										</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="assets/img/Marinara.png" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-5">
								<div class="row">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Marine Breeze Special Mixed Rice</h3>
										<p class="fst-italic">Mixed rice combines rice with various meats, vegetables, and spices decorated with dates, rosins, prawns and eggs fried rice, just mixed aside from fire with other fried ingredients.
										</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="assets/img/mixrice.png" alt="" class="img-fluid">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- End Specials Section -->

		<!-- ======= Events Section ======= -->
		<section id="events" class="events">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Events</h2>
					<p>Organize Your Events in our Restaurant</p>
				</div>

				<div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
					<div class="swiper-wrapper">

						<div class="swiper-slide">
							<div class="row event-item">
								<div class="col-lg-6">
									<img src="assets/img/event-birthday.jpg" class="img-fluid" alt="">
								</div>
								<div class="col-lg-6 pt-4 pt-lg-0 content">
									<h3>Birthday Parties</h3>
									<div class="price">
										<p><span>LKR 65000 </span>
										</p>
									</div>
									<p class="fst-italic">
										Exclusive venue and garden area
									</p>
									<ul>
										<li><i class="bi bi-check-circled"></i> Foods – Choice of 6 party foods</li>
										<li><i class="bi bi-check-circled"></i> Fruit juice</li>
										<li><i class="bi bi-check-circled"></i> Basic party invitations, balloons and birthday banner</li>
										<li><i class="bi bi-check-circled"></i>Theme plates, cups & napkins</li>
									</ul>
									<p>Surround Sound BOSE Music System
									</p>
								</div>
							</div>
						</div>
						<!-- End testimonial item -->

						<div class="swiper-slide">
							<div class="row event-item">
								<div class="col-lg-6">
									<img src="assets/img/event-private.jpg" class="img-fluid" alt="">
								</div>
								<div class="col-lg-6 pt-4 pt-lg-0 content">
									<h3>Private Parties</h3>
									<div class="price">
										<p><span>LKR 50000</span>
										</p>
									</div>
									<p class="fst-italic">
										SUNDOWNER(Air- Conditioned)
									</p>
									<ul>
										<li><i class="bi bi-check-circled"></i> Can be booked anytime morning or evening, including lunch & dinner (except on Fridays Evenings</li>
										<li><i class="bi bi-check-circled"></i> Minimum food bill – Rs.50,000/-++</li>
										<li><i class="bi bi-check-circled"></i> No Area Charge for the first 4 hours, thereafter it is Rs.5000/- per hour</li>
									</ul>
									<p>
										No smoking inside the hall.
									</p>
								</div>
							</div>
						</div>
						<!-- End testimonial item -->

						<div class="swiper-slide">
							<div class="row event-item">
								<div class="col-lg-6">
									<img src="assets/img/event-custom.jpg" class="img-fluid" alt="">
								</div>
								<div class="col-lg-6 pt-4 pt-lg-0 content">
									<h3>Custom Parties</h3>
									<div class="price">
										<p><span>LKR 20000</span>
										</p>
									</div>
									<p class="fst-italic">
										TABLE BOOKINGS – Garden and Wheel House Bar
									</p>
									<ul>
										<li><i class="bi bi-check-circled"></i>A la carte menu – excluding Club nights on (Wednesday, Friday, Saturday & Sunday)</li>
										<li><i class="bi bi-check-circled"></i> 15 pax(Maximum)</li>
										<li><i class="bi bi-check-circled"></i> This is applicable only after 5.00pm. There are no restrictions at lunch time.</li>
									</ul>
									<p>
										Tables reservations for over 15 pax can only be in the Garden & Wheel House Bar
									</p>
								</div>
							</div>
						</div>
						<!-- End testimonial item -->

					</div>
					<div class="swiper-pagination"></div>
				</div>

			</div>
		</section>
		<!-- End Events Section -->

		<!-- ======= Book A Table Section ======= -->
		<section id="book-a-table" class="book-a-table">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Reservation</h2>
					<p>Book a Table</p>
				</div>
				<form method="post" class="php-email-form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-4 col-md-6 form-group">
							<input type="text" name="name" class="form-control" placeholder="Your Name" />

						</div>
						<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
							<input type="email" class="form-control" name="email" placeholder="Your Email" />

						</div>
						<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
							<input type="text" class="form-control" name="contactNumber" placeholder="Your Contact Number" />

						</div>
						<div class="col-lg-4 col-md-6 form-group mt-3">
							<input type="date" name="date" class="form-control" placeholder="Date" />

						</div>
						<div class="col-lg-4 col-md-6 form-group mt-3">
							<input type="time" class="form-control" name="time" placeholder="Time" />

						</div>
						<div class="col-lg-4 col-md-6 form-group mt-3">
							<input type="number" class="form-control" name="noOfPeople" placeholder="No of people" />

						</div>
					</div>
					<div class="form-group mt-3">
						<textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>

					</div>

					<div class="text-center"><input type="submit" name="submit" class="btn btn-primary mr-2" value="Book a Table" style="background-color: #A38212" />
					</div>

				</form>





			</div>
		</section>
		<!-- End Book A Table Section -->
		<!-- ======= Testimonials Section ======= -->
		<section id="testimonials" class="testimonials section-bg">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Testimonials</h2>
					<p>What they're saying about us</p>
				</div>

				<div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
					<div class="swiper-wrapper">

						<?php
						include('config.php');
						$sql2 = "SELECT * FROM `feedback`";
						$result2 = mysqli_query($con, $sql2);
						if (mysqli_num_rows($result2) > 0) {
							while ($row = mysqli_fetch_assoc($result2)) {
						?>

								<div class="swiper-slide">
									<div class="testimonial-item">
										<p>
											<i class="bx bxs-quote-alt-left quote-icon-left"></i>
											<?php echo $row['fComment']; ?>
											<i class="bx bxs-quote-alt-right quote-icon-right"></i>
										</p>
										<h3>
											<?php echo $row['fName']; ?>
										</h3>
										<div class="swiper-pagination"></div>
									</div>
								</div>
								<!-- End testimonial item -->



						<?php
							}
						}
						//mysqli_close( $con );
						?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>

		</section>
		<!-- End Testimonials Section -->


		<!-- ======= Gallery Section ======= -->
		<section id="gallery" class="gallery">

			<div class="container" data-aos="fade-up">
				<div class="section-title">
					<h2>Gallery</h2>
					<p>Some photos from Our Restaurant</p>
				</div>
			</div>

			<div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

				<div class="row g-0">

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
								<img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
							</a>



						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End Gallery Section -->

		<!-- ======= Chefs Section ======= -->
		<section id="chefs" class="chefs">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Chefs</h2>
					<p>Our Proffesional Chefs</p>
				</div>

				<div class="row">

					<div class="col-lg-4 col-md-6">
						<div class="member" data-aos="zoom-in" data-aos-delay="100">
							<img src="assets/img/chefs/c1.png" class="img-fluid" alt="">
							<div class="member-info">
								<div class="member-info-content">
									<h4>Sudath Baddearachchi</h4>
									<span>Master Chef</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="member" data-aos="zoom-in" data-aos-delay="200">
							<img src="assets/img/chefs/c2.png" class="img-fluid" alt="">
							<div class="member-info">
								<div class="member-info-content">
									<h4>Miroli Pieris</h4>
									<span>Patissier</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="member" data-aos="zoom-in" data-aos-delay="300">
							<img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
							<div class="member-info">
								<div class="member-info-content">
									<h4>Stephen Abhishake</h4>
									<span>Cook</span>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End Chefs Section -->

		<!-- ======= Contact Section ======= -->
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

</body>

</html>
