import React from "react";

const SearchNav = ({
  onChangeView,
  viewMode,
  totalCount,
  offset,
  limit,
  setOffset,
  ordertype,
  setOrderType,
}) => {
  const currentPage = Math.ceil((offset + 6) / 6); // current page number
  const totalPages = Math.ceil(totalCount / 6); // total pages available

  return (
    <div className="row m-0">
      <div className="short_wraping">
        <div className="row align-items-center">
          <div className="col-lg-3 col-md-4 col-sm-6">
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

          <div className="col-lg-6 col-md-4 order-lg-2 order-md-3 elco_bor col-sm-6">
            <div className="shorting_pagination">
              <div className="shorting_pagination_right">
                <ul>
                  <li>
                    <a
                      className={` ${currentPage > 1 ? "active" : ""}`}
                      style={{ cursor: "pointer" }}
                      onClick={() => {
                        if (currentPage > 1) {
                          setOffset(offset - 6);
                        }
                      }}
                    >
                      &#11207;
                    </a>
                  </li>
                  <li>
                    <div className="shorting_pagination_laft">
                      <h5>
                        Showing {currentPage}-{totalPages} of {totalCount}{" "}
                        results
                      </h5>
                    </div>
                  </li>
                  <li>
                    <a
                      className={` ${currentPage < totalPages ? "active" : ""}`}
                      style={{ cursor: "pointer" }}
                      onClick={() => {
                        if (currentPage < totalPages) {
                          setOffset(offset + 6);
                        }
                      }}
                    >
                      &#11208;
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div className="col-lg-3 col-md-4 col-sm-12 order-lg-3 order-md-2 col-sm-6">
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
