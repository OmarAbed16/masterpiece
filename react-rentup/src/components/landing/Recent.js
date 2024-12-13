import React, { useEffect, useState } from "react";
import axios from "axios";
import PropertyCard from "../cards/landing_recent"; // Assuming PropertyCard is a separate component

const Recent = () => {
  const [items, setItems] = useState([]);

  useEffect(() => {
    axios
      .get(`${process.env.REACT_APP_API_URL}/recentListings`)
      .then((response) => {
        setItems(response.data);
      })
      .catch((error) => {
        console.error("Error fetching property listings:", error);
      });
  }, []);

  return (
    <section>
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-lg-7 col-md-10 text-center">
            <div className="sec-heading center mb-4">
              <h2>Recent Listed Property</h2>
              <p>
                Discover properties that have just entered the market, offering
                fresh opportunities for those seeking new homes or investments.
              </p>
            </div>
          </div>
        </div>

        <div className="row justify-content-center g-4">
          {items.length > 0 ? (
            items.map((item) => <PropertyCard key={item.id} item={item} />)
          ) : (
            <div className="sec-heading center">
              <h4>No recent listings found.</h4>
            </div>
          )}
        </div>
      </div>
    </section>
  );
};

export default Recent;
