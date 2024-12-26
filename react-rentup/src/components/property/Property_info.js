import React, { useState } from "react";
import Swal from "sweetalert2";

const Property_info = ({ info, onFavoriteCountChange }) => {
  const [isFavorite, setIsFavorite] = useState(info.isFavourite); // Initialize state
  const user = JSON.parse(sessionStorage.getItem("user")); // Get user from sessionStorage
  const userId = user ? user.id : 0; // Default to 0 if user is not logged in

  // Toggle Favorite Status
  const handleFavoriteToggle = () => {
    const state = isFavorite ? "delete" : "create";

    if (isFavorite) {
      // Confirm before removing favorite
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

  // Update Favorite State via API
  const updateFavoriteState = (state) => {
    fetch(
      `${process.env.REACT_APP_API_URL}/search/setFavourite?user_id=${userId}&favourite_id=${info.id}&listing_id=${info.id}&state=${state}`,
      { method: "GET" }
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
    <>
      <div className="property_info_detail_wrap mb-4">
        <div className="property_info_detail_wrap_first">
          <div className="pr-price-into">
            <ul className="prs_lists">
              <li>
                <span className="bed fw-medium rounded">
                  <i className="fas fa-bed"></i> {info.bed} Beds
                </span>
              </li>
              <li>
                <span className="bath fw-medium rounded">
                  <i className="fas fa-bath"></i> {info.bath} Bath
                </span>
              </li>
              <li>
                <span className="sqft fw-medium rounded">
                  <i className="fas fa-ruler-combined"></i> {info.sqft} sqft
                </span>
              </li>
            </ul>
            <h2>{info.title}</h2>
            <span>
              <i className="lni-map-marker" /> {info.location}
            </span>
          </div>
        </div>

        {/* Favorite Toggle */}
        <div className="property_detail_section">
          <div className="prt-sect-pric">
            <ul className="_share_lists">
              <li>
                <a
                  href="#"
                  onClick={(e) => {
                    e.preventDefault();
                    handleFavoriteToggle();
                  }}
                  title={
                    isFavorite
                      ? "Remove property from favorites"
                      : "Add property to favorites"
                  }
                >
                  <i
                    style={{
                      fontSize: "1.5rem",
                      color: isFavorite ? "#ff5722" : "inherit",
                    }}
                    className="fa fa-bookmark"
                  />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </>
  );
};

export default Property_info;
