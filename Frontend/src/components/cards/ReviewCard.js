import React from "react";

const ReviewCard = ({ review }) => {
  return (
    <div className="single_items">
      <div className="_testimonial_wrios" style={styles.card}>
        <div
          className="_testimonial_flex"
          style={{ display: "flex", alignItems: "center", gap: "15px" }}
        >
          <div className="_testimonial_flex_first" style={{ flexShrink: 0 }}>
            <div className="_tsl_flex_thumb">
              <img
                src={
                  review.user_image || "assets/default_images/default_image.png"
                }
                className="img-fluid"
                alt="User"
                style={{
                  width: "70px",
                  height: "70px",
                  objectFit: "cover",
                  borderRadius: "50%",
                }}
              />
            </div>
            <div className="_tsl_flex_capst" style={{ textAlign: "center" }}>
              <h5>{review.user_name}</h5>
              <div className="_ovr_rates">
                <span>
                  <i className="fa fa-star"></i>
                </span>
                {review.rating}
              </div>
            </div>
          </div>

          <div className="facts-detail" style={{ flexGrow: 1 }}>
            <p>{review.comment}</p>
          </div>
        </div>
      </div>
    </div>
  );
};

const styles = {
  card: {
    boxShadow: "0px 10px 20px rgba(0, 0, 0, 0.4)",
    transition: "transform 0.3s ease, box-shadow 0.3s ease",
    borderRadius: "10px",
  },
};

export default ReviewCard;
