// src/components/footer/Footer.js
import React, { useState } from "react";

const Footer = () => {
  const [email, setEmail] = useState("");

  const handleEmailChange = (e) => {
    setEmail(e.target.value);
  };

  const handleSubscribe = () => {
    console.log("Subscribed with email: ", email);
    // Handle subscription logic here
  };

  return (
    <footer className="dark-footer skin-dark-footer style-2">
      <div className="footer-middle">
        <div className="container">
          <div className="row">
            <div className="col-lg-5 col-md-5">
              <div className="footer_widget">
                <img
                  src="assets/img/logo-light.png"
                  className="img-footer small mb-4"
                  alt="Logo"
                />
                <h4 className="extream mb-3">
                  Do you need help with
                  <br />
                  anything?
                </h4>
                <p>
                  Receive updates, hot deals, tutorials, discounts sent straight
                  to your inbox every month
                </p>
                <div className="foot-news-last mt-4">
                  <div className="input-group">
                    <input
                      type="text"
                      className="form-control"
                      placeholder="Email Address"
                      value={email}
                      onChange={handleEmailChange}
                    />
                    <div className="input-group-append">
                      <button
                        type="button"
                        className="btn btn-danger b-0 text-light"
                        onClick={handleSubscribe}
                      >
                        Subscribe
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className="col-lg-6 col-md-7 ms-auto">
              <div className="row">
                <div className="col-lg-4 col-md-4">
                  <div className="footer_widget">
                    <h4 className="widget_title">Layouts</h4>
                    <ul className="footer-menu">
                      <li>
                        <a href="#">Home Page</a>
                      </li>
                      <li>
                        <a href="#">About Page</a>
                      </li>
                      <li>
                        <a href="#">Service Page</a>
                      </li>
                      <li>
                        <a href="#">Property Page</a>
                      </li>
                      <li>
                        <a href="#">Contact Page</a>
                      </li>
                      <li>
                        <a href="#">Single Blog</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div className="col-lg-4 col-md-4">
                  <div className="footer_widget">
                    <h4 className="widget_title">All Sections</h4>
                    <ul className="footer-menu">
                      <li>
                        <a href="#">
                          Headers<span className="new">New</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Features</a>
                      </li>
                      <li>
                        <a href="#">
                          Attractive<span className="new">New</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Testimonials</a>
                      </li>
                      <li>
                        <a href="#">Videos</a>
                      </li>
                      <li>
                        <a href="#">Footers</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div className="col-lg-4 col-md-4">
                  <div className="footer_widget">
                    <h4 className="widget_title">Company</h4>
                    <ul className="footer-menu">
                      <li>
                        <a href="#">About</a>
                      </li>
                      <li>
                        <a href="#">Blog</a>
                      </li>
                      <li>
                        <a href="#">Pricing</a>
                      </li>
                      <li>
                        <a href="#">Affiliate</a>
                      </li>
                      <li>
                        <a href="#">Login</a>
                      </li>
                      <li>
                        <a href="#">
                          Changelog<span className="update">Update</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="footer-bottom">
        <div className="container">
          <div className="row align-items-center">
            <div className="col-lg-12 col-md-12 text-center">
              <p className="mb-0">
                © 2023 RentUP. Designed By{" "}
                <a href="https://themezhub.com/">ThemezHub</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
