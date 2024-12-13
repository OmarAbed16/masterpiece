import React from "react";

const LocationCard = ({ location }) => {
  return (
    <div className="col-lg-4 col-md-4 col-sm-6">
      <a href={location.link} className="img-wrap style-2">
        <div className="location_wrap_content visible">
          <div className="location_wrap_content_first">
            {/* Location Name */}
            <h4>{location.name}</h4>
            {/* Property Details */}
            <ul>
              <li>
                <span>{location.villas} Villas</span>
              </li>
              <li>
                <span>{location.apartments} Apartments</span>
              </li>
              <li>
                <span>{location.offices} Offices</span>
              </li>
            </ul>
          </div>
        </div>
        {/* Background Image */}
        <div
          className="img-wrap-background"
          style={{ backgroundImage: `url(${location.image})` }}
        ></div>
      </a>
    </div>
  );
};

export default LocationCard;
