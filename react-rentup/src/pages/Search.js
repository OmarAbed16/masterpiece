import React, { useState, useEffect } from "react";
import Sidebar from "../components/search/Sidebar"; // Adjust the path if necessary
import SearchGrid from "../components/search/SearchGrid"; // Adjust the path if necessary
import SearchNav from "../components/search/SearchNav";
import SearchList from "../components/search/SearchList";
import CallUs from "../components/layouts/CallUs";

const Search = ({ onSearch, onFavoriteCountChange }) => {
  const [viewMode, setViewMode] = useState("grid"); // default view is grid
  const [properties, setProperties] = useState([]);
  const [totalCount, setTotalCount] = useState(0); // to hold total count of listings
  // Get URL search parameters
  const urlParams = new URLSearchParams(window.location.search);
  const [filters, setFilters] = useState({
    location: urlParams.get("location") || "",
    price_min: urlParams.get("price_min") || "",
    price_max: urlParams.get("price_max") || "",
    bed: urlParams.get("bed") || "",
    bath: urlParams.get("bath") || "",
    sqft_min: urlParams.get("sqft_min") || "",
    sqft_max: urlParams.get("sqft_max") || "",
    governorate: urlParams.get("governorate") || "",
    offset: 0,
    limit: 6,
    ordertype: "desc", // default order type
  });

  useEffect(() => {
    // Retrieve user data from sessionStorage
    const user = JSON.parse(sessionStorage.getItem("user")) || {};
    const userId = user.id || 0; // Default to 0 if not found

    const params = new URLSearchParams(filters).toString();
    fetch(
      `${process.env.REACT_APP_API_URL}/search/renderSearch?user_id=${userId}&${params}`
    )
      .then((response) => response.json())
      .then((data) => {
        setProperties(data.listings);
        setTotalCount(data.total_count); // update total count

        onFavoriteCountChange(data.favorite_count);
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
                  <SearchGrid
                    key={item.id}
                    item={item}
                    onFavoriteCountChange={onFavoriteCountChange}
                  />
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
