import React, { useState } from "react";
import Swal from "sweetalert2";
import axios from "axios";

const ProfileEdit = ({ onProfileChange }) => {
  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : null;

  const [formData, setFormData] = useState({
    name: user ? user.name : "",
    email: user ? user.email : "",
    phone: user ? user.phone_number : "",
    about: user ? user.about || "" : "",
    profileImage: null,
  });

  const handleInputChange = (e) => {
    const { name, value, files } = e.target;
    if (files) {
      setFormData({ ...formData, profileImage: files[0] });
    } else {
      setFormData((prevState) => ({ ...prevState, [name]: value }));
    }
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    // Validate form data
    if (!formData.name || !formData.phone) {
      Swal.fire({
        icon: "error",
        title: "Validation Error",
        text: "Name and phone fields are required!",
      });
      return;
    }

    try {
      const formDataToSubmit = new FormData();
      formDataToSubmit.append("userId", userId);
      formDataToSubmit.append("name", formData.name);
      formDataToSubmit.append("phone", formData.phone);
      if (formData.profileImage) {
        formDataToSubmit.append("profile_image", formData.profileImage);
      }

      const response = await axios.post(
        `${process.env.REACT_APP_API_URL}/profile/update`,
        formDataToSubmit,
        {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        }
      );

      if (response.status === 200) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Profile updated successfully!",
        });

        // Update session storage with new values
        const updatedUser = {
          ...user,
          name: formData.name,
          phone_number: formData.phone,
          profile_image: response.data.user.profile_image, // Assuming this contains the new image URL
        };
        sessionStorage.setItem("user", JSON.stringify(updatedUser));

        // Call the `onProfileChange` callback with the new data
        onProfileChange(updatedUser);
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: response.data.message || "Failed to update profile!",
        });
      }
    } catch (error) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: error.response
          ? error.response.data.message
          : "Something went wrong!",
      });
    }
  };

  return (
    <>
      <div className="col-lg-9 col-md-8 col-sm-12">
        <div className="dashboard-body">
          <div className="dashboard-wraper">
            {/* Basic Information */}
            <div className="frm_submit_block">
              <h4>My Account</h4>
              <form onSubmit={handleSubmit}>
                <div className="frm_submit_wrap">
                  <div className="form-row row">
                    <div className="form-group col-md-6">
                      <label>Your Name</label>
                      <input
                        type="text"
                        className="form-control"
                        name="name"
                        value={formData.name}
                        onChange={handleInputChange}
                      />
                    </div>
                    <div className="form-group col-md-6">
                      <label>Email</label>
                      <input
                        type="email"
                        className="form-control text-muted"
                        style={{ cursor: "no-drop" }}
                        name="email"
                        value={formData.email}
                        readOnly
                      />
                    </div>
                    <div className="form-group col-md-6">
                      <label>Phone</label>
                      <input
                        type="text"
                        className="form-control"
                        name="phone"
                        value={formData.phone}
                        onChange={handleInputChange}
                      />
                    </div>

                    <div className="form-group col-md-6">
                      <label>Profile Image</label>
                      <input
                        type="file"
                        className="form-control"
                        name="profileImage"
                        onChange={handleInputChange}
                      />
                    </div>

                    {/* Commented out the About field for future use */}
                    {/* 
                    <div className="form-group col-md-12">
                      <label>About</label>
                      <textarea
                        className="form-control"
                        name="about"
                        value={formData.about}
                        onChange={handleInputChange}
                      />
                    </div>
                    */}
                  </div>
                </div>

                <div className="frm_submit_wrap">
                  <div className="form-row row">
                    <div className="form-group col-lg-12 col-md-12 mt-4">
                      <button className="btn btn-danger btn-lg" type="submit">
                        Save Changes
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileEdit;
