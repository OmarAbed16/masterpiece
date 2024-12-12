<section>
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Meet Our Team</h2>
								<p>Professional & Dedicated Team</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
						
							<div class="team-slide item-slide">
						
								@if($items1->isNotEmpty())
							
    @foreach ($items1 as $item1)
        <!-- Single Property -->
		@include('components.cards.landing_ourTeam', ['items1' => $item1])
       			
        <!-- End Single Property -->
    @endforeach

@endif
							</div>
						
						</div>
					</div>
					@if($items1->isEmpty())
					<div class="sec-heading center">
								<h4>There is no data to show.</h4>
								
							</div>
					@endif		
	

				</div>
			</section>