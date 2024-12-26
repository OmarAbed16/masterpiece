import React from "react";

// Mapping feature values to FontAwesome icons and text
const featureIcons = {
  0: { icon: "fa-couch", text: "Living Room" },
  1: { icon: "fa-utensils", text: "Kitchen" },
  2: { icon: "fa-heartbeat", text: "Free Medical" },
  3: { icon: "fa-fire", text: "Fireplace" },
  4: { icon: "fa-house", text: "Residential" },
  5: { icon: "fa-tv", text: "TV Cable" },
};

const Features = ({ Features }) => {
  return (
    <div className="property_block_wrap">
      <div className="property_block_wrap_header">
        <h4 className="property_block_title">Additional Features</h4>
      </div>
      <div className="block-body">
        <ul className="row p-0 m-0 avl-features third">
          {Object.entries(featureIcons).map(([key, { icon, text }]) => {
            // Check if the feature exists in the data
            const isActive = Features.some(
              (feature) => feature.feature_value == key
            );

            return (
              <li key={key} className={isActive ? "active" : ""}>
                <i className={`fa ${icon} me-2`}></i>
                {text}
              </li>
            );
          })}
        </ul>
      </div>
    </div>
  );
};

export default Features;
