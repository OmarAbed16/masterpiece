import React, { useState } from "react";

const Sidebar = ({ offset, limit, onFilterChange }) => {
  const [filters, setFilters] = useState({
    location: "",
    price_min: "",
    price_max: "",
    bed: "",
    bath: "",
    sqft_min: "",
    sqft_max: "",
    offset: offset,
    limit: limit,
    governorate: "",
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
    const { name, value } = event.target;
    setFilters({
      ...filters,
      [name]: value,
    });
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    onFilterChange(filters); // Pass filters to parent
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
                  name="location"
                  value={filters.location} // Sync location filter with neighborhood input
                  onChange={handleChange}
                />
                <i className="ti-search"></i>
              </div>
            </div>
            <div className="form-group">
              <div className="input-with-icon">
                <select
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
                <i className="ti-location-pin"></i>
              </div>
            </div>
            <div className="form-group">
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
                <i className="fa fa-bed"></i>
              </div>
            </div>
            <div className="form-group">
              <div className="input-with-icon">
                <select
                  id="bathrooms"
                  className="form-control"
                  name="bath"
                  value={filters.bath}
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
            <h6>Choose Size Range</h6>
            <div
              style={{ display: "flex", justifyContent: "space-between" }}
              className="form-group"
            >
              <div style={{ width: "50%" }} className="input-with-icon">
                <input
                  type="number"
                  className="form-control"
                  placeholder="Min Area"
                  name="sqft_min"
                  value={filters.sqft_min}
                  onChange={handleChange}
                />
                <i className="fa fa-expand-arrows-alt"></i>
              </div>

              <div style={{ width: "50%" }} className="input-with-icon">
                <input
                  type="number"
                  className="form-control"
                  placeholder="Max Area"
                  name="sqft_max"
                  value={filters.sqft_max}
                  onChange={handleChange}
                />
                <i className="fa fa-expand-arrows-alt"></i>
              </div>
            </div>

            <h6>Choose Price Range</h6>
            <div
              style={{ display: "flex", justifyContent: "space-between" }}
              className="form-group"
            >
              <div style={{ width: "50%" }} className="input-with-icon">
                <input
                  type="number"
                  className="form-control"
                  placeholder="Min Price"
                  name="price_min"
                  value={filters.price_min}
                  onChange={handleChange}
                />
                <i className="fa fa-dollar-sign"></i>
              </div>

              <div style={{ width: "50%" }} className="input-with-icon">
                <input
                  type="number"
                  className="form-control"
                  placeholder="Max Price"
                  name="price_max"
                  value={filters.price_max}
                  onChange={handleChange}
                />
                <i className="fa fa-dollar-sign"></i>
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
