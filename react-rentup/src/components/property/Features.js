import React from "react";

const Features = ({ Features }) => {
  console.log(Features);

  return (
    <>
      <div className="property_block_wrap">
        <div className="property_block_wrap_header">
          <h4 className="property_block_title">Advance Features</h4>
        </div>
        <div className="block-body">
          <ul className="row p-0 m-0 avl-features third">
            {Features.map((feature, index) => (
              <li key={index} className="active">
                {feature.feature_name}
              </li>
            ))}
          </ul>
        </div>
      </div>
    </>
  );
};

export default Features;
