import React, { useState, useEffect } from "react";
import Sidebar from "../components/search/Sidebar"; // Adjust the path if necessary
import SearchGrid from "../components/search/SearchGrid"; // Adjust the path if necessary
import SearchNav from "../components/search/SearchNav";
import SearchList from "../components/search/SearchList";
import CallUs from "../components/layouts/CallUs";

const Search = ({ onSearch }) => {
  const [viewMode, setViewMode] = useState("grid"); // default view is grid
  const [properties, setProperties] = useState([]);
  const [totalCount, setTotalCount] = useState(0); // to hold total count of listings
  const [filters, setFilters] = useState({
    location: "",
    price_min: "",
    price_max: "",
    bed: "",
    bath: "",
    sqft_min: "",
    sqft_max: "",
    governorate: "",
    offset: 0,
    limit: 6,
    ordertype: "desc", // default order type
  });

  useEffect(() => {
    const params = new URLSearchParams(filters).toString();
    fetch(`http://127.0.0.1:8000/api/search/renderSearch?${params}`)
      .then((response) => response.json())
      .then((data) => {
        setProperties(data.listings);
        setTotalCount(data.total_count); // update total count
      })
      .catch((error) => console.error("Error fetching data:", error));
  }, [filters]);

  const handleFilterChange = (newFilters) => {
    setFilters(newFilters);
  };

  return (
    <>
      <div className="container">
        <SearchNav
          onChangeView={setViewMode}
          viewMode={viewMode}
          totalCount={totalCount} // pass total count to SearchNav
          offset={filters.offset}
          limit={filters.limit}
          ordertype={filters.ordertype} // pass order type to SearchNav
          setOrderType={(type) => setFilters({ ...filters, ordertype: type })}
        />
        <div className="row">
          <Sidebar onFilterChange={handleFilterChange} />
          <div className="col-lg-8 col-md-12 col-sm-12">
            <div className="row justify-content-center g-4">
              {properties.map((item) =>
                viewMode === "grid" ? (
                  <SearchGrid key={item.id} item={item} />
                ) : (
                  <SearchList key={item.id} item={item} />
                )
              )}
            </div>
          </div>
        </div>
      </div>
      <CallUs />
    </>
  );
};

export default Search;
