import React from "react";
import LocationCard from "../cards/LocationCard"; // Import the LocationCard component

const ExploreByLocation = ({ locations }) => {
  return (
    <section>
      <div className="container">
        {/* Heading Section */}
        <div className="row justify-content-center">
          <div className="col-lg-7 col-md-8">
            <div className="sec-heading center">
              <h2>Explore By Location</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam.
              </p>
            </div>
          </div>
        </div>

        {/* Locations Grid */}
        <div className="row justify-content-center g-4">
          {locations && locations.length > 0 ? (
            locations.map((location) => (
              <LocationCard key={location.id} location={location} />
            ))
          ) : (
            <div className="sec-heading center">
              <h4>No locations found.</h4>
            </div>
          )}
        </div>
      </div>
    </section>
  );
};

export default ExploreByLocation;
