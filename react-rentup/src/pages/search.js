import React, { useState, useEffect } from "react";
import Sidebar from "../components/search/Sidebar"; // Adjust the path if necessary
import SearchGrid from "../components/search/SearchGrid"; // Adjust the path if necessary
import SearchNav from "../components/search/SearchNav";
import SearchList from "../components/search/SearchList";
import CallUs from "../components/layouts/CallUs";

const Search = ({ onSearch }) => {
  const [viewMode, setViewMode] = useState("grid"); // default view is grid
  const [properties, setProperties] = useState([]);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/search/renderSearch")
      .then((response) => response.json())
      .then((data) => setProperties(data))
      .catch((error) => console.error("Error fetching data:", error));
  }, []);

  return (
    <>
      <div className="container">
        <SearchNav onChangeView={setViewMode} viewMode={viewMode} />
        <div className="row">
          <Sidebar />
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
