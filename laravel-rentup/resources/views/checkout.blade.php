<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from shreethemes.net/rentup-demo/rentup/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:07:13 GMT -->
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
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
								<h2 class="breadcrumb-title">Checkout - Checkout</h2>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Our Story Start ================================== -->
			<section class="gray-simple">
			
				<div class="container">
				
					<!-- row Start -->
					<div class="row m-0">
						<div class="submit-page mb-4">
							<div class="col-lg-12 col-md-12">
								<div class="alert alert-success text-center mb-0" role="alert">
									Hi Dear, Have you already an account? <a href="#" data-bs-toggle="collapse" data-bs-target="#login-frm">Please Login</a>
								</div>
							</div>
						
							<div class="col-lg-12 col-md-12">	
								<div id="login-frm" class="collapse mt-3">
									<div class="row">
										
										<div class="col-lg-5 col-md-4 col-sm-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Username">
													<i class="ti-search"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-5 col-md-4 col-sm-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="*******">
													<i class="ti-lock"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-2 col-md-4 col-sm-12">
											<div class="form-group">
												<button type="submit" class="btn btn-danger full-width">Submit</button>
											</div>
										</div>
										
										<div class="col-lg-3 col-md-4 col-sm-6">
											<input id="a-1" class="form-check-input" name="a-1" type="checkbox">
											<label for="a-1" class="form-check-label">Remember Me</label>
										</div>
										
										<div class="col-lg-3 col-md-4 col-sm-6 mt-2">
											<a href="#" class="theme-cl">Forget Password?</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->

					<!-- row Start -->
					<div class="row frm_submit_block">
						<div class="col-lg-8 col-md-8 col-sm-12">
							<div class="submit-page mb-4">
								<!-- row -->
								<div class="row">
									
									<div class="col-lg-12 col-md-12 col-sm-12">
										<h3 class="ms-0">Billing Detail</h3>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Name<i class="req">*</i></label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Email<i class="req">*</i></label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Company Name</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Country<i class="req">*</i></label>
											<select id="country" class="form-control">
												<option value="">&nbsp;</option>
												<option value="1">United State</option>
												<option value="2">United kingdom</option>
												<option value="3">India</option>
												<option value="4">Canada</option>
											</select>
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Street<i class="req">*</i></label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Apartment</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Town/City<i class="req">*</i></label>
											<select id="town" class="form-control">
												<option value="">&nbsp;</option>
												<option value="1">Punjab</option>
												<option value="2">Chandigarh</option>
												<option value="3">Allahabad</option>
												<option value="4">Lucknow</option>
											</select>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>State<i class="req">*</i></label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Postcode/Zip<i class="req">*</i></label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Phone<i class="req">*</i></label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Landline</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Additional Information</label>
											<textarea class="form-control ht-50"></textarea>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<input id="a-2" class="form-check-input" name="a-2" type="checkbox">
											<label for="a-2" class="form-check-label">Create An Account</label>
										</div>
									</div>
									
								</div>
								<!--/row -->
							</div>
							
							<div class="panel-group pay_opy980" id="payaccordion">
									
								<!-- Pay By Paypal -->
								<div class="panel panel-default">
									<div class="panel-heading" id="pay">
										<h4 class="panel-title">
											<a data-bs-toggle="collapse" role="button" data-parent="#payaccordion" href="#payPal" aria-expanded="true"  aria-controls="payPal" class="">PayPal</a>
										</h4>
									</div>
									<div id="payPal" class="panel-collapse collapse show" aria-labelledby="pay" data-parent="#payaccordion">
										<div class="panel-body">
											<form>
												<div class="form-group">
													<label>PayPal Email</label>
													<input type="text" class="form-control simple" placeholder="paypal@gmail.com">
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-danger full-width">Pay 400.00 USD</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								
								<!-- Pay By Strip -->
								<div class="panel panel-default">
									<div class="panel-heading" id="stripes">
										<h4 class="panel-title">
											<a data-bs-toggle="collapse" role="button" data-parent="#payaccordion" href="#stripePay" aria-expanded="false"  aria-controls="stripePay" class="">Stripe</a>
										</h4>
									</div>
									<div id="stripePay" class="collapse" aria-labelledby="stripes" data-parent="#payaccordion">
										<div class="panel-body">
											<form>
										
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<label>Card Holder Name</label>
															<input type="text" class="form-control">
														</div>
													</div>
													
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<label>Card Number</label>
															<input type="text" class="form-control">
														</div>
													</div>									
												
													<div class="col-lg-5 col-md-5 col-sm-6">
														<div class="form-group">
															<label>Expire Month</label>
															<input type="text" class="form-control">
														</div>
													</div>
													
													<div class="col-lg-5 col-md-5 col-sm-6">
														<div class="form-group">
															<label>Expire Year</label>
															<input type="text" class="form-control">
														</div>
													</div>
													
													<div class="col-lg-2 col-md-2 col-sm-12">
														<div class="form-group">
															<label>CVC</label>
															<input type="text" class="form-control">
														</div>
													</div>										
													
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<input id="a-2" class="form-check-input" name="a-2" type="checkbox">
															<label for="a-2" class="form-check-label">By Continuing, you ar'e agree to conditions</label>
														</div>
													</div>
													
													<div class="col-lg-12 col-md-12 col-sm-12">
														<div class="form-group text-center">
															<a href="#" class="btn btn-danger full-width">Pay 202.00 USD</a>
														</div>
													</div>
													
												</div>
											
											</form>
										</div>
									</div>
								</div>
								
								<!-- Pay By Debit or credtit -->
								<div class="panel panel-default mb-md-0 mb-4">
									<div class="panel-heading" id="dabit">
										<h4 class="panel-title">
											<a data-bs-toggle="collapse"  role="button" href="#payaccordion" data-bs-target="#debitPay" aria-expanded="flase"  aria-controls="debitPay" class="">Debit Or Credit</a>
										</h4>
									</div>
									<div id="debitPay" class="panel-collapse collapse" aria-labelledby="dabit" data-parent="#payaccordion">
									<div class="panel-body">
										<form>
										
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<label>Card Holder Name</label>
															<input type="text" class="form-control">
														</div>
													</div>
													
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<label>Card Number</label>
															<input type="text" class="form-control">
														</div>
													</div>									
												
													<div class="col-lg-5 col-md-5 col-sm-6">
														<div class="form-group">
															<label>Expire Month</label>
															<input type="text" class="form-control">
														</div>
													</div>
													
													<div class="col-lg-5 col-md-5 col-sm-6">
														<div class="form-group">
															<label>Expire Year</label>
															<input type="text" class="form-control">
														</div>
													</div>
													
													<div class="col-lg-2 col-md-2 col-sm-12">
														<div class="form-group">
															<label>CVC</label>
															<input type="text" class="form-control">
														</div>
													</div>										
													
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<input id="a-2" class="form-check-input" name="a-2" type="checkbox">
															<label for="a-2" class="form-check-label">By Continuing, you ar'e agree to conditions</label>
														</div>
													</div>
													
													<div class="col-lg-12 col-md-12 col-sm-12">
														<div class="form-group text-center">
															<a href="#" class="btn btn-danger full-width">Pay 202.00 USD</a>
														</div>
													</div>
													
												</div>
											
											</form>
									</div>
								  </div>
								</div>
								
							</div>
								
						</div>
						
						<!-- Col-lg 4 -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h3>Your Order</h3>
							</div>
							
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="pro_product_wrap bg-white shadow-0">
									<h5>Platinum</h5>
									<ul>
										<li><strong>Total</strong>$319</li>
										<li><strong>Subtotal</strong>$319</li>
										<li><strong>Tax</strong>$10</li>
										<li><strong>Total</strong>$329</li>
									</ul>
								</div>
							</div>
							
						</div>
						<!-- /col-lg-4 -->
					</div>
					<!-- /row -->					
					
				</div>
						
			</section>
			<!-- ============================ Our Story End ================================== -->
			
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

<!-- Mirrored from shreethemes.net/rentup-demo/rentup/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 06:07:13 GMT -->
</html>