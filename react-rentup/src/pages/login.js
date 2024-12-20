// src/pages/Login.js
import React, { useState, useContext } from "react";
import styles from "./Auth.module.css";
import { useNavigate, Link } from "react-router-dom";
import Swal from "sweetalert2";
import axios from "axios";
import AuthContext from "../pages/AuthContext"; // Import your AuthContext
import { GoogleLogin } from "@react-oauth/google";
import { jwtDecode } from "jwt-decode";

const Login = () => {
  const [formData, setFormData] = useState({
    email: "",
    password: "",
  });
  const [errors, setErrors] = useState({
    email: "",
    password: "",
  });
  const [activeTab, setActiveTab] = useState("login");
  const navigate = useNavigate();
  const { login } = useContext(AuthContext); // Use the AuthContext

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevState) => ({
      ...prevState,
      [name]: value,
    }));

    validateField(name, value);
  };

  const validateField = (name, value) => {
    switch (name) {
      case "email":
        setErrors({ ...errors, email: validateEmail(value) });
        break;
      case "password":
        setErrors({ ...errors, password: validatePassword(value) });
        break;
      default:
        break;
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

  // Reusable login function
  const loginUser = async (data) => {
    try {
      const response = await axios.post(
        `${process.env.REACT_APP_API_URL}/login`,
        data
      );

      if (response.status === 200) {
        login(response.data.user); // Set session data using the login function from AuthContext

        Swal.fire({
          icon: "success",
          title: "Login Successful",
          text: `Welcome, ${response.data.user.name}`,
        });

        navigate("/search");
      } else {
        Swal.fire({
          icon: "error",
          title: "Login Failed",
          text: response.data.message || "An error occurred. Please try again.",
        });
      }
    } catch (error) {
      Swal.fire({
        icon: "error",
        title: "Login Failed",
        text:
          error.response.data.message ||
          "An unexpected error occurred. Please try again later.",
      });
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (
      Object.values(errors).some((error) => error !== "") ||
      Object.values(formData).some((field) => field === "")
    ) {
      return;
    }

    // Call loginUser for form-based login
    loginUser(formData);
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
                        className={`nav-link ${
                          activeTab === "login" ? "active" : ""
                        }`}
                        id="pills-login-tab"
                        onClick={() => setActiveTab("login")}
                      >
                        <i className="fas fa-sign-in-alt me-2"></i>Login
                      </button>
                    </li>
                    <li className="nav-item">
                      <Link
                        to="/register"
                        style={{ cursor: "pointer" }}
                        className={`nav-link ${
                          activeTab === "signup" ? "active" : ""
                        }`}
                        onClick={() => setActiveTab("signup")}
                      >
                        <i className="fas fa-user-plus me-2"></i>Register
                      </Link>
                    </li>
                  </ul>
                </div>
                <div className="tab-content" id="pills-tabContent">
                  <div
                    className={`tab-pane fade ${
                      activeTab === "login" ? "show active" : ""
                    }`}
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

                      <div
                        style={{
                          display: "flex",
                          justifyContent: "center",
                          alignItems: "center",
                          flexDirection: "column",
                          textAlign: "center",
                        }}
                      >
                        <label>or</label>
                        <GoogleLogin
                          onSuccess={(credentialResponse) => {
                            const decoded = jwtDecode(
                              credentialResponse?.credential
                            );
                            console.log(decoded);
                            // Call loginUser with Google credentials
                            loginUser({
                              email: decoded.email,
                              password: "Google@2024", // or any value you want
                            });
                          }}
                          onError={() => {
                            console.log("Login Failed");
                          }}
                        />
                      </div>
                    </div>
                  </div>
                  <div
                    className={`tab-pane fade ${
                      activeTab === "signup" ? "show active" : ""
                    }`}
                    id="pills-signup"
                    role="tabpanel"
                    aria-labelledby="pills-signup-tab"
                  >
                    {/* Signup Form or other content can go here */}
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

export default Login;
