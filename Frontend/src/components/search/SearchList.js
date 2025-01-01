import React from "react";
import { Link } from "react-router-dom";
const SearchList = ({ item }) => {
  const shortDescription =
    item.description.length > 30
      ? `${item.description.substring(0, 30)}...`
      : item.description;

  const averageRating =
    item.average_rating !== null
      ? parseFloat(item.average_rating).toFixed(1)
      : "0";

  const fullStars = Math.floor(averageRating);
  const stars = Array.from({ length: 5 }, (_, index) => (
    <i
      className="fa fa-star"
      key={index}
      style={{ color: index < fullStars ? "" : "grey" }}
    ></i>
  ));

  return (
    <div className="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div className="property-listing list_view">
        <div className="listing-img-wrapper">
          <div className="_exlio_125">{item.governorate}</div>
          <div className="list-img-slide">
            <div className="click">
              <div>
                <Link to={`/property?id=${item.id}`}>
                  <img
                    src={
                      item.image_url ||
                      "/assets/default_images/default_image.png"
                    }
                    className="img-fluid mx-auto"
                    alt={item.title}
                  />
                </Link>
              </div>
            </div>
          </div>
        </div>

        <div className="list_view_flex">
          <div className="listing-detail-wrapper mt-1">
            <div className="listing-short-detail-wrap">
              <div className="_card_list_flex mb-2">
                <div className="_card_flex_01">
                  <h4 className="listing-name verified">
                    <Link
                      to={`/property?id=${item.id}`}
                      className="prt-link-detail"
                    >
                      {item.title}
                    </Link>
                  </h4>
                  <p className="listing-description">{shortDescription}</p>
                </div>
                <div className="_card_flex_last">
                  <h6 className="listing-card-info-price text-seegreen mb-0">
                    ${item.price}
                  </h6>
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
              <div className="foot-rates">
                <span className="elio_rate good">{averageRating}</span>
                <div className="_rate_stio">{stars}</div>
              </div>
            </div>
            <div className="footer-flex">
              <Link
                to={`/property?id=${item.id}`}
                className="prt-view bg-danger"
              >
                View Detail
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SearchList;
