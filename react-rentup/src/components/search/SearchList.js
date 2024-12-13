// SearchList.js
import React from "react";

const SearchList = () => {
  return (
    <div className="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div className="property-listing list_view">
        <div className="listing-img-wrapper">
          <div className="_exlio_125">For Sale</div>
          <div className="list-img-slide">
            <div className="click">
              <div>
                <a href="single-property-1.html">
                  <img
                    src="assets/img/p-1.png"
                    className="img-fluid mx-auto"
                    alt=""
                  />
                </a>
              </div>
              <div>
                <a href="single-property-1.html">
                  <img
                    src="assets/img/p-2.png"
                    className="img-fluid mx-auto"
                    alt=""
                  />
                </a>
              </div>
              <div>
                <a href="single-property-1.html">
                  <img
                    src="assets/img/p-3.png"
                    className="img-fluid mx-auto"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
        </div>

        <div className="list_view_flex">
          <div className="listing-detail-wrapper mt-1">
            <div className="listing-short-detail-wrap">
              <div className="_card_list_flex mb-2">
                <div className="_card_flex_01">
                  <span className="_list_blickes _netork">6 Network</span>
                  <span className="_list_blickes types">Family</span>
                </div>
                <div className="_card_flex_last">
                  <h6 className="listing-card-info-price text-seegreen mb-0">
                    $7,000
                  </h6>
                </div>
              </div>
              <div className="_card_list_flex">
                <div className="_card_flex_01">
                  <h4 className="listing-name verified">
                    <a
                      href="single-property-1.html"
                      className="prt-link-detail"
                    >
                      5689 Resot Relly Market, Montreal Canada, HAQC445
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
                3 Beds
              </div>
              <div className="listing-card-info-icon">
                <div className="inc-fleat-icon">
                  <img src="assets/img/bathtub.svg" width="15" alt="" />
                </div>
                1 Bath
              </div>
              <div className="listing-card-info-icon">
                <div className="inc-fleat-icon">
                  <img src="assets/img/move.svg" width="15" alt="" />
                </div>
                800 sqft
              </div>
            </div>
          </div>

          <div className="listing-detail-footer">
            <div className="footer-first">
              <div className="foot-rates">
                <span className="elio_rate good">4.2</span>
                <div className="_rate_stio">
                  <i className="fa fa-star"></i>
                  <i className="fa fa-star"></i>
                  <i className="fa fa-star"></i>
                  <i className="fa fa-star"></i>
                  <i className="fa fa-star"></i>
                </div>
              </div>
            </div>
            <div className="footer-flex">
              <a href="property-detail.html" className="prt-view bg-danger">
                View Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SearchList;
