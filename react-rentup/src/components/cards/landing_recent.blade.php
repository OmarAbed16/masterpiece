<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="property-listing property-2 h-100">
        
        <div class="listing-img-wrapper">
            <div class="_exlio_125">For Sale</div>
            <div class="list-img-slide">
                <div class="click">
                    <div><a href="single-property-1.html"><img src="<?php echo $item->image_url; ?>" class="img-fluid mx-auto" alt="" /></a></div>
                </div>
            </div>
        </div>
        
        <div class="listing-detail-wrapper">
            <div class="listing-short-detail-wrap">
                <div class="_card_list_flex mb-2">
                    <div class="_card_flex_01">
                        <!-- Optionally, you can add content here -->
                    </div>
                    <div class="_card_flex_last">
                        <div class="prt_saveed_12lk">
                            <label class="toggler toggler-danger"><input type="checkbox"><i class="ti-heart"></i></label>
                        </div>
                    </div>
                </div>
                <div class="_card_list_flex">
                    <div class="_card_flex_01">
                        <h4 class="listing-name verified"><a href="single-property-1.html" class="prt-link-detail"><?php echo $item->title; ?></a></h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="price-features-wrapper">
            <div class="list-fx-features">
                <div class="listing-card-info-icon">
                    <div class="inc-fleat-icon"><img src="assets/img/bed.svg" width="15" alt="" /></div><?php echo $item->bed." Beds"; ?>
                </div>
                <div class="listing-card-info-icon">
                    <div class="inc-fleat-icon"><img src="assets/img/bathtub.svg" width="15" alt="" /></div><?php echo $item->bath." Bath"; ?>
                </div>
                <div class="listing-card-info-icon">
                    <div class="inc-fleat-icon"><img src="assets/img/move.svg" width="15" alt="" /></div><?php echo $item->sqft." sqft"; ?>
                </div>
            </div>
        </div>
        
        <div class="listing-detail-footer">
            <div class="footer-first">
                <h6 class="listing-card-info-price mb-0 p-0"><?php echo "$".$item->price; ?></h6>
            </div>
            <div class="footer-flex">
                <a href="property-detail.html" class="prt-view">View Detail</a>
            </div>
        </div>
        
    </div>
</div>
