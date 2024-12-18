import React from "react";
import { Link } from "react-router-dom";

const ProfileReviewCard = ({ review }) => {
  return (
    <tr>
      <td className="dashboard_propert_wrapper">
        <img
          src={review.listing.images[0].image_url}
          alt={review.listing.title}
        />
        <div className="title">
          <h4>
            <Link to={`/property?id=${review.listing.id}`}>
              {review.listing.title}
            </Link>
          </h4>
          <span>{review.listing.location}</span>
          <div className="review-info">
            <div className="rating">
              {Array.from({ length: 5 }, (_, index) => (
                <i
                  key={index}
                  className={`fa fa-star ${
                    index < review.rating ? "filled" : "empty"
                  }`}
                  style={{
                    color: index < review.rating ? "gold" : "grey",
                  }}
                ></i>
              ))}
            </div>
            <span>
              {new Date(review.created_at).toLocaleDateString("en", {
                day: "2-digit",
                month: "long",
                year: "numeric",
              })}
            </span>
          </div>
        </div>
      </td>
      <td className="action text-end">
        <Link to={`/property?id=${review.listing.id}`}>
          <button className="btn btn-danger btn-lg" type="button">
            View Property
          </button>
        </Link>
      </td>
    </tr>
  );
};

export default ProfileReviewCard;
