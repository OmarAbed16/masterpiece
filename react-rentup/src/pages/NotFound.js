import React from "react";
import { Link } from "react-router-dom";

const NotFound = () => {
  return (
    <section className="error-wrap">
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-lg-6 col-md-10">
            <div className="text-center">
              <img
                src="/assets/img/404.png"
                className="img-fluid"
                alt="404 Not Found"
              />
              <h2>Oops! Page Not Found</h2>
              <p>
                It looks like you've reached a dead end. The page you’re looking
                for might have been moved, deleted, or never existed.
              </p>
              <Link to="/" className="btn btn-danger">
                Back To Home
              </Link>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default NotFound;
