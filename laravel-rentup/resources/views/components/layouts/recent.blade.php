<section>
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-10 text-center">
							<div class="sec-heading center mb-4">
								<h2>Recent Listed Property</h2>
								<p>Discover properties that have just entered the market, offering fresh opportunities for those seeking new homes or investments.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center g-4">
					@if($items->isNotEmpty())
    @foreach ($items as $item)
        <!-- Single Property -->
        @include('components.cards.landing_recent', ['item' => $item])
        <!-- End Single Property -->
    @endforeach
@else
<div class="sec-heading center">
								<h4>No recent listings found.</h4>
								
							</div>
@endif
						
						
					</div>
					
					
					
				</div>
			</section>