import React, { useState } from "react";
import { Link } from "react-router-dom";
import GoogleMap from "../contact/GoogleMap";
import Swal from "sweetalert2";
import axios from "axios";
const Footer = () => {
  const [email, setEmail] = useState("");

  const handleEmailChange = (e) => {
    setEmail(e.target.value);
  };

  const handleSubscribe = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);

    formData.append("access_key", "81e74902-df9c-42b7-a2cb-2702b3ede709");

    const object = Object.fromEntries(formData);
    const json = JSON.stringify(object);

    const res = await fetch("https://api.web3forms.com/submit", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: json,
    }).then((res) => res.json());

    if (res.success) {
      Swal.fire({
        title: "Success!",
        text: "Message sent successfully",
        icon: "success",
      }).then(() => {
        axios
          .post(`${process.env.REACT_APP_API_URL}/subscribe/add`, {
            email: JSON.parse(json).email,
          })
          .then((response) => console.log(response.data))
          .catch((error) => console.error("Error:", error));
      });
    } else {
      Swal.fire({
        title: "Failed!",
        text: "Message failed!",
        icon: "error",
      });
    }
  };

  return (
    <footer className="dark-footer skin-dark-footer style-2">
      <div className="footer-middle">
        <div className="container">
          <div className="row">
            <div className="col-lg-5 col-md-5">
              <div className="footer_widget">
                <img
                  src="assets/default_images/logo9.png"
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
                  <form onSubmit={handleSubscribe}>
                    <div className="input-group">
                      <input
                        type="text"
                        className="form-control"
                        placeholder="Email Address"
                        value={email}
                        onChange={handleEmailChange}
                        id="email"
                        name="email"
                      />
                      <div className="input-group-append">
                        <button
                          type="submit"
                          className="btn btn-danger b-0 text-light"
                        >
                          Subscribe
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div className="col-lg-6 col-md-7 ms-auto">
              <div className="row">
                <div className="col-lg-3 col-md-4">
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

                <div className="col-lg-9 col-md-8">
                  <div className="footer_widget">
                    <h4 className="widget_title">All Sections</h4>
                    <GoogleMap colLg={12} colMd={12} height={"300px"} />
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
                © {new Date().getFullYear()} DarLink. Designed By{" "}
                <Link to="/about">Omar Fathi</Link>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
