import React, { useEffect, useState } from "react";
import axios from "axios";
import ProfileReviewCard from "../cards/ProfileReviewCard";

const ProfileReviews = () => {
  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : null;
  const [reviews, setReviews] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    if (userId) {
      axios
        .get(
          `${process.env.REACT_APP_API_URL}/profile/getreviews?userId=${userId}`
        )
        .then((response) => {
          setReviews(response.data);
          setLoading(false);
        })
        .catch((error) => {
          console.error("Error fetching reviews:", error);
          setLoading(false);
        });
    }
  }, [userId]);

  if (loading) {
    return <div>Loading...</div>; // Loading state UI
  }

  return (
    <>
      <div className="col-lg-9 col-md-8 col-sm-12">
        <div className="dashboard-body">
          <div className="dashboard-wraper">
            {/* My Reviews */}
            <div className="frm_submit_block">
              <h4>My Reviews</h4>
            </div>
            <table className="property-table-wrap responsive-table bkmark">
              <tbody>
                <tr>
                  <th>
                    <i className="fa fa-file-text" /> Property
                  </th>
                  <th />
                </tr>
                {/* Render Review Cards */}
                {reviews.map((review, index) => (
                  <ProfileReviewCard
                    key={index}
                    review={review} // Pass the entire review object
                  />
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileReviews;
