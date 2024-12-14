import React from "react";

const SearchNav = ({
  onChangeView,
  viewMode,
  totalCount,
  offset,
  limit,
  ordertype,
  setOrderType,
}) => {
  const currentPage = Math.floor(offset / limit) + 1; // current page number
  const totalPages = Math.ceil(totalCount / limit); // total pages available

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
              <div className="shorting_pagination_right">
                <ul>
                  <li>
                    <a
                      className={`active ${
                        currentPage === 1 ? "disabled" : ""
                      }`}
                      href={currentPage > 1 ? `#${offset - limit}` : "#"}
                    >
                      &#11207;
                    </a>
                  </li>
                  <li>
                    <div className="shorting_pagination_laft">
                      <h5>
                        Showing {offset + 1}-
                        {Math.min(offset + limit, totalCount)} of {totalCount}{" "}
                        results
                      </h5>
                    </div>
                  </li>
                  <li>
                    <a
                      className={`active ${
                        currentPage === totalPages ? "disabled" : ""
                      }`}
                      href={
                        currentPage < totalPages ? `#${offset + limit}` : "#"
                      }
                    >
                      &#11208;
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div className="col-lg-3 col-md-6 col-sm-12 order-lg-3 order-md-2 col-sm-6">
            <div className="shorting-right">
              <label>Sort By:</label>
              <div className="dropdown show">
                <a
                  className="btn btn-filter dropdown-toggle"
                  href="#"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span className="selection">
                    {ordertype === "desc"
                      ? "Newest to Oldest"
                      : "Oldest to Newest"}
                  </span>
                </a>
                <div className="drp-select dropdown-menu">
                  <a
                    className="dropdown-item"
                    style={{ cursor: "pointer" }}
                    onClick={() => setOrderType("desc")}
                  >
                    Newest to Oldest
                  </a>
                  <a
                    className="dropdown-item"
                    style={{ cursor: "pointer" }}
                    onClick={() => setOrderType("asc")}
                  >
                    Oldest to Newest
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
