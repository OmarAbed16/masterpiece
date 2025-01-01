<section class="gray-simple">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Good Reviews By Clients</h2>
								<p>Our clients’ success is our greatest achievement. Each review reflects our dedication to excellence, innovation, and trust.</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="item-slide space">
								
							@if($reviews->isNotEmpty())
							
							@foreach ($reviews as $review)
							<!-- Single Item -->
							@include('components.cards.landing_review', ['$review' => $reviews])
								
										   
								<!-- End Single Property -->
							@endforeach
					
						
						@endif
								
							</div>
						</div>
					</div>
					@if($reviews->isEmpty())
					<div class="sec-heading center">
								<h4>There is no reviews to show.</h4>
								
							</div>
					@endif	
				</div>
			</section>