<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from shreethemes.net/rentup-demo/rentup/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:07:13 GMT -->
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
			<div class="page-title" style="background:#f4f4f4 url(assets/img/slider-3.jpg);" data-overlay="5">
				<div class="ht-80"></div>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 position-relative z-1">
							<div class="_page_tetio">
								<div class="pledtio_wrap"><span>Get In Touch</span></div>
								<h2 class="text-light mb-0">Get Helps & Friendly Support</h2>
								<p>Looking for help or any support? We's available 24 hour a day.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="ht-120"></div>
			</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Agency List Start ================================== -->
			<section class="pt-0">
				<div class="container">
					<div class="row align-items-center pretio_top">
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-shopping-cart text-danger"></i>
								<h4>Contact Sales</h4>
								<p>omarFathiAbed@gmail.com</p>
								<span>+962 781616916</span>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-user text-danger"></i>
								<h4>Contact Sales</h4>
								<p>omarFathiAbed@gmail.com</p>
								<span>+962 781616916</span>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-comment-alt text-danger"></i>
								<p>omarFathiAbed@gmail.com</p>
								<span>+962 781616916</span>
								<span class="live-chat">Live Chat</span>
							</div>
						</div>
						
					</div>
					
					<!-- row Start -->
					<div class="row">
						<div class="col-lg-8 col-md-7">
							<div class="property_block_wrap">
								
								<div class="property_block_wrap_header">
									<h4 class="property_block_title">Fillup The Form</h4>
								</div>
								
								<div class="block-body">
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Name</label>
												<input type="text" class="form-control simple">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control simple">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label>Subject</label>
										<input type="text" class="form-control simple">
									</div>
									
									<div class="form-group">
										<label>Message</label>
										<textarea class="form-control simple"></textarea>
									</div>
									
									<div class="form-group">
										<button class="btn btn-danger" type="submit">Submit Request</button>
									</div>
								</div>
								
							</div>
											
						</div>
						
						<div class="col-lg-4 col-md-5">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13538.629293053125!2d35.89952861721893!3d31.970191989060613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca1dd7bca79dd%3A0x9b0416f056ff0786!2sOrange%20Digital%20Village!5e0!3m2!1sen!2sjo!4v1733421971649!5m2!1sen!2sjo" width="100%" height="470" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
						
					</div>
					<!-- /row -->		
				</div>	
			</section>
			<!-- ============================ Agency List End ================================== -->
			
			<!-- ============================ Our Partner Start ================================== -->
			@include('components.layouts.partners')
			<!-- ============================ Our Partner End ================================== -->
			<!-- ============================ article Start ================================== -->
			@include('components.layouts.latestCard')
			
			<div class="clearfix"></div>
			<!-- ============================ article End ================================== -->
			
			<!-- ============================ Call To Action ================================== -->
			@include('components.layouts.callUs')
			<!-- ============================ Call To Action End ================================== -->
			
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

<!-- Mirrored from shreethemes.net/rentup-demo/rentup/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:07:13 GMT -->
</html>