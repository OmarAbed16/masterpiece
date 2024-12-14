import React from "react";

const SearchNav = ({ onChangeView, viewMode }) => {
  return (
    <div className="row m-0">
      <div className="short_wraping">
        <div className="row align-items-center">
          <div className="col-lg-3 col-md-6 col-sm-12 col-sm-6">
            <ul className="shorting_grid">
              <li className="list-inline-item">
                <a
                  href="#"
                  className={viewMode === "grid" ? "active" : ""}
                  onClick={() => onChangeView("grid")}
                >
                  <span className="ti-layout-grid2"></span>Grid
                </a>
              </li>
              <li className="list-inline-item">
                <a
                  href="#"
                  className={viewMode === "list" ? "active" : ""}
                  onClick={() => onChangeView("list")}
                >
                  <span className="ti-view-list"></span>List
                </a>
              </li>
            </ul>
          </div>

          <div className="col-lg-6 col-md-12 col-sm-12 order-lg-2 order-md-3 elco_bor col-sm-12">
            <div className="shorting_pagination">
              <div className="shorting_pagination_laft">
                <h5>Showing 1-25 of 72 results</h5>
              </div>
              <div className="shorting_pagination_right">
                <ul>
                  <li>
                    <a href="javascript:void(0);" className="active">
                      1
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">2</a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">3</a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">4</a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">5</a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">6</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div className="col-lg-3 col-md-6 col-sm-12 order-lg-3 order-md-2 col-sm-6">
            <div className="shorting-right">
              <label>Short By:</label>
              <div className="dropdown show">
                <a
                  className="btn btn-filter dropdown-toggle"
                  href="#"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span className="selection">Most Rated</span>
                </a>
                <div className="drp-select dropdown-menu">
                  <a className="dropdown-item" href="JavaScript:Void(0);">
                    Most Rated
                  </a>
                  <a className="dropdown-item" href="JavaScript:Void(0);">
                    Most Viewd
                  </a>
                  <a className="dropdown-item" href="JavaScript:Void(0);">
                    News Listings
                  </a>
                  <a className="dropdown-item" href="JavaScript:Void(0);">
                    High Rated
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SearchNav;
