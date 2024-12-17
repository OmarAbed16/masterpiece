import React from "react";

const Ameneties = ({ Ameneties }) => {
  console.log(Ameneties);
  console.log("g");

  return (
    <>
      <div className="property_block_wrap">
        <div className="property_block_wrap_header">
          <h4 className="property_block_title">Ameneties</h4>
        </div>
        <div className="block-body">
          <ul className="avl-features third">
            {Ameneties.map((amenity, index) => (
              <li key={index} className="active">
                {amenity.amenity_name}
              </li>
            ))}
          </ul>
        </div>
      </div>
    </>
  );
};

export default Ameneties;
