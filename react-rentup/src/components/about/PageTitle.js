// PageTitle.js
import React from "react";

const PageTitle = ({ title, backgroundImage, overlay }) => {
  return (
    <div
      className="page-title"
      style={{
        background: `url(../assets/img/bg.jpg)`,
        backgroundOverlay: `data-overlay=${overlay}`,
      }}
    >
      <div className="container">
        <div className="row">
          <div className="col-lg-12 col-md-12">
            <div className="breadcrumbs-wrap position-relative z-1">
              <ol className="breadcrumb">
                <li className="breadcrumb-item active" aria-current="page">
                  About Us
                </li>
              </ol>
              <h2 style={{ color: "white" }} className="breadcrumb-title">
                {title}
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default PageTitle;
