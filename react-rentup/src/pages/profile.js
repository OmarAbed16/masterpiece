import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import ProfileTitle from "../components/profile/profileTitle";
import ProfileSideBar from "../components/profile/profileSideBar";
import ProfileEdit from "../components/profile/profileEdit";
import ProfileChangePassword from "../components/profile/profileChangePassword";
import ProfileReviews from "../components/profile/profileReviews";
import ProfileMyBookings from "../components/profile/profileMyBookings";
import Swal from "sweetalert2";

const Profile = () => {
  const navigate = useNavigate();
  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : null;

  const [activeOption, setActiveOption] = useState("profile"); // Default option

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
              activeOption={activeOption}
              setActiveOption={setActiveOption}
            />
            {activeOption === "profile" && <ProfileEdit />}
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
