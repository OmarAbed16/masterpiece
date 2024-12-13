import React, { useState } from "react";
import { Link } from "react-router-dom"; // Import Link from react-router-dom

const Header = () => {
  const [isMobileNavOpen, setIsMobileNavOpen] = useState(false);

  const toggleMobileNav = () => {
    setIsMobileNavOpen(!isMobileNavOpen);
  };

  return (
    <>
      <div className="header header-light">
        <div className="container">
          <nav id="navigation" className="navigation navigation-landscape">
            <div className="nav-header">
              <Link className="nav-brand" to="/">
                {/* Use Link for routing */}
                <img src="assets/img/logo.png" className="logo" alt="Logo" />
              </Link>
              <div className="nav-toggle" onClick={toggleMobileNav}></div>
              <div className={`mobile_nav ${isMobileNavOpen ? "open" : ""}`}>
                <ul>
                  <li className="_my_prt_list">
                    <Link to="#">
                      <span>2</span>My List
                    </Link>
                  </li>
                  <li>
                    <Link to="/login">
                      <i className="fas fa-user-circle fa-lg"></i>
                    </Link>
                  </li>
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
                  <Link to="#">Property</Link>
                </li>
                <li>
                  <Link to="/about">About us</Link>
                </li>
                <li>
                  <Link to="/contact">Contact us</Link>
                </li>
              </ul>

              <ul className="nav-menu nav-menu-social align-to-right">
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
