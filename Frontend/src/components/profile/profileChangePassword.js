import React, { useState } from "react";
import axios from "axios";
import Swal from "sweetalert2";

const ProfileChangePassword = () => {
  const [oldPassword, setOldPassword] = useState("");
  const [newPassword, setNewPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");
  const [errors, setErrors] = useState({
    oldPassword: "",
    newPassword: "",
    confirmPassword: "",
  });

  const validateInput = (name, value) => {
    let error = "";

    if (name === "oldPassword" && value.trim() === "") {
      error = "Old password is required.";
    } else if (name === "newPassword") {
      if (value.trim() === "") {
        error = "New password is required.";
      } else if (value.length < 8) {
        error = "New password must be at least 8 characters.";
      }
    } else if (name === "confirmPassword") {
      if (value.trim() === "") {
        error = "Confirmation password is required.";
      } else if (value !== newPassword) {
        error = "Passwords do not match.";
      }
    }

    setErrors((prevErrors) => ({ ...prevErrors, [name]: error }));
  };

  const handlePasswordChange = async (e) => {
    e.preventDefault();

    // Run validation before submitting
    validateInput("oldPassword", oldPassword);
    validateInput("newPassword", newPassword);
    validateInput("confirmPassword", confirmPassword);

    if (errors.oldPassword || errors.newPassword || errors.confirmPassword) {
      Swal.fire({
        title: "Error!",
        text: "Please fix the errors in the form.",
        icon: "error",
        confirmButtonText: "OK",
      });
      return;
    }

    try {
      const user = JSON.parse(sessionStorage.getItem("user"));
      const response = await axios.patch(
        `${process.env.REACT_APP_API_URL}/profile/changepassword`,
        {
          user_id: user.id,
          old_password: oldPassword,
          new_password: newPassword,
          confirm_password: confirmPassword,
        }
      );

      Swal.fire({
        title: "Success!",
        text: response.data.message,
        icon: "success",
        confirmButtonText: "OK",
      });

      // Clear form and errors
      setOldPassword("");
      setNewPassword("");
      setConfirmPassword("");
      setErrors({});
    } catch (error) {
      const serverError =
        error.response && error.response.data
          ? error.response.data.message
          : "Something went wrong. Please try again.";
      Swal.fire({
        title: "Error!",
        text: serverError,
        icon: "error",
        confirmButtonText: "OK",
      });
    }
  };

  return (
    <div className="col-lg-9 col-md-8">
      <div className="dashboard-body">
        <div className="dashboard-wraper">
          <div className="frm_submit_block">
            <h4 className="ms-3 mb-4">Change Your Password</h4>
            <div className="frm_submit_wrap">
              <form onSubmit={handlePasswordChange}>
                <div className="form-row">
                  {/* Old Password */}
                  <div className="form-group col-lg-7 col-md-10">
                    <label>Old Password</label>
                    <input
                      type="password"
                      className="form-control"
                      value={oldPassword}
                      onChange={(e) => {
                        setOldPassword(e.target.value);
                        validateInput("oldPassword", e.target.value);
                      }}
                      onBlur={() => validateInput("oldPassword", oldPassword)}
                    />
                    {errors.oldPassword && (
                      <small className="text-danger">
                        {errors.oldPassword}
                      </small>
                    )}
                  </div>

                  {/* New Password */}
                  <div className="form-group col-lg-7 col-md-10">
                    <label>New Password</label>
                    <input
                      type="password"
                      className="form-control"
                      value={newPassword}
                      onChange={(e) => {
                        setNewPassword(e.target.value);
                        validateInput("newPassword", e.target.value);
                      }}
                      onBlur={() => validateInput("newPassword", newPassword)}
                    />
                    {errors.newPassword && (
                      <small className="text-danger">
                        {errors.newPassword}
                      </small>
                    )}
                  </div>

                  {/* Confirm Password */}
                  <div className="form-group col-lg-7 col-md-10">
                    <label>Confirm Password</label>
                    <input
                      type="password"
                      className="form-control"
                      value={confirmPassword}
                      onChange={(e) => {
                        setConfirmPassword(e.target.value);
                        validateInput("confirmPassword", e.target.value);
                      }}
                      onBlur={() =>
                        validateInput("confirmPassword", confirmPassword)
                      }
                    />
                    {errors.confirmPassword && (
                      <small className="text-danger">
                        {errors.confirmPassword}
                      </small>
                    )}
                  </div>

                  {/* Submit Button */}
                  <div className="form-group col-lg-7 col-md-10">
                    <button className="btn btn-danger" type="submit">
                      Save Changes
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProfileChangePassword;
