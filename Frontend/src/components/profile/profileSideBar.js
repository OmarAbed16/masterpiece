import React from "react";
import { Link } from "react-router-dom";

const ProfileSideBar = ({ profileData, activeOption, setActiveOption }) => {
  return (
    <div className="col-lg-3 col-md-4 col-sm-12">
      <div className="property_dashboard_navbar">
        {/* User Avatar Section */}
        <div className="dash_user_avater">
          <img
            style={{ height: "100px", width: "100px", objectFit: "cover" }}
            src={profileData?.profile_image || "default-avatar.png"}
            className="img-fluid avater"
            alt="User Avatar"
          />
          <h4>{profileData?.name || "User Name"}</h4>
          <span>{profileData?.email || "User Email"}</span>
        </div>

        {/* Sidebar Menu */}
        <div className="dash_user_menues">
          <ul>
            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "profile" ? "active" : ""}
            >
              <Link
                to="/profile?page=profile"
                onClick={() => setActiveOption("profile")}
              >
                <i className="fa fa-user-tie" /> My Profile
              </Link>
            </li>

            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "favourite" ? "active" : ""}
            >
              <Link
                to="/profile?page=favourite"
                onClick={() => setActiveOption("favourite")}
              >
                <i className="fa fa-bookmark" /> My Favourite
              </Link>
            </li>

            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "messages" ? "active" : ""}
            >
              <Link
                to="/profile?page=messages"
                onClick={() => setActiveOption("messages")}
              >
                <i className="fa fa-envelope" /> My Messages
              </Link>
            </li>

            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "bookings" ? "active" : ""}
            >
              <Link
                to="/profile?page=bookings"
                onClick={() => setActiveOption("bookings")}
              >
                <i className="fa fa-calendar" /> My Bookings
              </Link>
            </li>
            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "reviews" ? "active" : ""}
            >
              <Link
                to="/profile?page=reviews"
                onClick={() => setActiveOption("reviews")}
              >
                <i className="fa fa-pen-nib" /> My Reviews
              </Link>
            </li>
            <li
              style={{ cursor: "pointer" }}
              className={activeOption === "password" ? "active" : ""}
            >
              <Link
                to="/profile?page=password"
                onClick={() => setActiveOption("password")}
              >
                <i className="fa fa-unlock-alt" /> Change Password
              </Link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  );
};
export default ProfileSideBar;
