import React from "react";

const ReviewCard = ({ review }) => {
  return (
    <div className="single_items">
      <div className="_testimonial_wrios">
        <div className="_testimonial_flex">
          <div className="_testimonial_flex_first">
            <div className="_tsl_flex_thumb">
              <img src={review.user_image} className="img-fluid" alt="User" />
            </div>
            <div className="_tsl_flex_capst">
              <h5>{review.user_name}</h5>
              <div className="_ovr_rates">
                <span>
                  <i className="fa fa-star"></i>
                </span>
                {review.rating}
              </div>
            </div>
          </div>
        </div>
        <div className="facts-detail">
          <p>{review.comment}</p>
        </div>
      </div>
    </div>
  );
};

export default ReviewCard;
