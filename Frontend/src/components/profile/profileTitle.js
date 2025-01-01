import React from "react";

const ProfileTitle = ({ title }) => {
  return (
    <div
      className="page-title"
      style={{ background: "#f4f4f4 url(assets/img/slider-5.jpg)" }}
      data-overlay={5}
    >
      <div className="container">
        <div className="row">
          <div className="col-lg-12 col-md-12">
            <div className="breadcrumbs-wrap position-relative z-1">
              <ol className="breadcrumb">
                <li className="breadcrumb-item active" aria-current="page">
                  My Profile
                </li>
              </ol>
              <h2 className="breadcrumb-title">My Account &amp; Profile</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProfileTitle;
