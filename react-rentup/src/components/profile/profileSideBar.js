import React from "react";

const ProfileSideBar = ({ activeOption, setActiveOption }) => {
  return (
    <div className="col-lg-3 col-md-4 col-sm-12">
      <div className="property_dashboard_navbar">
        <div className="dash_user_avater">
          <img
            src="assets/img/user-3.jpg"
            className="img-fluid avater"
            alt=""
          />
          <h4>Adam Harshvardhan</h4>
          <span>Canada USA</span>
        </div>
        <div className="dash_user_menues">
          <ul>
            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "profile" ? "active" : ""}
              onClick={() => setActiveOption("profile")}
            >
              <a>
                <i className="fa fa-user-tie" />
                My Profile
              </a>
            </li>
            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "bookmarks" ? "active" : ""}
              onClick={() => setActiveOption("bookings")}
            >
              <a>
                <i className="fa fa-bookmark" />
                Saved Property
              </a>
            </li>
            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "reviews" ? "active" : ""}
              onClick={() => setActiveOption("reviews")}
            >
              <a>
                <i className="fa fa-pen-nib" />
                My Reviews
              </a>
            </li>
            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "password" ? "active" : ""}
              onClick={() => setActiveOption("password")}
            >
              <a>
                <i className="fa fa-unlock-alt" />
                Change Password
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  );
};

export default ProfileSideBar;
