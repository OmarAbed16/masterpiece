import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import Hikaya3d from "../layouts/hikaya3d";

const HeroBanner = () => {
  const [filters, setFilters] = useState({
    location: "",
    governorate: "",
    bed: "",
    bath: "",
    sqft_min: "",
    sqft_max: "",
  });

  const [advancedFilterVisible, setAdvancedFilterVisible] = useState(false);

  const governorates = [
    "Amman",
    "Zarqa",
    "Irbid",
    "Mafraq",
    "Ajloun",
    "Jerash",
    "Maan",
    "Tafilah",
    "Karak",
    "Madaba",
    "Aqaba",
    "Balqa",
  ];

  const navigate = useNavigate();

  const handleChange = (event) => {
    const { name, value } = event.target;
    setFilters({
      ...filters,
      [name]: value,
    });
  };

  const handleSearch = () => {
    navigate(
      `/search?location=${filters.location}&bed=${filters.bed}&bath=${filters.bath}&sqft_min=${filters.sqft_min}&sqft_max=${filters.sqft_max}&governorate=${filters.governorate}`
    );
  };

  const handleToggleAdvancedFilter = (event) => {
    event.preventDefault();
    setAdvancedFilterVisible(!advancedFilterVisible);
  };

  return (
    <div className="hero-banner vedio-banner">
      <Hikaya3d />

      <div className="container">
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
                        <div className="col-lg-3 col-sm-12 d-md-none d-lg-block">
                          <div className="form-group">
                            <label>Price Range</label>
                            <input
                              type="text"
                              className="form-control search_input border-0"
                              placeholder="ex. Neighborhood"
                              value={filters.location}
                              onChange={handleChange}
                              name="location"
                            />
                          </div>
                        </div>

                        <div className="col-lg-3 col-md-3 col-sm-12">
                          <div className="form-group">
                            <label>Governorate</label>
                            <div className="input-with-icon">
                              <select
                                id="lot-2"
                                className="form-control"
                                name="governorate"
                                value={filters.governorate}
                                onChange={handleChange}
                              >
                                <option value="">Select Governorate</option>
                                {governorates.map((gov, index) => (
                                  <option key={index} value={gov}>
                                    {gov}
                                  </option>
                                ))}
                              </select>
                            </div>
                          </div>
                        </div>

                        <div className="col-lg-2 col-md-3 col-sm-12">
                          <div className="form-group">
                            <label>Bedrooms</label>
                            <div className="input-with-icon">
                              <select
                                id="bedrooms"
                                className="form-control"
                                name="bed"
                                value={filters.bed}
                                onChange={handleChange}
                              >
                                <option value="0">Choose Bed Numbers</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">More than 3</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div className="col-lg-2 col-md-3 col-sm-12">
                          <div className="form-group">
                            <a
                              className="collapsed ad-search"
                              data-bs-toggle="collapse"
                              data-parent="#search"
                              data-bs-target="#advance-search-2"
                              href="javascript:void(0);"
                              aria-expanded="false"
                              aria-controls="advance-search"
                              onClick={handleToggleAdvancedFilter}
                            >
                              <i className="fa fa-sliders-h me-2"></i>Advance
                              Filter
                            </a>
                          </div>
                        </div>

                        <div className="col-lg-2 col-md-3 col-sm-12 small-padd">
                          <div className="form-group none">
                            <button
                              onClick={handleSearch}
                              className="btn btn-danger full-width"
                            >
                              Search Property
                            </button>
                          </div>
                        </div>
                      </div>

                      <div
                        className={`collapse ${
                          advancedFilterVisible ? "show" : ""
                        }`}
                        id="advance-search-2"
                        aria-expanded={advancedFilterVisible}
                        role="banner"
                      >
                        <div className="row">
                          <div className="col-lg-4 col-md-6 col-sm-6">
                            <div className="form-group">
                              <select
                                id="bathrooms"
                                className="form-control"
                                name="bath"
                                value={filters.bath}
                                onChange={handleChange}
                              >
                                <option value="0">
                                  Choose Bathroom Numbers
                                </option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">More than 3</option>
                              </select>
                            </div>
                          </div>

                          <div className="col-lg-4 col-md-6 col-sm-6">
                            <div className="form-group">
                              <input
                                type="number"
                                className="form-control"
                                placeholder="min sqft"
                                value={filters.sqft_min}
                                onChange={handleChange}
                                name="sqft_min"
                              />
                            </div>
                          </div>

                          <div className="col-lg-4 col-md-12 col-sm-12">
                            <div className="form-group">
                              <input
                                type="number"
                                className="form-control"
                                placeholder="max sqft"
                                value={filters.sqft_max}
                                onChange={handleChange}
                                name="sqft_max"
                              />
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
    </div>
  );
};

export default HeroBanner;
