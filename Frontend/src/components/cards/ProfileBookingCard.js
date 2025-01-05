import React from "react";
import Swal from "sweetalert2";
import { Link, useNavigate } from "react-router-dom";
import axios from "axios";
const ProfileBookingCard = ({ booking, setActiveOption }) => {
  console.log(booking.review_count);
  console.log("g");

  const navigate = useNavigate();

  const handleDelete = (bookingId) => {
    Swal.fire({
      title: "Are you sure?",
      text: "This booking will be deleted and cannot be restored!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch(
          `${process.env.REACT_APP_API_URL}/profile/delete_booking/${bookingId}`,
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
            },
          }
        )
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              Swal.fire(
                "Deleted!",
                "Your booking has been deleted.",
                "success"
              );
              setActiveOption("profile");
            } else {
              Swal.fire(
                "Error!",
                "There was an issue deleting your booking.",
                "error"
              );
            }
          })
          .catch((error) => {
            Swal.fire(
              "Error!",
              "Something went wrong. Please try again later.",
              "error"
            );
          });
      }
    });
  };

  const handleReview = (bookingId, listingId) => {
    Swal.fire({
      title: "Leave a Review",
      html: `
        <div class="star-rating" style="font-size: 30px;">
          <span class="star fa fa-star" data-value="1"></span>
          <span class="star fa fa-star" data-value="2"></span>
          <span class="star fa fa-star" data-value="3"></span>
          <span class="star fa fa-star" data-value="4"></span>
          <span class="star fa fa-star" data-value="5"></span>
        </div>
        <textarea id="reviewText" placeholder="Write your review here..." style="width: 100%; height: 100px; margin-top: 10px;"></textarea>
      `,
      focusConfirm: false,
      showCancelButton: true,
      cancelButtonText: "Cancel",
      confirmButtonText: "Add Review",
      cancelButtonColor: "red",
      preConfirm: () => {
        const rating = document.querySelector(".star.selected");
        const reviewText = document.getElementById("reviewText").value;

        if (!rating || !reviewText) {
          Swal.showValidationMessage(
            "Please provide both a rating and a review."
          );
          return false;
        }

        if (reviewText.length < 50) {
          Swal.showValidationMessage(
            "Your review must be at least 50 characters."
          );
          return false;
        }

        return { rating: rating.dataset.value, review: reviewText };
      },
    }).then((result) => {
      if (result.isConfirmed) {
        const { rating, review } = result.value;

        const user = JSON.parse(sessionStorage.getItem("user"));
        const userId = user ? user.id : 0;
        if (!userId) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "User is not authenticated. Please log in first.",
            confirmButtonText: "Close",
          });
          return;
        }

        // Send the review data to the API using Axios (POST method)
        axios
          .post(
            `${process.env.REACT_APP_API_URL}/profile/addReview`,
            {
              user_id: userId,
              booking_id: bookingId,
              listing_id: listingId,
              rating: rating,
              review: review,
            },
            {
              headers: {
                "Content-Type": "application/json",
              },
            }
          )
          .then((response) => {
            if (response.data.message) {
              Swal.fire({
                icon: "success",
                title: "Thank you for your review!",
                text: `Your review (Rating: ${rating} stars): ${review}`,
                confirmButtonText: "Close",
              }).then((result) => {
                if (result.isConfirmed) {
                  setActiveOption("reviews");
                }
              });
            } else if (response.data.error) {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: response.data.error,
                confirmButtonText: "Close",
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: "There was an issue submitting your review. Please try again.",
                confirmButtonText: "Close",
              });
            }
          })
          .catch((error) => {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: error.response?.data?.error || "Something went wrong!",
              confirmButtonText: "Close",
            });
          });
      }
    });

    // Handle star rating interaction
    const stars = document.querySelectorAll(".star");
    stars.forEach((star) => {
      star.style.cursor = "pointer";
      star.addEventListener("click", () => {
        stars.forEach((star) => star.classList.remove("selected"));
        star.classList.add("selected");
        stars.forEach((star) => (star.style.color = "black"));
        for (let i = 0; i < star.dataset.value; i++) {
          stars[i].style.color = "gold";
        }
      });
    });
  };

  return (
    <tr>
      <td>
        <div className="dash_prt_wrap">
          <Link
            to={"/property?id=" + booking.listing_details.listing_id}
            className="dash_prt_thumb"
          >
            <img
              style={{ width: "100%" }}
              src={booking.listing_details.image_url}
              className="img-fluid"
              alt={booking.listing_details.title}
            />
          </Link>
          <div className="dash_prt_caption">
            <h5>
              {booking.listing_details.title.length > 25
                ? booking.listing_details.title.slice(0, 15) + "..."
                : booking.listing_details.title}
            </h5>
            <div className="prt_dashb_lot">
              {booking.listing_details.location}
            </div>
            <div className="prt_dash_rate">
              <span>{booking.booking_details.payment_value}</span>
            </div>
          </div>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>
            {new Date(booking.booking_details.checkin).toLocaleDateString()}
          </h5>
        </div>
        <div className="_leads_view_title">
          <span>
            {new Date(booking.booking_details.checkin).toLocaleTimeString()}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>
            {new Date(booking.booking_details.checkout).toLocaleDateString()}
          </h5>
        </div>
        <div className="_leads_view_title">
          <span>
            {new Date(booking.booking_details.checkout).toLocaleTimeString()}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>{booking.booking_details.payment_value} JOD</h5>
        </div>
        <div className="_leads_view_title">
          <span>{booking.booking_details.payment_method}</span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_status">
          <span
            className={
              booking.booking_details.payment_status === "completed"
                ? "active"
                : "expire"
            }
          >
            {booking.booking_details.payment_status}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_status">
          <span
            className={
              booking.booking_details.status === "confirmed"
                ? "active"
                : "expire"
            }
          >
            {booking.booking_details.status}
          </span>
        </div>
      </td>

      <td>
        <div className="_leads_action">
          {booking.booking_details.status === "confirmed" &&
            booking.review_count <= 0 && (
              <a
                href="#"
                onClick={() =>
                  handleReview(
                    booking.booking_details.booking_id,
                    booking.listing_details.listing_id
                  )
                }
              >
                <i className="fas fa-edit add-review" />
              </a>
            )}

          {booking.booking_details.status === "confirmed" &&
            booking.review_count > 0 && <p>reviewed</p>}
          {booking.booking_details.status === "canceled" && (
            <span className="canceled-status text-danger">Canceled</span>
          )}
          {booking.booking_details.status === "pending" && (
            <a
              href="#"
              onClick={() => handleDelete(booking.booking_details.booking_id)}
            >
              <i className="fas fa-trash delete-user" />
            </a>
          )}
        </div>
      </td>
    </tr>
  );
};

export default ProfileBookingCard;
