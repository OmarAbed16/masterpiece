import React, { useState } from "react";
import Sidebar from "../components/search/Sidebar"; // Adjust the path if necessary
import SearchGrid from "../components/search/SearchGrid"; // Adjust the path if necessary
import SearchNav from "../components/search/SearchNav";
import SearchList from "../components/search/SearchList";
import CallUs from "../components/layouts/CallUs";

const Search = ({ onSearch }) => {
  return (
    <>
      <div className="container">
        <SearchNav />
        <div className="row">
          <Sidebar />
          <div className="col-lg-8 col-md-12 col-sm-12">
            <div className="row justify-content-center g-4">
              <SearchGrid />
              <SearchList />
            </div>
          </div>
        </div>
      </div>
      <CallUs />
    </>
  );
};

export default Search;
