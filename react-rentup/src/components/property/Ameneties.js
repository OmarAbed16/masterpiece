import React from "react";

// Mapping amenity values to FontAwesome icons and text
const amenityIcons = {
  0: { icon: "fa-wifi", text: "Internet" },
  1: { icon: "fa-paw", text: "Pets Allowed" },
  2: { icon: "fa-spa", text: "Spa & Massage" },
  3: { icon: "fa-tshirt", text: "Laundry Room" },
  4: { icon: "fa-dumbbell", text: "Gym" },
  5: { icon: "fa-bell", text: "Alarm" },
};

const Ameneties = ({ Ameneties }) => {
  return (
    <div className="property_block_wrap">
      <div className="property_block_wrap_header">
        <h4 className="property_block_title">Amenities</h4>
      </div>
      <div className="block-body">
        <ul className="row p-0 m-0 avl-features third">
          {Object.entries(amenityIcons).map(([key, { icon, text }]) => {
            // Check if the amenity exists in the data
            const isActive = Ameneties.some(
              (amenity) => amenity.amenity_value == key
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

export default Ameneties;
