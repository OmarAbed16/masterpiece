// src/components/header/Header.js
import React, { useState } from "react";

const Header = () => {
  const [isMobileNavOpen, setIsMobileNavOpen] = useState(false);

  const toggleMobileNav = () => {
    setIsMobileNavOpen(!isMobileNavOpen);
  };

  return (
    <div className="header header-light">
      <div className="container">
        <nav id="navigation" className="navigation navigation-landscape">
          <div className="nav-header">
            <a className="nav-brand" href="#">
              <img src="assets/img/logo.png" className="logo" alt="Logo" />
            </a>
            <div className="nav-toggle" onClick={toggleMobileNav}></div>
            <div className={`mobile_nav ${isMobileNavOpen ? "open" : ""}`}>
              <ul>
                <li className="_my_prt_list">
                  <a href="#">
                    <span>2</span>My List
                  </a>
                </li>
                <li>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#login">
                    <i className="fas fa-user-circle fa-lg"></i>
                  </a>
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
                <a href="/">
                  Home<span className="submenu-indicator"></span>
                </a>
              </li>
              <li>
                <a href="#">
                  Listings<span className="submenu-indicator"></span>
                </a>
                <ul className="nav-dropdown nav-submenu">
                  <li>
                    <a href="#">
                      Listing Grid<span className="submenu-indicator"></span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Listing Grid<span className="submenu-indicator"></span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">
                  Property<span className="submenu-indicator"></span>
                </a>
                <ul className="nav-dropdown nav-submenu">
                  <li>
                    <a href="#">
                      User Admin<span className="submenu-indicator"></span>
                    </a>
                    <ul className="nav-dropdown nav-submenu">
                      <li>
                        <a href="dashboard.html">User Dashboard</a>
                      </li>
                      <li>
                        <a href="my-profile.html">My Profile</a>
                      </li>
                      <li>
                        <a href="my-property.html">My Property</a>
                      </li>
                      <li>
                        <a href="messages.html">Messages</a>
                      </li>
                      <li>
                        <a href="bookmark-list.html">Bookmark Property</a>
                      </li>
                      <li>
                        <a href="submit-property.html">Submit Property</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">
                      Single Property<span className="submenu-indicator"></span>
                    </a>
                    <ul className="nav-dropdown nav-submenu">
                      <li>
                        <a href="single-property-1.html">Single Property 1</a>
                      </li>
                      <li>
                        <a href="single-property-2.html">Single Property 2</a>
                      </li>
                      <li>
                        <a href="single-property-3.html">Single Property 3</a>
                      </li>
                      <li>
                        <a href="single-property-4.html">Single Property 4</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="compare-property.html">Compare Property</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">
                  Pages<span className="submenu-indicator"></span>
                </a>
                <ul className="nav-dropdown nav-submenu">
                  <li>
                    <a href="blog.html">Blog Style</a>
                  </li>
                  <li>
                    <a href="about-us.html">About Us</a>
                  </li>
                  <li>
                    <a href="pricing.html">Pricing</a>
                  </li>
                  <li>
                    <a href="404.html">404 Page</a>
                  </li>
                  <li>
                    <a href="checkout.html">Checkout</a>
                  </li>
                  <li>
                    <a href="contact.html">Contact</a>
                  </li>
                  <li>
                    <a href="component.html">Elements</a>
                  </li>
                  <li>
                    <a href="privacy.html">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="faq.html">FAQs</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="/">
                  About us<span className="submenu-indicator"></span>
                </a>
              </li>
              <li>
                <a href="/contact">
                  Contact us<span className="submenu-indicator"></span>
                </a>
              </li>
            </ul>

            <ul className="nav-menu nav-menu-social align-to-right">
              <li>
                <a
                  href="#"
                  className="alio_green"
                  data-bs-toggle="modal"
                  data-bs-target="#login"
                >
                  <i className="fas fa-sign-in-alt me-1"></i>
                  <span className="dn-lg">Sign In</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  );
};

export default Header;
