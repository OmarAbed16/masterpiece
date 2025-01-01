import React, { useEffect, useState } from "react";
import axios from "axios";
import SearchGrid from "../search/SearchGrid";

const ProfileFavorite = ({ userId, onFavoriteCountChange }) => {
  const [favorites, setFavorites] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchFavorites = async () => {
      try {
        const response = await axios.get(
          `${process.env.REACT_APP_API_URL}/profile/favorites?user_id=${userId}`
        );
        setFavorites(response.data.listings);

        console.log("d");
        console.log(response.data);
      } catch (err) {
        setError("Your Favorite listings is empty.");
      } finally {
        setLoading(false);
      }
    };

    if (userId) {
      fetchFavorites();
    }
  }, [userId]);

  if (loading) return <h3 className="col-lg-9 col-md-8">Loading...</h3>;
  if (error)
    return (
      <div className="col-lg-9 col-md-8 row justify-content-center g-4">
        <h3>{error}</h3>
      </div>
    );

  return (
    <div
      className="col-lg-9 col-md-8 row justify-content-center g-4"
      style={{ marginTop: "0px" }}
    >
      {favorites.map((item) => (
        <SearchGrid
          key={item.id}
          item={item}
          onFavoriteCountChange={onFavoriteCountChange}
          responsive="col-lg-4 col-md-6 col-sm-12"
        />
      ))}
    </div>
  );
};

export default ProfileFavorite;
