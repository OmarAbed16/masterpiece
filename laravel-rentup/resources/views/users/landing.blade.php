<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from shreethemes.net/rentup-demo/rentup/home-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:06:29 GMT -->
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
			
			
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="hero-banner vedio-banner">
				<div class="overlay"></div>	

				<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
					<source src="assets/img/banners.mp4" type="video/mp4">
				</video>
				
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<h1 class="big-header-capt mb-0 text-light">Search Your Next Home</h1>
							<p class="text-center mb-4 text-light">Find new & featured property located in your local city.</p>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="simple_tab_search center">
								
								
								<div class="tab-content" id="myTabContent">
									
									
									<!-- Tab for Rent -->
									<div class="tab-pane fade show active" id="rent" role="tabpanel" aria-labelledby="rent-tab">
										<div class="full_search_box nexio_search lightanic_search hero_search-radius modern">
											<div class="search_hero_wrapping">
										
												<div class="row">
												
													<div class="col-lg-8 col-sm-12 d-md-none d-lg-block">
														<div class="form-group">
															<label>Price Range</label>
															<input type="text" class="form-control search_input border-0" placeholder="ex. Neighborhood" />
														</div>
													</div>
													
													
													
													<div class="col-lg-2 col-md-3 col-sm-12">
														<div class="form-group none">
															<a class="collapsed ad-search" data-bs-toggle="collapse" data-parent="#search" data-bs-target="#advance-search-2" href="javascript:void(0);" aria-expanded="false" aria-controls="advance-search"><i class="fa fa-sliders-h me-2"></i>Advance Filter</a>
														</div>
													</div>
													
													<div class="col-lg-2 col-md-3 col-sm-12 small-padd">
														<div class="form-group none">
															<a href="#" class="btn btn-danger full-width">Search Property</a>
														</div>
													</div>
												</div>
												
												<!-- Collapse Advance Search Form -->
												<div class="collapse" id="advance-search-2" aria-expanded="false" role="banner">
													
													<!-- row -->
													<div class="row">
													
														<div class="col-lg-3 col-md-6 col-sm-6">
															<div class="form-group none style-auto">
																<select id="bedrooms2" class="form-control">
																	<option value="">&nbsp;</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																</select>
															</div>
														</div>
														
														<div class="col-lg-3 col-md-6 col-sm-6">
															<div class="form-group none style-auto">
																<select id="bathrooms2" class="form-control">
																	<option value="">&nbsp;</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																</select>
															</div>
														</div>
														
														<div class="col-lg-3 col-md-6 col-sm-6">
															<div class="form-group none">
																<input type="text" class="form-control" placeholder="min sqft" />
															</div>
														</div>
														
														<div class="col-lg-3 col-md-6 col-sm-6">
															<div class="form-group none">
																<input type="text" class="form-control" placeholder="max sqft" />
															</div>
														</div>
														
													</div>
													<!-- /row -->
													
													<!-- row -->
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
															<h6>Advance Price</h6>
															<div class="rg-slider">
																 <input type="text" class="js-range-slider" name="my_range" value="" />
															</div>
														</div>
													</div>
													<!-- /row -->
													
													<!-- row -->
													<div class="row">
													
														<div class="col-lg-12 col-md-12 col-sm-12 mt-3">
															<h4 class="text-dark">Amenities & Features</h4>
															<ul class="no-ul-list third-row">
																<li>
																	<input id="a-a1" class="form-check-input" name="a-a1" type="checkbox">
																	<label for="a-a1" class="form-check-label">Air Condition</label>
																</li>
																<li>
																	<input id="a-b2" class="form-check-input" name="a-b2" type="checkbox">
																	<label for="a-b2" class="form-check-label">Bedding</label>
																</li>
																<li>
																	<input id="a-c3" class="form-check-input" name="a-c3" type="checkbox">
																	<label for="a-c3" class="form-check-label">Heating</label>
																</li>
																<li>
																	<input id="a-d4" class="form-check-input" name="a-d4" type="checkbox">
																	<label for="a-d4" class="form-check-label">Internet</label>
																</li>
																<li>
																	<input id="a-e5" class="form-check-input" name="a-e5" type="checkbox">
																	<label for="a-e5" class="form-check-label">Microwave</label>
																</li>
																<li>
																	<input id="a-f6" class="form-check-input" name="a-f6" type="checkbox">
																	<label for="a-f6" class="form-check-label">Smoking Allow</label>
																</li>
																<li>
																	<input id="a-g7" class="form-check-input" name="a-g7" type="checkbox">
																	<label for="a-g7" class="form-check-label">Terrace</label>
																</li>
																<li>
																	<input id="a-h8" class="form-check-input" name="a-h8" type="checkbox">
																	<label for="a-h8" class="form-check-label">Balcony</label>
																</li>
																<li>
																	<input id="a-i9" class="form-check-input" name="a-i9" type="checkbox">
																	<label for="a-i9" class="form-check-label">Icon</label>
																</li>
																<li>
																	<input id="a-j10" class="form-check-input" name="a-j10" type="checkbox">
																	<label for="a-j10" class="form-check-label">Wi-Fi</label>
																</li>
																<li>
																	<input id="a-k11" class="form-check-input" name="a-k11" type="checkbox">
																	<label for="a-k11" class="form-check-label">Beach</label>
																</li>
																<li>
																	<input id="a-l12" class="form-check-input" name="a-l12" type="checkbox">
																	<label for="a-l12" class="form-check-label">Parking</label>
																</li>
															</ul>
														</div>
														
													</div>
													<!-- /row -->
													
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
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ============================ Latest Property For Sale Start ================================== -->
			@include('components.layouts.recent', ['items' => $recentListings])
			<!-- ============================ Latest Property For Sale End ================================== -->
			
			<!-- ============================ Top Team ================================== -->
			@include('components.layouts.ourTeam', ['items1' => $useritems])
			<!-- ============================ Top Team End ================================== -->
			
			<!-- ============================ Property Location ================================== -->
			@include('components.layouts.exploreByLocation')
			<!-- ============================ Property Location End ================================== -->
			
			<!-- ============================ Smart Testimonials ================================== -->
			@include('components.layouts.reviews', ['reviews' => $recentReviews])
			<!-- ============================ Smart Testimonials End ================================== -->
			
			<!-- ============================ Our Partner Start ================================== -->
			<section class="bg-cover p-0" style="background:url(assets/img/immio.jpg)no-repeat;" data-overlay="3">
				<div class="ht-100"></div>
			</section>
			
			<!-- ============================ Our Partner End ================================== -->
			
			<!-- ============================ Price Table Start ================================== -->
			
			<!-- ============================ Price Table End ================================== -->						
			
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
								<div class="resp_log_thumb" style="background:url(assets/img/slider-3.jpg)no-repeat;"></div>
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
														<label>Email</label>
														<div class="input-with-icon">
															<input type="text" class="form-control" placeholder="Enter your Email">
															<i class="ti-user"></i>
														</div>
													</div>
													
													<div class="form-group">
														<label>Password</label>
														<div class="input-with-icon">
															<input type="password" class="form-control" placeholder="Enter your Password">
															<i class="ti-unlock"></i>
														</div>
													</div>
													
													<div class="form-group">
														<div class="eltio_ol9">
															<div class="eltio_k1 form-check">
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
															<input type="text" class="form-control" placeholder="Enter your Name">
															<i class="ti-user"></i>
														</div>
													</div>
													
													<div class="form-group">
														<label>Email ID</label>
														<div class="input-with-icon">
															<input type="email" class="form-control" placeholder="Enter your Email">
															<i class="ti-user"></i>
														</div>
													</div>
													
													<div class="form-group">
														<label>Password</label>
														<div class="input-with-icon">
															<input type="password" class="form-control" placeholder="Enter your Password">
															<i class="ti-unlock"></i>
														</div>
													</div>


													<div class="form-group">
														<label>Confirm Password</label>
														<div class="input-with-icon">
															<input type="password" class="form-control" placeholder="Confirm your Password">
															<i class="ti-unlock"></i>
														</div>
													</div>
													
													<div class="form-group">
														<div class="eltio_ol9">
															<div class="eltio_k1 form-check">
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
			
			<!-- Send Message -->
			<div class="modal fade" id="autho-message" tabindex="-1" role="dialog" aria-labelledby="authomessage" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="authomessage">
						<span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Drop Message</h4>
							<div class="login-form">
								<form>
								
									<div class="form-group mb-3">
										<label>Subject</label>
										<div class="input-with-icons">
											<input type="text" class="form-control" placeholder="Message Title">
										</div>
									</div>
									
									<div class="form-group mb-3">
										<label>Messages</label>
										<div class="input-with-icons">
											<textarea class="form-control ht-80"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn full-width fw-medium btn-danger">Send Message</button>
									</div>
								
								</form>
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

<!-- Mirrored from shreethemes.net/rentup-demo/rentup/home-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:06:36 GMT -->
</html>