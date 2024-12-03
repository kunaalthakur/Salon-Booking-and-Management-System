<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../application/utils/app_config.php';
require_once __DIR__ . '/../application/auth/check_auth_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Saloon Hub Super Admin</title>

	<!-- FAVICONS ICON -->
	<!-- <link rel="shortcut icon" type="image/png" href="images/favicon.png" /> -->
	<link href="<?php echo $app_name; ?>/public/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="<?php echo $app_name; ?>/public/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

	<!-- Style css -->
	<link href="<?php echo $app_name; ?>/public/css/style.css" rel="stylesheet">
	<style>
		/* line 69, H:/admin_project/hospital/scss/_main_content.scss */
.single_element h4 {
  margin-bottom: 30px;
}

/* line 72, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .quick_activity_wrap {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
  margin-bottom: 30px;
}

@media (max-width: 575.98px) {
  /* line 72, H:/admin_project/hospital/scss/_main_content.scss */
  .single_element .quick_activity_wrap {
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 15px;
    margin-bottom: 30px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 72, H:/admin_project/hospital/scss/_main_content.scss */
  .single_element .quick_activity_wrap {
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 15px;
    margin-bottom: 30px;
  }
}

@media (min-width: 768px) and (max-width: 991.98px) {
  /* line 72, H:/admin_project/hospital/scss/_main_content.scss */
  .single_element .quick_activity_wrap {
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 15px;
    margin-bottom: 30px;
  }
}

@media (min-width: 992px) and (max-width: 1199.98px) {
  /* line 72, H:/admin_project/hospital/scss/_main_content.scss */
  .single_element .quick_activity_wrap {
    grid-template-columns: repeat(2, 1fr);
    margin-bottom: 30px;
  }
}

