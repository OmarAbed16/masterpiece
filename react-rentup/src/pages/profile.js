import React, { useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import ProfileTitle from "../components/profile/profileTitle";
import ProfileSideBar from "../components/profile/profileSideBar";
import ProfileEdit from "../components/profile/profileEdit";
import ProfileChangePassword from "../components/profile/profileChangePassword";
import ProfileReviews from "../components/profile/profileReviews";
import ProfileMyBookings from "../components/profile/profileMyBookings";
import Swal from "sweetalert2";

const Profile = () => {
  const navigate = useNavigate();
  const { page } = useParams(); // Get the page parameter from the URL
  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : null;

  const [activeOption, setActiveOption] = useState(page || "profile"); // Set initial option based on URL parameter

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
            {activeOption === "bookings" && <ProfileMyBookings />}
          </div>
        </div>
      </section>
    </>
  );
};

export default Profile;
