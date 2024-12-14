import React from "react";

const SearchGrid = ({ item }) => {
  return (
    <div className="col-lg-6 col-md-6 col-sm-12">
      <div className="property-listing property-2">
        <div className="listing-img-wrapper">
          <div className="_exlio_125">{item.governorate}</div>
          <div className="list-img-slide">
            <div className="click">
              <div>
                <a href="single-property-1.html">
                  <img
                    src={item.image_url || "default-image-url.png"} // Use a default image if image_url is null
                    className="img-fluid mx-auto"
                    alt={item.title}
                  />
                </a>
              </div>
            </div>
          </div>
        </div>

        <div className="listing-detail-wrapper">
          <div className="listing-short-detail-wrap">
            <div className="_card_list_flex mb-2">
              <div className="_card_flex_01"></div>
              <div className="_card_flex_last">
                <h6 className="listing-card-info-price text-seegreen mb-0">
                  ${item.price}
                </h6>
              </div>
            </div>
            <div className="_card_list_flex">
              <div className="_card_flex_01">
                <h4 className="listing-name verified">
                  <a href="single-property-1.html" className="prt-link-detail">
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
              {item.bed} Beds
            </div>
            <div className="listing-card-info-icon">
              <div className="inc-fleat-icon">
                <img src="assets/img/bathtub.svg" width="15" alt="" />
              </div>
              {item.bath} Bath
            </div>
            <div className="listing-card-info-icon">
              <div className="inc-fleat-icon">
                <img src="assets/img/move.svg" width="15" alt="" />
              </div>
              {item.sqft} sqft
            </div>
          </div>
        </div>

        <div className="listing-detail-footer">
          <div className="footer-first">
            <div className="foot-location">
              <img src="assets/img/pin.svg" width="18" alt="" />
              {item.location}
            </div>
          </div>
          <div className="footer-flex">
            <ul className="selio_style">
              <li>
                <div className="prt_saveed_12lk">
                  <label
                    className="toggler toggler-danger"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="Save property"
                  >
                    <input type="checkbox" />
                    <i className="fa-solid fa-heart">{item.id}</i>
                  </label>
                </div>
              </li>
              <li>
                <div className="prt_saveed_12lk">
                  <a
                    href={`single-property-${item.id}.html`} // Assuming the detail page URL follows this pattern
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="View Property"
                  >
                    <i className="fa-regular fa-circle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SearchGrid;
