import React from "react";
import ProfileBookingCard from "../cards/ProfileBookingCard"; // Make sure the path is correct

const ProfileMyBookings = ({ title }) => {
  const bookings = [
    {
      id: 1,
      property: {
        image: "assets/img/p-7.png",
        name: "4 Bhk Luxury Villa",
        address: "5682 Brown River Suit 18",
        price: "$ 2,200,000",
      },
      leads: 27,
      views: 816,
      postedOn: "16 Aug - 12:40",
      status: "Expired",
      leadsUsers: [
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
      ],
    },
    {
      id: 2,
      property: {
        image: "assets/img/p-8.png",
        name: "4 Bhk Luxury Villa",
        address: "5682 Brown River Suit 18",
        price: "$ 2,200,000",
      },
      leads: 27,
      views: 816,
      postedOn: "16 Aug - 12:40",
      status: "Active",
      leadsUsers: [
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
        { avatar: "assets/img/team-1.jpg" },
      ],
    },
  ];

  return (
    <>
      <div className="col-lg-9 col-md-8 col-sm-12">
        <div className="dashboard-body">
          <div className="row">
            <div className="col-lg-12 col-md-12">
              <div className="dashboard_property">
                <div className="table-responsive">
                  <table className="table">
                    <thead className="thead-dark">
                      <tr>
                        <th scope="col">Property</th>
                        <th scope="col" className="m2_hide">
                          Leads
                        </th>
                        <th scope="col" className="m2_hide">
                          Stats
                        </th>
                        <th scope="col" className="m2_hide">
                          Posted On
                        </th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {bookings.map((booking) => (
                        <ProfileBookingCard
                          key={booking.id}
                          booking={booking}
                        />
                      ))}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          {/* row */}
        </div>
      </div>
    </>
  );
};

export default ProfileMyBookings;
