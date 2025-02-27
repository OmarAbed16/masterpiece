import React, { useState, useEffect } from "react";
import ProfileBookingCard from "../cards/ProfileBookingCard";
import DataTable from "datatables.net-react";
import DT from "datatables.net-dt";
DataTable.use(DT);

const ProfileMyBookings = ({ setActiveOption }) => {
  const [bookings, setBookings] = useState([]);
  const [loading, setLoading] = useState(true);

  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : null;

  useEffect(() => {
    if (userId) {
      const fetchBookings = async () => {
        try {
          const response = await fetch(
            `${process.env.REACT_APP_API_URL}/profile/bookings?user_id=${user.id}`
          );
          const data = await response.json();
          setBookings(data);
        } catch (error) {
          console.error("Error fetching bookings:", error);
        } finally {
          setLoading(false);
        }
      };

      fetchBookings();
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
                          Payment
                        </th>

                        <th scope="col" className="m2_hide">
                          Payment Status
                        </th>
                        <th className="m2_hide" scope="col">
                          Status
                        </th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    {bookings.total_count > 0 ? (
                      <tbody>
                        {bookings.bookings.map((booking) => (
                          <>
                            <ProfileBookingCard
                              key={booking.id}
                              booking={booking}
                              setActiveOption={setActiveOption}
                            />
                          </>
                        ))}
                      </tbody>
                    ) : (
                      <h3>No bookings available</h3>
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

export default ProfileMyBookings;
