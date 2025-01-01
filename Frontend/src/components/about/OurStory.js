// OurStory.js
import React from "react";

const OurStory = () => {
  return (
    <section>
      <div className="container">
        <div className="row align-items-center">
          <div className="col-lg-6 col-md-6">
            <div className="story-wrap explore-content">
              <h2 className="mb-3 fw-bold">Our Agency Story</h2>
              <span className="text-muted fs-5">
                Discover the journey behind DarLink and how it connects people,
                especially foreign students, to enhance their study and
                lifestyle in Jordan.
              </span>
              <p className="mt-4">
                My name is Omar Fathi, and DarLink is my project—a platform
                designed to help people, particularly foreign students coming to
                Jordan to study, find suitable rental accommodations. The core
                of our proposition is to connect individuals who have similar
                preferences so they can live together. This not only enhances
                their academic experience but also improves their overall
                lifestyle. We also prepare rental spaces with all necessary
                tools and amenities, ensuring they feel comfortable and at home.
              </p>
              <a
                href="https://www.linkedin.com/in/omarabed-/"
                target="_blank"
                className="btn btn-danger"
              >
                More About Us
              </a>
            </div>
          </div>

          <div className="col-lg-6 col-md-6">
            <img
              src="assets/default_images/owner.jpeg"
              className="img-fluid rounded"
              alt="Omar Fathi's Project"
            />
          </div>
        </div>
      </div>
    </section>
  );
};

export default OurStory;
