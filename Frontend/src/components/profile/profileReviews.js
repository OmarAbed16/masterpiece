import React, { useState, useEffect } from "react";
import ProfileReviewCard from "../cards/ProfileReviewCard";
import DataTable from "datatables.net-react";
import DT from "datatables.net-dt";
DataTable.use(DT);

const ProfileReviews = ({ setActiveOption }) => {
  const [reviews, setReviews] = useState([]);
  const [loading, setLoading] = useState(true);

  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : null;

  useEffect(() => {
    if (userId) {
      const fetchReviews = async () => {
        try {
          const response = await fetch(
            `${process.env.REACT_APP_API_URL}/profile/reviews?user_id=${user.id}`
          );
          const data = await response.json();
          setReviews(data);
        } catch (error) {
          console.error("Error fetching Reviews:", error);
        } finally {
          setLoading(false);
        }
      };

      fetchReviews();
    } else {
      setLoading(false);
    }
  }, [userId]);

  if (loading) {
    return <div>Loading...</div>;
  }

  return (
    <>
      <div className="col-lg-9 col-md-8 col-sm-12">
        <div className="dashboard-body">
          <div className="row">
            <div className="col-lg-12 col-md-12">
              <div className="dashboard_property">
                <div className="table-responsive">
                  <DataTable className="table">
                    <thead className="thead-dark">
                      <tr>
                        <th scope="col">Property Details</th>

                        <th scope="col" className="m2_hide">
                          Check in
                        </th>
                        <th scope="col" className="m2_hide">
                          Check out
                        </th>
                        <th scope="col" className="m2_hide">
                          Rating
                        </th>
                        <th className="m2_hide" scope="col">
                          Comment
                        </th>
                        <th scope="col">Review Creation</th>
                      </tr>
                    </thead>
                    {reviews.total_count > 0 ? (
                      <tbody>
                        {reviews.reviews.map((review) => (
                          <>
                            <ProfileReviewCard
                              key={review.id}
                              review={review}
                              setActiveOption={setActiveOption}
                            />
                          </>
                        ))}
                      </tbody>
                    ) : (
                      <h3>No Reviews available</h3>
                    )}
                  </DataTable>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileReviews;
