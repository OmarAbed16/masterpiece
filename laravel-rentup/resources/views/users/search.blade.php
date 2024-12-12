<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from shreethemes.net/rentup-demo/rentup/grid-layout-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:06:53 GMT -->
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
			
			<!-- ============================ All Property ================================== -->
			<section class="gray pt-4">
			
				<div class="container">
					
					<div class="row m-0">
						<div class="short_wraping">
							<div class="row align-items-center">
							
								<div class="col-lg-3 col-md-6 col-sm-12  col-sm-6">
									<ul class="shorting_grid">
										<li class="list-inline-item"><a href="grid-layout-with-sidebar.html" class="active"><span class="ti-layout-grid2"></span>Grid</a></li>
										<li class="list-inline-item"><a href="list-layout-with-sidebar.html"><span class="ti-view-list"></span>List</a></li>
										</ul>
								</div>
						
								<div class="col-lg-6 col-md-12 col-sm-12 order-lg-2 order-md-3 elco_bor col-sm-12">
									<div class="shorting_pagination">
										<div class="shorting_pagination_laft">
											<h5>Showing 1-25 of 72 results</h5>
										</div>
										<div class="shorting_pagination_right">
											<ul>
												<li><a href="javascript:void(0);" class="active">1</a></li>
												<li><a href="javascript:void(0);">2</a></li>
												<li><a href="javascript:void(0);">3</a></li>
												<li><a href="javascript:void(0);">4</a></li>
												<li><a href="javascript:void(0);">5</a></li>
												<li><a href="javascript:void(0);">6</a></li>
											</ul>
										</div>
									</div>
								</div>
						
								<div class="col-lg-3 col-md-6 col-sm-12 order-lg-3 order-md-2 col-sm-6">
									<div class="shorting-right">
										<label>Short By:</label>
										<div class="dropdown show">
											<a class="btn btn-filter dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="selection">Most Rated</span>
											</a>
											<div class="drp-select dropdown-menu">
												<a class="dropdown-item" href="JavaScript:Void(0);">Most Rated</a>
												<a class="dropdown-item" href="JavaScript:Void(0);">Most Viewd</a>
												<a class="dropdown-item" href="JavaScript:Void(0);">News Listings</a>
												<a class="dropdown-item" href="JavaScript:Void(0);">High Rated</a>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<!-- property Sidebar -->
						@include('components.layouts.sidebar')
						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="row justify-content-center g-4">
							
							@if($recentListings->isNotEmpty())
    @foreach ($recentListings as $items)
        	<!-- Single Property -->
			@include('components.cards.search_grid', ['item' => $items])
								<!-- End Single Property -->

    @endforeach
@else
<div class="sec-heading center">
								<h4>No recent listings found.</h4>
								
							</div>
@endif
							

								
							</div>	
						</div>
						
						
					</div>
				</div>	
			</section>
			<!-- ============================ All Property ================================== -->
			
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

<!-- Mirrored from shreethemes.net/rentup-demo/rentup/grid-layout-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:06:53 GMT -->
</html>