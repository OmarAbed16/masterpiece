// src/components/header/Header.js
import React, { useState, useEffect, useContext } from "react";
import { Link, useNavigate } from "react-router-dom";
import Swal from "sweetalert2";
import AuthContext from "../../pages/AuthContext"; // Adjust the import path accordingly

const Header = ({ favoriteCount }) => {
  const [isMobileNavOpen, setIsMobileNavOpen] = useState(false);
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const { user, setUser } = useContext(AuthContext);
  const navigate = useNavigate();
  const profileImage =
    user && user.profile_image
      ? user.profile_image
      : "http://127.0.0.1:8000/assets/default_images/default_image.png";
  useEffect(() => {
    setIsLoggedIn(!!user);
  }, [user]);

  const toggleMobileNav = () => {
    setIsMobileNavOpen(!isMobileNavOpen);
  };

  const handleLogout = (event) => {
    event.preventDefault();
    setUser(null);
    sessionStorage.removeItem("user");

    Swal.fire({
      title: "Success",
      text: "You have logged out successfully!",
      icon: "success",
      confirmButtonText: "OK",
    }).then(() => {
      navigate("/"); // Redirect to homepage after logout
    });
  };

  return (
    <>
      <div className="header header-light" style={{ padding: "0px" }}>
        <div className="container">
          <nav id="navigation" className="navigation navigation-landscape">
            <div className="nav-header">
              <Link className="nav-brand" to="/">
                <img src="assets/img/logo.png" className="logo" alt="Logo" />
              </Link>
              <div className="nav-toggle" onClick={toggleMobileNav}></div>
              <div className={`mobile_nav ${isMobileNavOpen ? "open" : ""}`}>
                <ul>
                  {isLoggedIn ? (
                    <>
                      <li>
                        <Link onClick={handleLogout}>
                          <i className="fas fa-sign-out-alt me-1"></i>
                          <span className="dn-lg">Logout</span>
                        </Link>
                      </li>
                    </>
                  ) : (
                    <>
                      <li>
                        <Link to="/login" className="alio_green">
                          <i className="fas fa-sign-in-alt me-1"></i>
                          <span className="dn-lg">Sign In</span>
                        </Link>
                      </li>
                      <li>
                        <Link to="/register" className="alio_green">
                          <i className="fas fa-user-plus me-1"></i>
                          <span className="dn-lg">Sign Up</span>
                        </Link>
                      </li>
                    </>
                  )}
                </ul>
              </div>
            </div>

            <div
              className="nav-menus-wrapper"
              style={{ transitionProperty: "none" }}
            >
              <ul className="nav-menu">
                <li className="active">
                  <Link to="/">Home</Link>
                </li>
                <li>
                  <Link to="/search">Listings</Link>
                </li>

                <li>
                  <Link to="/about">About us</Link>
                </li>
                <li>
                  <Link to="/contact">Contact us</Link>
                </li>
              </ul>

              <ul className="nav-menu nav-menu-social align-to-right">
                {isLoggedIn ? (
                  <>
                    <li className="_my_prt_list">
                      <Link to="/profile?page=favourite" data-discover="true">
                        <span>{favoriteCount}</span> My List
                      </Link>
                    </li>

                    <li>
                      <Link to="/profile">
                        <i>
                          <img
                            style={{
                              width: "50px",
                              height: "50px",
                              borderRadius: "50%",
                            }}
                            src={profileImage}
                            className="logo"
                            alt="Logo"
                          />
                        </i>
                      </Link>
                      <ul
                        className="nav-dropdown nav-submenu"
                        style={{ display: "none" }}
                      >
                        <li>
                          <Link to="/profile">
                            <i className="fas fa-user me-1"></i>
                            <span className="dn-lg">My Profile</span>
                          </Link>
                        </li>

                        <li>
                          <Link onClick={handleLogout}>
                            <i className="fas fa-sign-out-alt me-1"></i>
                            <span className="dn-lg">Logout</span>
                          </Link>
                        </li>
                      </ul>
                    </li>
                  </>
                ) : (
                  <>
                    <li>
                      <Link to="/login" className="alio_green">
                        <i className="fas fa-sign-in-alt me-1"></i>
                        <span className="dn-lg">Sign In</span>
                      </Link>
                    </li>
                    <li>
                      <Link to="/register" className="alio_green">
                        <i className="fas fa-user-plus me-1"></i>
                        <span className="dn-lg">Sign Up</span>
                      </Link>
                    </li>
                  </>
                )}
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div className="clearfix"></div>
    </>
  );
};

export default Header;
