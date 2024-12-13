import React, { useState } from "react";
import { Link } from "react-router-dom"; // Import Link from React Router

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
                        <Link to="/">Home Page</Link>
                      </li>

                      <li>
                        <Link to="/login">Login Page</Link>
                      </li>
                      <li>
                        <Link to="/register">Register Page</Link>
                      </li>
                      <li>
                        <Link to="/about">About Page</Link>
                      </li>
                      <li>
                        <Link to="/contact">Contact Page</Link>
                      </li>
                    </ul>
                  </div>
                </div>

                <div className="col-lg-4 col-md-4">
                  <div className="footer_widget">
                    <h4 className="widget_title">All Sections</h4>
                    <ul className="footer-menu">
                      <li>
                        <Link to="#">
                          Headers<span className="new">New</span>
                        </Link>
                      </li>
                      <li>
                        <Link to="#">Features</Link>
                      </li>
                      <li>
                        <Link to="#">
                          Attractive<span className="new">New</span>
                        </Link>
                      </li>
                      <li>
                        <Link to="#">Testimonials</Link>
                      </li>
                      <li>
                        <Link to="#">Videos</Link>
                      </li>
                      <li>
                        <Link to="#">Footers</Link>
                      </li>
                    </ul>
                  </div>
                </div>

                <div className="col-lg-4 col-md-4">
                  <div className="footer_widget">
                    <h4 className="widget_title">Company</h4>
                    <ul className="footer-menu">
                      <li>
                        <Link to="#">About</Link>
                      </li>
                      <li>
                        <Link to="#">Blog</Link>
                      </li>
                      <li>
                        <Link to="#">Pricing</Link>
                      </li>
                      <li>
                        <Link to="#">Affiliate</Link>
                      </li>
                      <li>
                        <Link to="#">Login</Link>
                      </li>
                      <li>
                        <Link to="#">
                          Changelog<span className="update">Update</span>
                        </Link>
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
                © {new Date().getFullYear()} RentUP. Designed By{" "}
                <Link to="https://themezhub.com/">ThemezHub</Link>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
