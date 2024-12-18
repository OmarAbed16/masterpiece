// Details.js
import React from "react";
import Review from "./Review";
import Ameneties from "./Ameneties";
import Features from "./Features";
import Description from "./Description";
import Property_info from "./Property_info";
import ReviewList from "./ReviewList";

const Details = ({ property, onFavoriteCountChange }) => {
  return (
    <>
      {/* property main detail */}
      <div className="col-lg-8 col-md-12 col-sm-12">
        <Property_info
          onFavoriteCountChange={onFavoriteCountChange}
          info={{ ...property, description: undefined }}
        />
        {/* Single Block Wrap */}
        <Description desc={property.description} />
        {/* Single Block Wrap */}
        <Features Features={property.features} />
        {/* Single Block Wrap */}
        <Ameneties Ameneties={property.amenities} />

        {/* Single Reviews Block */}
        <div className="property_block_wrap">
          <div className="property_block_wrap_header">
            <h4 className="property_block_title">Recent Reviews</h4>
            <h6>
              {property.avg_rating}/5.0
              <i className="fa fa-star" style={{ color: "gold" }}></i>(
              {property.reviews_count} total reviews)
            </h6>
          </div>
          <div className="block-body">
            <ReviewList Reviews={property.latest_reviews} />
          </div>
        </div>
      </div>
    </>
  );
};

export default Details;
