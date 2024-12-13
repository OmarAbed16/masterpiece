import React, { useState } from "react";

const Sidebar = () => {
  const [filters, setFilters] = useState({
    neighborhood: "",
    location: "",
    propertyType: "",
    status: "",
    price: "",
    bedrooms: "",
    bathrooms: "",
    garage: "",
    built: "",
    minArea: "",
    maxArea: "",
    features: {
      airCondition: false,
      bedding: false,
      heating: false,
      internet: false,
      microwave: false,
      smoking: false,
      terrace: false,
      balcony: false,
      icon: false,
    },
  });

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

  const handleChange = (event) => {
    const { name, value, type, checked } = event.target;
    if (type === "checkbox") {
      setFilters({
        ...filters,
        features: {
          ...filters.features,
          [name]: checked,
        },
      });
    } else {
      setFilters({
        ...filters,
        [name]: value,
      });
    }
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    // Handle form submission, e.g., send `filters` state to an API endpoint
    console.log("Filters:", filters);
  };

  return (
    <div className="col-lg-4 col-md-12 col-sm-12">
      <div className="page-sidebar p-0">
        <a
          className="filter_links"
          data-bs-toggle="collapse"
          href="#fltbox"
          role="button"
          aria-expanded="false"
          aria-controls="fltbox"
        >
          Open Advance Filter<i className="fa fa-sliders-h ms-2"></i>
        </a>
        <div className="collapse" id="fltbox">
          <div className="sidebar-widgets p-4">
            <div className="form-group">
              <div className="input-with-icon">
                <input
                  type="text"
                  className="form-control"
                  placeholder="Neighborhood"
                  name="neighborhood"
                  value={filters.neighborhood}
                  onChange={handleChange}
                />
                <i className="ti-search"></i>
              </div>
            </div>
            <div className="form-group">
              <div className="input-with-icon">
                <select
                  className="form-control"
                  name="location"
                  value={filters.location}
                  onChange={handleChange}
                >
                  <option value="">Select Location</option>
                  {governorates.map((gov, index) => (
                    <option key={index} value={gov}>
                      {gov}
                    </option>
                  ))}
                </select>
                <i className="ti-location-pin"></i>
              </div>
            </div>
            <div className="form-group">
              <div className="input-with-icon">
                <select
                  id="bedrooms"
                  className="form-control"
                  name="bedrooms"
                  value={filters.bedrooms}
                  onChange={handleChange}
                >
                  <option value="0">Choose Bed Numbers</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">More than 3</option>
                </select>
                <i className="fa fa-bed"></i>
              </div>
            </div>
            <div className="form-group">
              <div className="input-with-icon">
                <select
                  id="bathrooms"
                  className="form-control"
                  name="bathrooms"
                  value={filters.bathrooms}
                  onChange={handleChange}
                >
                  <option value="0">Choose Bathroom Numbers</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">More than 3</option>
                </select>
                <i className="fa fa-bath"></i>
              </div>
            </div>
            <div className="form-group">
              <div className="input-with-icon">
                <input
                  type="number"
                  className="form-control"
                  placeholder="Min Area"
                  name="minArea"
                  value={filters.minArea}
                  onChange={handleChange}
                />
                <i className="fa fa-expand-arrows-alt"></i>
              </div>
            </div>
            <div className="form-group">
              <div className="input-with-icon">
                <input
                  type="number"
                  className="form-control"
                  placeholder="Max Area"
                  name="maxArea"
                  value={filters.maxArea}
                  onChange={handleChange}
                />
                <i className="fa fa-expand-arrows-alt"></i>
              </div>
            </div>
            <div className="row">
              <div className="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                <h6>Choose Price</h6>
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
              <div className="col-lg-12 col-md-12 col-sm-12 pt-4">
                <h6>Advance Features</h6>
                <ul className="row p-0 m-0">
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-1"
                      className="form-check-input"
                      name="airCondition"
                      type="checkbox"
                      checked={filters.features.airCondition}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-1" className="form-check-label">
                      Air Condition
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-2"
                      className="form-check-input"
                      name="bedding"
                      type="checkbox"
                      checked={filters.features.bedding}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-2" className="form-check-label">
                      Bedding
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-3"
                      className="form-check-input"
                      name="heating"
                      type="checkbox"
                      checked={filters.features.heating}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-3" className="form-check-label">
                      Heating
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-4"
                      className="form-check-input"
                      name="internet"
                      type="checkbox"
                      checked={filters.features.internet}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-4" className="form-check-label">
                      Internet
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-5"
                      className="form-check-input"
                      name="microwave"
                      type="checkbox"
                      checked={filters.features.microwave}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-5" className="form-check-label">
                      Microwave
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-6"
                      className="form-check-input"
                      name="smoking"
                      type="checkbox"
                      checked={filters.features.smoking}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-6" className="form-check-label">
                      Smoking Allow
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-7"
                      className="form-check-input"
                      name="terrace"
                      type="checkbox"
                      checked={filters.features.terrace}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-7" className="form-check-label">
                      Terrace
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-8"
                      className="form-check-input"
                      name="balcony"
                      type="checkbox"
                      checked={filters.features.balcony}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-8" className="form-check-label">
                      Balcony
                    </label>
                  </li>
                  <li className="col-lg-6 col-md-6 p-0">
                    <input
                      id="a-9"
                      className="form-check-input"
                      name="icon"
                      type="checkbox"
                      checked={filters.features.icon}
                      onChange={handleChange}
                    />
                    <label htmlFor="a-9" className="form-check-label">
                      Icon
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div className="row">
              <div className="col-lg-12 col-md-12 col-sm-12 pt-4">
                <button
                  className="btn btn-danger full-width"
                  onClick={handleSubmit}
                >
                  Find New Home
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Sidebar;
