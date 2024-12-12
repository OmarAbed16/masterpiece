<!-- Single Team -->
<div class="single-team">
									<div class="team-grid">
								
										<div class="teamgrid-user">
											<img src="<?= $items1->profile_image?>" alt="" class="img-fluid" />
										</div>
									
										<div class="teamgrid-content">
											<h4><?= $items1->name?></h4>
											
										</div>
										
										<div class="teamgrid-social">
										<ul>
    <!-- Phone Link -->
    <li>
        <a href="tel:<?= htmlspecialchars($items1->phone_number) ?>" 
           class="f-cl" 
           aria-label="Call <?= htmlspecialchars($items1->phone_number) ?>">
            <i class="fas fa-phone"></i>
        </a>
    </li>
    
    <!-- Email Link -->
    <li>
        <a href="mailto:<?= htmlspecialchars($items1->email) ?>" 
           class="t-cl" 
           aria-label="Email <?= htmlspecialchars($items1->email) ?>">
            <i class="fas fa-envelope"></i>
        </a>
    </li>
</ul>

										</div>
							
									</div>
								</div>
								