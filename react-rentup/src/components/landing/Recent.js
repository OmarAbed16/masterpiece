import React, { useEffect, useState } from "react";
import axios from "axios";
import PropertyCard from "../cards/landing_recent"; // Assuming PropertyCard is a separate component

const Recent = ({ onFavoriteCountChange }) => {
  const [items, setItems] = useState({ listings: [] });
  const [loading, setLoading] = useState(true); // Loading state
  const user = JSON.parse(sessionStorage.getItem("user")); // Retrieve the user object
  const userId = user ? user.id : 0;
  useEffect(() => {
    axios
      .get(`${process.env.REACT_APP_API_URL}/recentListings?user_id=${userId}`)
      .then((response) => {
        setItems(response.data || { listings: [] });
        if (response.data && response.data.favorite_count !== undefined) {
          onFavoriteCountChange(response.data.favorite_count);
        }
        setLoading(false); // Set loading to false after data is fetched
      })
      .catch((error) => {
        console.error("Error fetching property listings:", error);
        setItems({ listings: [] });
        setLoading(false); // Set loading to false even on error
      });
  }, []);

  if (loading) {
    return <p>Loading...</p>; // Render a loading message while data is being fetched
  }

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
          {items.listings.length > 0 ? (
            items.listings.map((item) => (
              <PropertyCard
                key={item.id}
                item={item}
                onFavoriteCountChange={onFavoriteCountChange}
              />
            ))
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
