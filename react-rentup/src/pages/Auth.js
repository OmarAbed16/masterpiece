import React, { useState } from "react";
import styles from "./Auth.module.css";

const Auth = () => {
  const [formData, setFormData] = useState({
    fullName: "",
    email: "",
    password: "",
    confirmPassword: "",
  });
  const [errors, setErrors] = useState({
    fullName: "",
    email: "",
    password: "",
    confirmPassword: "",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevState) => ({
      ...prevState,
      [name]: value,
    }));

    validateForm(name, value);
  };

  const validateForm = (name, value) => {
    if (name === "email") {
      setErrors({
        ...errors,
        email: validateEmail(value),
      });
    }
    if (name === "password") {
      setErrors({
        ...errors,
        password: validatePassword(value),
      });
    }
    if (name === "confirmPassword") {
      setErrors({
        ...errors,
        confirmPassword:
          value === formData.password ? "" : "Passwords do not match.",
      });
    }
    if (name === "fullName") {
      setErrors({
        ...errors,
        fullName: value ? "" : "Full name is required.",
      });
    }
  };

  const validateEmail = (email) => {
    const regex = /\S+@\S+\.\S+/;
    return regex.test(email) ? "" : "Please enter a valid email.";
  };

  const validatePassword = (password) => {
    const minLength = 6;
    const hasUpperCase = /[A-Z]/;
    const hasLetter = /[a-zA-Z]/;

    if (password.length < minLength) {
      return "Password must be at least 6 characters long.";
    } else if (!hasUpperCase.test(password)) {
      return "Password must contain at least one uppercase letter.";
    } else if (!hasLetter.test(password)) {
      return "Password must contain at least one letter.";
    }
    return "";
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (
      Object.values(errors).some((error) => error !== "") ||
      Object.values(formData).some((field) => field === "")
    ) {
      return;
    }
    alert("Form submitted successfully");
  };

  return (
    <div
      className="login-container"
      style={{
        maxWidth: "900px",
        margin: "50px auto",
        border: "1px solid #ddd",
        borderRadius: "10px",
        overflow: "hidden",
        boxShadow: "0 4px 6px rgba(0, 0, 0, 0.1)",
      }}
    >
      <div className="modal-dialog modal-xl login-pop-form">
        <div className="modal-content overli">
          <div className="modal-body p-0">
            <div className="resp_log_wrap">
              <div
                className="resp_log_thumb"
                style={{
                  background: "url(assets/img/slider-3.jpg) no-repeat center",
                  backgroundSize: "cover",
                }}
              ></div>
              <div className="resp_log_caption">
                <div className="edlio_152">
                  <ul
                    className="nav nav-pills tabs_system center"
                    id="pills-tab"
                    role="tablist"
                  >
                    <li className="nav-item">
                      <button
                        className="nav-link active"
                        id="pills-login-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-login"
                        role="tab"
                        aria-controls="pills-login"
                        aria-selected="true"
                      >
                        <i className="fas fa-sign-in-alt me-2"></i>Login
                      </button>
                    </li>
                    <li className="nav-item">
                      <button
                        className="nav-link"
                        id="pills-signup-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-signup"
                        role="tab"
                        aria-controls="pills-signup"
                        aria-selected="false"
                      >
                        <i className="fas fa-user-plus me-2"></i>Register
                      </button>
                    </li>
                  </ul>
                </div>
                <div className="tab-content" id="pills-tabContent">
                  <div
                    className="tab-pane fade show active"
                    id="pills-login"
                    role="tabpanel"
                    aria-labelledby="pills-login-tab"
                  >
                    <div className="login-form">
                      <form onSubmit={handleSubmit}>
                        <div className="form-group">
                          <label>Email</label>
                          <div className="input-with-icon">
                            <input
                              type="text"
                              className={`form-control ${
                                errors.email ? styles.errorInput : ""
                              }`}
                              placeholder="Enter your Email"
                              name="email"
                              value={formData.email}
                              onChange={handleChange}
                            />
                            <i className="ti-user"></i>
                          </div>
                          {errors.email && (
                            <span className={styles.error}>{errors.email}</span>
                          )}
                        </div>
                        <div className="form-group">
                          <label>Password</label>
                          <div className="input-with-icon">
                            <input
                              type="password"
                              className={`form-control ${
                                errors.password ? styles.errorInput : ""
                              }`}
                              placeholder="Enter your Password"
                              name="password"
                              value={formData.password}
                              onChange={handleChange}
                            />
                            <i className="ti-unlock"></i>
                          </div>
                          {errors.password && (
                            <span className={styles.error}>
                              {errors.password}
                            </span>
                          )}
                        </div>
                        <div className="form-group">
                          <button
                            type="submit"
                            className="btn btn-danger fw-medium full-width"
                            disabled={
                              Object.values(errors).some(
                                (error) => error !== ""
                              ) ||
                              Object.values(formData).some(
                                (field) => field === ""
                              )
                            }
                          >
                            Login
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div
                    className="tab-pane fade"
                    id="pills-signup"
                    role="tabpanel"
                    aria-labelledby="pills-signup-tab"
                  >
                    <div className="login-form">
                      <form onSubmit={handleSubmit}>
                        <div className="form-group">
                          <label>Full Name</label>
                          <div className="input-with-icon">
                            <input
                              type="text"
                              className={`form-control ${
                                errors.fullName ? styles.errorInput : ""
                              }`}
                              placeholder="Enter your Name"
                              name="fullName"
                              value={formData.fullName}
                              onChange={handleChange}
                            />
                            <i className="ti-user"></i>
                          </div>
                          {errors.fullName && (
                            <span className={styles.error}>
                              {errors.fullName}
                            </span>
                          )}
                        </div>
                        <div className="form-group">
                          <label>Email ID</label>
                          <div className="input-with-icon">
                            <input
                              type="email"
                              className={`form-control ${
                                errors.email ? styles.errorInput : ""
                              }`}
                              placeholder="Enter your Email"
                              name="email"
                              value={formData.email}
                              onChange={handleChange}
                            />
                            <i className="ti-user"></i>
                          </div>
                          {errors.email && (
                            <span className={styles.error}>{errors.email}</span>
                          )}
                        </div>
                        <div className="form-group">
                          <label>Password</label>
                          <div className="input-with-icon">
                            <input
                              type="password"
                              className={`form-control ${
                                errors.password ? styles.errorInput : ""
                              }`}
                              placeholder="Enter your Password"
                              name="password"
                              value={formData.password}
                              onChange={handleChange}
                            />
                            <i className="ti-unlock"></i>
                          </div>
                          {errors.password && (
                            <span className={styles.error}>
                              {errors.password}
                            </span>
                          )}
                        </div>
                        <div className="form-group">
                          <label>Confirm Password</label>
                          <div className="input-with-icon">
                            <input
                              type="password"
                              className={`form-control ${
                                errors.confirmPassword ? styles.errorInput : ""
                              }`}
                              placeholder="Confirm your Password"
                              name="confirmPassword"
                              value={formData.confirmPassword}
                              onChange={handleChange}
                            />
                            <i className="ti-unlock"></i>
                          </div>
                          {errors.confirmPassword && (
                            <span className={styles.error}>
                              {errors.confirmPassword}
                            </span>
                          )}
                        </div>
                        <div className="form-group">
                          <button
                            type="submit"
                            className="btn btn-danger fw-medium full-width"
                            disabled={
                              Object.values(errors).some(
                                (error) => error !== ""
                              ) ||
                              Object.values(formData).some(
                                (field) => field === ""
                              )
                            }
                          >
                            Register
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Auth;
