import React, { useState } from "react";
import Swal from "sweetalert2";
import { Link } from "react-router-dom";
const SearchGrid = ({
  item,
  onFavoriteCountChange,
  responsive = "col-lg-6 col-md-6 col-sm-12",
}) => {
  const [isFavorite, setIsFavorite] = useState(item.is_favorite);
  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : 0;

  const handleFavoriteToggle = () => {
    const state = isFavorite ? "delete" : "create";

    if (isFavorite) {
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
    fetch(`${process.env.REACT_APP_API_URL}/search/setFavourite`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        user_id: userId,
        favourite_id: item.id,
        listing_id: item.id,
        state: state,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.message === "Favorite status updated successfully") {
          setIsFavorite(!isFavorite);
          onFavoriteCountChange(data.favorite_count);
        } else {
          console.error("Failed to update favorite status");
          Swal.fire(
            "Error!",
            "Please login to add to the favorite list!",
            "error"
          );
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        Swal.fire(
          "Error!",
          "Please login to add to the favorite list.",
          "error"
        );
      });
  };

  return (
    <div className={responsive}>
      <div className="property-listing property-2">
        <div className="listing-img-wrapper">
          <div className="_exlio_125">{item.governorate}</div>
          <div className="list-img-slide">
            <div className="click">
              <div>
                <Link
                  to={`/property?id=${item.id}`}
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-title="View Property"
                >
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
                  <Link
                    to={`/property?id=${item.id}`}
                    className="prt-link-detail"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="View Property"
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
                    data-bs-title={
                      isFavorite
                        ? "Remove property from favorites"
                        : "Add property to favorites"
                    }
                  >
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
              </li>
              <li>
                <div className="prt_saveed_12lk">
                  <Link
                    to={`/property?id=${item.id}`}
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="View Property"
                  >
                    <i className="fa-regular fa-circle-right"></i>
                  </Link>
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
