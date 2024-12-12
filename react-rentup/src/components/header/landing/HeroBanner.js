import React from "react";

const HeroBanner = () => {
  return (
    <div className="hero-banner vedio-banner">
      <div className="overlay"></div>

      <video
        playsInline="playsinline"
        autoPlay="autoplay"
        muted="muted"
        loop="loop"
      >
        <source src="assets/img/banners.mp4" type="video/mp4" />
      </video>

      <div className="container">
        <div className="row justify-content-center">
          <div className="col-xl-12 col-lg-12 col-md-12">
            <h1 className="big-header-capt mb-0 text-light">
              Search Your Next Home
            </h1>
            <p className="text-center mb-4 text-light">
              Find new & featured property located in your local city.
            </p>
          </div>
        </div>

        <div className="row">
          <div className="col-xl-12 col-lg-12 col-md-12">
            <div className="simple_tab_search center">
              <div className="tab-content" id="myTabContent">
                <div
                  className="tab-pane fade show active"
                  id="rent"
                  role="tabpanel"
                  aria-labelledby="rent-tab"
                >
                  <div className="full_search_box nexio_search lightanic_search hero_search-radius modern">
                    <div className="search_hero_wrapping">
                      <div className="row">
                        <div className="col-lg-8 col-sm-12 d-md-none d-lg-block">
                          <div className="form-group">
                            <label>Price Range</label>
                            <input
                              type="text"
                              className="form-control search_input border-0"
                              placeholder="ex. Neighborhood"
                            />
                          </div>
                        </div>

                        <div className="col-lg-2 col-md-3 col-sm-12">
                          <div className="form-group none">
                            <a
                              className="collapsed ad-search"
                              data-bs-toggle="collapse"
                              data-parent="#search"
                              data-bs-target="#advance-search-2"
                              href="javascript:void(0);"
                              aria-expanded="false"
                              aria-controls="advance-search"
                            >
                              <i className="fa fa-sliders-h me-2"></i>Advance
                              Filter
                            </a>
                          </div>
                        </div>

                        <div className="col-lg-2 col-md-3 col-sm-12 small-padd">
                          <div className="form-group none">
                            <a href="#" className="btn btn-danger full-width">
                              Search Property
                            </a>
                          </div>
                        </div>
                      </div>

                      <div
                        className="collapse"
                        id="advance-search-2"
                        aria-expanded="false"
                        role="banner"
                      >
                        <div className="row">
                          <div className="col-lg-3 col-md-6 col-sm-6">
                            <div className="form-group none style-auto">
                              <select id="bedrooms2" className="form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                          </div>

                          <div className="col-lg-3 col-md-6 col-sm-6">
                            <div className="form-group none style-auto">
                              <select id="bathrooms2" className="form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                          </div>

                          <div className="col-lg-3 col-md-6 col-sm-6">
                            <div className="form-group none">
                              <input
                                type="text"
                                className="form-control"
                                placeholder="min sqft"
                              />
                            </div>
                          </div>

                          <div className="col-lg-3 col-md-6 col-sm-6">
                            <div className="form-group none">
                              <input
                                type="text"
                                className="form-control"
                                placeholder="max sqft"
                              />
                            </div>
                          </div>
                        </div>

                        <div className="row">
                          <div className="col-lg-12 col-md-12 col-sm-12 mt-2">
                            <h6>Advance Price</h6>
                            <div className="rg-slider">
                              <input
                                type="text"
                                className="js-range-slider"
                                name="my_range"
                                value=""
                              />
                            </div>
                          </div>
                        </div>

                        <div className="row">
                          <div className="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <h4 className="text-dark">Amenities & Features</h4>
                            <ul className="no-ul-list third-row">
                              <li>
                                <input
                                  id="a-a1"
                                  className="form-check-input"
                                  name="a-a1"
                                  type="checkbox"
                                />
                                <label
                                  htmlFor="a-a1"
                                  className="form-check-label"
                                >
                                  Air Condition
                                </label>
                              </li>
                              {/* Add other amenities here */}
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default HeroBanner;
