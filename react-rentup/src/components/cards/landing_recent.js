import React, { useState } from "react";
import Swal from "sweetalert2";
import { Link } from "react-router-dom";
const LandingRecent = ({ item, onFavoriteCountChange }) => {
  const [isFavorite, setIsFavorite] = useState(item.is_favorite);
  const user = JSON.parse(sessionStorage.getItem("user")); // Retrieve the user object
  const userId = user ? user.id : 0; // Get the user ID or set default to 0

  const handleFavoriteToggle = () => {
    const state = isFavorite ? "delete" : "create";

    if (isFavorite) {
      // Show confirmation dialog when removing a favorite
      Swal.fire({
        title: "Are you sure?",
        text: "You want to remove this property from your favorites?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, remove it!",
        cancelButtonText: "No, cancel!",
      }).then((result) => {
        if (result.isConfirmed) {
          updateFavoriteState(state);
        }
      });
    } else {
      updateFavoriteState(state);
    }
  };

  const updateFavoriteState = (state) => {
    fetch(
      `${process.env.REACT_APP_API_URL}/search/setFavourite?user_id=${userId}&favourite_id=${item.id}&listing_id=${item.id}&state=${state}`,
      {
        method: "GET",
      }
    )
      .then((response) => response.json())
      .then((data) => {
        if (data.message === "Favorite status updated successfully") {
          setIsFavorite(!isFavorite);
          if (onFavoriteCountChange) {
            onFavoriteCountChange(data.favorite_count);
          }
        } else {
          Swal.fire(
            "Error!",
            "Please Login to can add to favourite list!",
            "error"
          );
        }
      })
      .catch(() => {
        Swal.fire("Error!", "Please login first to add to favorites.", "error");
      });
  };

  return (
    <div className="col-lg-4 col-md-6 col-sm-12">
      <div className="property-listing property-2 h-100">
        <div className="listing-img-wrapper">
          <div className="_exlio_125">{item.governorate}</div>
          <div className="list-img-slide">
            <div className="click">
              <div>
                <Link to={`/property?id=${item.id}`}>
                  <img
                    src={item.image_url || "default-image-url.png"}
                    className="img-fluid mx-auto"
                    alt={item.title}
                  />
                </Link>
              </div>
            </div>
          </div>
        </div>

        <div className="listing-detail-wrapper">
          <div className="listing-short-detail-wrap">
            <div className="_card_list_flex mb-2">
              <div className="_card_flex_last">
                <div className="prt_saveed_12lk">
                  <label className="toggler toggler-danger">
                    <input
                      type="checkbox"
                      checked={isFavorite}
                      onChange={handleFavoriteToggle}
                    />
                    <i
                      className="fa-solid fa-heart"
                      style={{
                        color: isFavorite ? "#ff5722" : "inherit",
                      }}
                    ></i>
                  </label>
                </div>
              </div>
            </div>
            <div className="_card_list_flex">
              <div className="_card_flex_01">
                <h4 className="listing-name verified">
                  <Link
                    to={`/property?id=${item.id}`}
                    className="prt-link-detail"
                  >
                    {item.title}
                  </Link>
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
            <Link to={`/property?id=${item.id}`} className="prt-view">
              View Detail
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
};

export default LandingRecent;
