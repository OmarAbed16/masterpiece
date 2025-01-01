import React from "react";
import AgentCard from "../cards/AgentCard";
import BookCard from "../cards/BookCard";

const Sidebar = ({ owner, agent, BookInfo }) => {
  return (
    <>
      <div className="col-lg-4 col-md-12 col-sm-12">
        <div className="property-sidebar">
          <BookCard BookInfo={BookInfo} />
          <AgentCard owner={owner} ownerReviews={agent} />
        </div>
      </div>
    </>
  );
};

export default Sidebar;
