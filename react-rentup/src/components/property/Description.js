import React from "react";

const Description = ({ desc }) => {
  return (
    <>
      <div className="property_block_wrap">
        <div className="property_block_wrap_header">
          <h4 className="property_block_title">About Property</h4>
        </div>
        <div className="block-body">
          <p>{desc}</p>
        </div>
      </div>
    </>
  );
};

export default Description;
