import React from "react";

const PageTitle = () => {
  return (
    <div
      className="page-title"
      style={{ background: "#f4f4f4 url(assets/img/slider-3.jpg)" }}
      data-overlay="5"
    >
      <div className="ht-80"></div>
      <div className="container">
        <div className="row">
          <div className="col-lg-12 col-md-12 position-relative z-1">
            <div className="_page_tetio">
              <div className="pledtio_wrap">
                <span>Get In Touch</span>
              </div>
              <h2 className="text-light mb-0">Get Helps & Friendly Support</h2>
              <p>
                Looking for help or any support? We are available 24 hours a
                day.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div className="ht-120"></div>
    </div>
  );
};

export default PageTitle;
