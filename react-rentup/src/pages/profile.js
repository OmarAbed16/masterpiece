import React, { useEffect, useState } from "react";
import axios from "axios";
import { useNavigate, useSearchParams } from "react-router-dom";
import ProfileTitle from "../components/profile/profileTitle";
import ProfileSideBar from "../components/profile/profileSideBar";
import ProfileEdit from "../components/profile/profileEdit";
import ProfileChangePassword from "../components/profile/profileChangePassword";
import ProfileReviews from "../components/profile/profileReviews";
import ProfileMyBookings from "../components/profile/profileMyBookings";
import Swal from "sweetalert2";
import ProfileFavorite from "../components/profile/ProfileFavorite";

const Profile = ({ onFavoriteCountChange }) => {
  const navigate = useNavigate();
  const [searchParams] = useSearchParams();
  const page = searchParams.get("page"); // Get the page parameter from the URL
  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : null;

  const [activeOption, setActiveOption] = useState(page || "profile"); // Set initial option based on URL parameter

  useEffect(() => {
    axios
      .get(`${process.env.REACT_APP_API_URL}/recentListings?user_id=${userId}`)
      .then((response) => {
        if (response.data && response.data.favorite_count !== undefined) {
          onFavoriteCountChange(response.data.favorite_count);
        }
      })
      .catch((error) => {
        console.error("Error fetching property listings:", error);
      });
  }, []);

  const [profileData, setProfileData] = useState({
    name: user ? user.name : "",
    profile_image: user ? user.profile_image : "",
    email: user ? user.email : "",
  });
  console.log(profileData);
  const handleProfileChange = (newData) => {
    setProfileData(newData);
  };

  if (!userId) {
    Swal.fire({
      title: "Error!",
      text: "You must be logged in to view this page.",
      icon: "error",
      confirmButtonText: "OK",
    }).then(() => {
      navigate("/login");
    });
    return null;
  }

  return (
    <>
      <ProfileTitle />
      <section className="gray pt-5 pb-5">
        <div className="container-fluid">
          <div className="row">
            <ProfileSideBar
              profileData={profileData}
              activeOption={activeOption}
              setActiveOption={setActiveOption}
            />
            {activeOption === "profile" && (
              <ProfileEdit onProfileChange={handleProfileChange} />
            )}
            {activeOption === "reviews" && <ProfileReviews />}
            {activeOption === "password" && <ProfileChangePassword />}
            {activeOption === "favourite" && (
              <ProfileFavorite
                userId={user.id}
                onFavoriteCountChange={onFavoriteCountChange}
              />
            )}
            {activeOption === "bookings" && (
              <ProfileMyBookings setActiveOption={setActiveOption} />
            )}
          </div>
        </div>
      </section>
    </>
  );
};

export default Profile;
