<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from shreethemes.net/rentup-demo/rentup/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:07:12 GMT -->
<head>
		<meta charset="utf-8" />
		<meta name="author" content="Themezhub" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>RentUP - Residence & Real Estate Template</title>
		 
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
    </head>
	
    <body class="yellow-skin">
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
       <div class="preloader"></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			@include('components.header.header')
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ============================ Page Title Start================================== -->
			<div class="page-title" style="background:#f4f4f4 url(assets/img/bg.jpg);" data-overlay="5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap position-relative z-1">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">About Us</li>
								</ol>
								<h2 class="breadcrumb-title">About Us - Who We Are?</h2>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Our Story Start ================================== -->
			<section>
			
				<div class="container">
				
					<!-- row Start -->
					<div class="row align-items-center">
						
						<div class="col-lg-6 col-md-6">
							<div class="story-wrap explore-content">
								
								<h2 class="mb-3 fw-bold">Our Agency Story</h2>
								<span class="text-muted fs-5">Check out our company story and work process</span>
								<p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
								<a href="#" class="btn btn-danger">More About Us</a>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-6">
							<img src="assets/img/immio.jpg" class="img-fluid rounded" alt="" />
						</div>
						
					</div>
					<!-- /row -->					
					
				</div>
						
			</section>
			<!-- ============================ Our Story End ================================== -->
			
			<!-- ============================ Our Counter Start ================================== -->
			<section class="image-cover" style="background:#a70a29 url(assets/img/pattern.png) no-repeat;">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">
							<div class="text-center mb-5">
								<span class="text-light">Our Awards</span>
								<h2 class="font-weight-normal text-light">Over 1,24,000+ Happy User Bieng with us Still they Love Our Services</h2>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="_morder_counter">
								<div class="_morder_counter_thumb"><i class="ti-cup"></i></div>
								<div class="_morder_counter_caption">
									<h5 class="text-light"><span>32</span> M</h5>
									<span class="text-light">Blue Burmin Award</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="_morder_counter">
								<div class="_morder_counter_thumb"><i class="ti-briefcase"></i></div>
								<div class="_morder_counter_caption">
									<h5 class="text-light"><span>43</span> M</h5>
									<span class="text-light">Mimo X11 Award</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="_morder_counter">
								<div class="_morder_counter_thumb"><i class="ti-light-bulb"></i></div>
								<div class="_morder_counter_caption">
									<h5 class="text-light"><span>51</span> M</h5>
									<span class="text-light">Australian UGC Award</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="_morder_counter">
								<div class="_morder_counter_thumb"><i class="ti-heart"></i></div>
								<div class="_morder_counter_caption">
									<h5 class="text-light"><span>42</span> M</h5>
									<span class="text-light">IITCA Green Award</span>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ============================ Our Counter End ================================== -->
			
			<!-- ================= Our Team================= -->
			@include('components.layouts.ourTeam')
			<!-- =============================== Our Team ================================== -->
			
			<!-- ============================ Smart Testimonials ================================== -->
			@include('components.layouts.reviews')
			<!-- ============================ Smart Testimonials End ================================== -->
			
			<!-- ============================ article Start ================================== -->
			@include('components.layouts.latestCard')
			<div class="clearfix"></div>
			<!-- ============================ article End ================================== -->
			
			<!-- ============================ Call To Action End ================================== -->
			@include('components.layouts.callUs')
			<!-- ============================ Footer Start ================================== -->
			@include('components.footer.footer')
			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content overli" id="registermodal">
						<div class="modal-body p-0">
							<div class="resp_log_wrap">
								<div class="resp_log_thumb" style="background:url(assets/img/log.jpg)no-repeat;"></div>
								<div class="resp_log_caption">
									<span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
									<div class="edlio_152">
										<ul class="nav nav-pills tabs_system center" id="pills-tab" role="tablist">
										  <li class="nav-item">
											<a class="nav-link active" id="pills-login-tab" data-bs-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
										  </li>
										  <li class="nav-item">
											<a class="nav-link" id="pills-signup-tab" data-bs-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false"><i class="fas fa-user-plus me-2"></i>Register</a>
										  </li>
										</ul>
									</div>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
											<div class="login-form">
												<form>
												
													<div class="form-group">
														<label>User Name</label>
														<div class="input-with-icon">
															<input type="text" class="form-control">
															<i class="ti-user"></i>
														</div>
													</div>
													
													<div class="form-group">
														<label>Password</label>
														<div class="input-with-icon">
															<input type="password" class="form-control">
															<i class="ti-unlock"></i>
														</div>
													</div>
													
													<div class="form-group">
														<div class="eltio_ol9">
															<div class="eltio_k1">
																<input id="dd" class="form-check-input" name="dd" type="checkbox">
																<label for="dd" class="form-check-label">Remember Me</label>
															</div>	
															<div class="eltio_k2">
																<a href="#">Lost Your Password?</a>
															</div>	
														</div>
													</div>
													
													<div class="form-group">
														<button type="submit" class="btn btn-danger fw-medium full-width">Login</button>
													</div>
												
												</form>
											</div>
										</div>
										<div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
											<div class="login-form">
												<form>
												
													<div class="form-group">
														<label>Full Name</label>
														<div class="input-with-icon">
															<input type="text" class="form-control">
															<i class="ti-user"></i>
														</div>
													</div>
													
													<div class="form-group">
														<label>Email ID</label>
														<div class="input-with-icon">
															<input type="email" class="form-control">
															<i class="ti-user"></i>
														</div>
													</div>
													
													<div class="form-group">
														<label>Password</label>
														<div class="input-with-icon">
															<input type="password" class="form-control">
															<i class="ti-unlock"></i>
														</div>
													</div>
													
													<div class="form-group">
														<div class="eltio_ol9">
															<div class="eltio_k1">
																<input id="dds" class="form-check-input" name="dds" type="checkbox">
																<label for="dds" class="form-check-label">By using the website, you accept the terms and conditions</label>
															</div>	
														</div>
													</div>
													
													<div class="form-group">
														<button type="submit" class="btn btn-danger fw-medium full-width">Register</button>
													</div>
												
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ion.rangeSlider.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/slick.js"></script>
		<script src="assets/js/slider-bg.js"></script>
		<script src="assets/js/lightbox.js"></script> 
		<script src="assets/js/imagesloaded.js"></script>
		<script src="assets/js/daterangepicker.js"></script>
		<script src="assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>

<!-- Mirrored from shreethemes.net/rentup-demo/rentup/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:07:12 GMT -->
</html>