@media (min-width: 1200px) and (max-width: 1500px) {
  /* line 72, H:/admin_project/hospital/scss/_main_content.scss */
  .single_element .quick_activity_wrap {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* line 100, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity {
  background-color: #fff;
  border-radius: 10px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  padding: 43px 30px;
  position: relative;
  align-items: center;
  justify-content: center;
}

/* line 108, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity::before {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  content: '';
  background-position: center center;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  background-size: cover;
  background-image: url(../img/diamond.png);
}

@media (max-width: 575.98px) {
  /* line 100, H:/admin_project/hospital/scss/_main_content.scss */
  .single_element .single_quick_activity {
    padding: 20px 15px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 100, H:/admin_project/hospital/scss/_main_content.scss */
  .single_element .single_quick_activity {
    padding: 20px 15px;
  }
}

/* line 136, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .icon {
  width: 60px;
  height: 60px;
  flex-basis: 60px;
  text-align: right;
}

/* line 141, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .icon img {
  width: 100%;
}

/* line 145, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .count_content {
  margin-left: 30px;
  flex-basis: 50%;
  text-align: left;
}

/* line 149, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .count_content.count_content2 {
  width: 100%;
  text-align: center;
  flex-basis: 100%;
  margin: 0 !important;
}

/* line 154, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .count_content.count_content2 .blue_color {
  color: #16BBE5 !important;
}

/* line 157, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .count_content.count_content2 .red_color {
  color: #EA5D5D !important;
}

/* line 160, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .count_content.count_content2 .yellow_color {
  color: #FCAD73 !important;
}

/* line 163, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity .count_content.count_content2 .green_color {
  color: #2DAAB8 !important;
}

/* line 168, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity h3 {
  font-size: 45px;
  margin-bottom: 0;
  font-weight: 600;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  color: #2E4765;
  margin-bottom: 0px;
  font-family: "Rajdhani", sans-serif;
  line-height: 1;
}

/* line 178, H:/admin_project/hospital/scss/_main_content.scss */
.single_element .single_quick_activity p {
  -webkit-transition: 0.5s;
  transition: 0.5s;
  font-size: 19px;
  font-weight: 500;
  color: #B2B5C0;
  font-family: "Rajdhani", sans-serif;
  line-height: 1;
}
	</style>
</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			<a href="<?php echo $app_name;?>/view/home.php" class="brand-logo">
				<img src="<?php echo $app_name; ?>/public/images/salon.png" style="width: 120px;">
			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Modal
        ***********************************-->

		<?php require_once __DIR__. '/partials/model.php'; ?>

		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								Overview
							</div>

						</div>

						<ul class="navbar-nav header-right">

							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="<?php echo $app_name; ?>/public/images/profile.jpg" width="20" alt="">
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="#" class="dropdown-item ai-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ms-2">Change password </span>
									</a>
									<a href="<?php echo $app_name; ?>/application/auth/logout.php" class="dropdown-item ai-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>
							<li class="nav-item">

							</li>
						</ul>

					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<?php require_once __DIR__ . '/partials/side_bar.php'; ?>
		<!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<div class="d-sm-flex d-block justify-content-between align-items-center mb-4">
					<div class="card-action coin-tabs mt-3 mt-sm-0">
						<!-- <ul class="nav nav-tabs" role="tablist">
							
								<li class="nav-item">
									<a class="nav-link active" data-bs-toggle="tab" href="#AllStatus">Pending</a>
								</li>
							
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#Pending">Confirm</a>
								</li>
							
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#cancle">Cancel</a>
								</li>
							
						</ul> -->
					</div>
					<!-- <div class="d-flex mt-sm-0 mt-3">
						<select class="default-select dashboard-select">
							<option data-display="newest">newest</option>

							<option value="2">oldest</option>
						</select>
					</div> -->
				</div>
				<div class="row">
				<div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="<?php echo $app_name; ?>/public/images/hair-salon-icon.svg" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter" id="salon_count">00</span> </h3>
                                                <p>Total Salons</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="<?php echo $app_name; ?>/public/images/man.svg" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter" id="customer_count">00</span> </h3>
                                                <p>Total Customers</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="<?php echo $app_name; ?>/public/images/reservation-icon.svg" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter" id="booking_count">00</span> </h3>
                                                <p>Total Booking</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/pharma.svg" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter">1730</span> </h3>
                                                <p>Pharmacusts</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
			</div>

		</div>
	</div>
	<!--**********************************
            Content body end
        ***********************************-->



	<!--**********************************
            Footer start
        ***********************************-->
	<div class="footer">
		<div class="copyright">
			<p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Furqan Raza</a> 2024</p>
		</div>
	</div>
	<!--**********************************
            Footer end
        ***********************************-->

	<!--**********************************
           Support ticket button start
        ***********************************-->

	<!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- app name  -->
	<script>
		var appname = '<?php echo $app_name; ?>';
	</script>
	<!-- Required vendors -->
	<script src="<?php echo $app_name; ?>/public/vendor/global/global.min.js"></script>
	<script src="<?php echo $app_name; ?>/public/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="<?php echo $app_name; ?>/public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

	<!-- Apex Chart -->
	<script src="<?php echo $app_name; ?>/public/vendor/apexchart/apexchart.js"></script>

	<script src="<?php echo $app_name; ?>/public/vendor/chart.js/Chart.bundle.min.js"></script>

	<!-- Chart piety plugin files -->
	<script src="<?php echo $app_name; ?>/public/vendor/peity/jquery.peity.min.js"></script>

	<!-- Dashboard 1 -->
	<script src="<?php echo $app_name; ?>/public/js/dashboard/dashboard-1.js"></script>

	<script src="<?php echo $app_name; ?>/public/vendor/owl-carousel/owl.carousel.js"></script>

	<script src="<?php echo $app_name; ?>/public/js/custom.min.js"></script>
	<script src="<?php echo $app_name; ?>/public/js/dlabnav-init.js"></script>
	<script src="<?php echo $app_name; ?>/public/js/demo.js"></script>
	<script src="<?php echo $app_name; ?>/public/js/styleSwitcher.js"></script>
	<script src="<?php echo $app_name; ?>/public/js/admin.js"></script>
	<script src="<?php echo $app_name; ?>/public/js/modal.js"></script>


	<script>
		function JobickCarousel() {

			/*  testimonial one function by = owl.carousel.js */
			jQuery('.front-view-slider').owlCarousel({
				loop: false,
				margin: 30,
				nav: true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				autoWidth: true,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				animateOut: 'fadeOut',
				dots: true,
				navText: ['', ''],
				responsive: {
					0: {
						items: 1
					},

					480: {
						items: 1
					},

					767: {
						items: 3
					},
					1750: {
						items: 3
					}
				}
			})
		}

		jQuery(window).on('load', function() {
			setTimeout(function() {
				JobickCarousel();
			}, 1000);
		});

		setInterval(() => {
			getCountOfAll();
		}, 2000);

		<script src="<?php echo $app_name; ?>/text-to-speech.js"></script>

	</script>

</body>

</html>