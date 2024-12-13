import React from "react";

const LandingRecent = ({ item }) => {
  return (
    <div className="col-lg-4 col-md-6 col-sm-12">
      <div className="property-listing property-2 h-100">
        <div className="listing-img-wrapper">
          <div className="_exlio_125">For Sale</div>
          <div className="list-img-slide">
            <div className="click">
              <div>
                <a href="single-property-1.html">
                  <img
                    src={item.image_url}
                    className="img-fluid mx-auto"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
        </div>

        <div className="listing-detail-wrapper">
          <div className="listing-short-detail-wrap">
            <div className="_card_list_flex mb-2">
              <div className="_card_flex_01">
                {/* Optionally, you can add content here */}
              </div>
              <div className="_card_flex_last">
                <div className="prt_saveed_12lk">
                  <label className="toggler toggler-danger">
                    <input type="checkbox" />
                    <i className="ti-heart"></i>
                  </label>
                </div>
              </div>
            </div>
            <div className="_card_list_flex">
              <div className="_card_flex_01">
                <h4 className="listing-name verified">
                  <a
                    href="single-property-1.html"
                    className="prt-link-detail"
                  >
                    {item.title}
                  </a>
                </h4>
              </div>
            </div>
          </div>
        </div>

        <div className="price-features-wrapper">
          <div className="list-fx-features">
            <div className="listing-card-info-icon">
              <div className="inc-fleat-icon">
                <img src="assets/img/bed.svg" width="15" alt="" />
              </div>
              {`${item.bed} Beds`}
            </div>
            <div className="listing-card-info-icon">
              <div className="inc-fleat-icon">
                <img src="assets/img/bathtub.svg" width="15" alt="" />
              </div>
              {`${item.bath} Bath`}
            </div>
            <div className="listing-card-info-icon">
              <div className="inc-fleat-icon">
                <img src="assets/img/move.svg" width="15" alt="" />
              </div>
              {`${item.sqft} sqft`}
            </div>
          </div>
        </div>

        <div className="listing-detail-footer">
          <div className="footer-first">
            <h6 className="listing-card-info-price mb-0 p-0">
              {`$${item.price}`}
            </h6>
          </div>
          <div className="footer-flex">
            <a href="property-detail.html" className="prt-view">
              View Detail
            </a>
          </div>
        </div>
      </div>
    </div>
  );
};

export default LandingRecent;
