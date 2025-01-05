import React from "react";
import Swal from "sweetalert2";
import { Link, useNavigate } from "react-router-dom";

const ProfileReviewCard = ({ review, setActiveOption }) => {
  const navigate = useNavigate();

  // Helper function to render stars based on rating
  const renderStars = (rating) => {
    let stars = [];
    for (let i = 1; i <= 5; i++) {
      stars.push(
        <i
          key={i}
          className={`fa fa-star ${i <= rating ? "gold" : "grey"}`}
          style={{ cursor: "default", color: i <= rating ? "gold" : "grey" }}
        />
      );
    }
    return stars;
  };

  // Handle comment click
  const handleCommentClick = (comment) => {
    Swal.fire({
      title: "Review Comment",
      text: comment,
      icon: "info",
      confirmButtonText: "Close",
    });
  };

  return (
    <tr>
      <td>
        <div className="dash_prt_wrap">
          <Link
            to={"/property?id=" + review.listing_details.listing_id}
            className="dash_prt_thumb"
          >
            <img
              style={{ width: "100%" }}
              src={review.listing_details.image_url}
              className="img-fluid"
              alt={review.listing_details.title}
            />
          </Link>
          <div className="dash_prt_caption">
            <h5>
              {review.listing_details.title.length > 25
                ? review.listing_details.title.slice(0, 15) + "..."
                : review.listing_details.title}
            </h5>
            <div className="prt_dashb_lot">
              {review.listing_details.location}
            </div>
            <div className="prt_dash_rate">
              <span>{review.booking_details.payment_value}</span>
            </div>
          </div>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>
            {new Date(review.booking_details.checkin).toLocaleDateString()}
          </h5>
        </div>
        <div className="_leads_view_title">
          <span>
            {new Date(review.booking_details.checkin).toLocaleTimeString()}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>
            {new Date(review.booking_details.checkout).toLocaleDateString()}
          </h5>
        </div>
        <div className="_leads_view_title">
          <span>
            {new Date(review.booking_details.checkout).toLocaleTimeString()}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_status">
          <span>{renderStars(review.rating)}</span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_status">
          <button
            onClick={() => handleCommentClick(review.comment)}
            className="btn btn-primary p-2 text-white"
            style={{
              display: "flex",
              alignItems: "center",
              justifyContent: "center",
              width: "auto",
              padding: "8px 12px",
            }}
          >
            <i className="fa fa-eye" style={{ marginRight: "8px" }} />
            Show
          </button>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>{new Date(review.created_at).toLocaleDateString()}</h5>
        </div>
        <div className="_leads_view_title">
          <span>{new Date(review.created_at).toLocaleTimeString()}</span>
        </div>
      </td>
    </tr>
  );
};

export default ProfileReviewCard;
