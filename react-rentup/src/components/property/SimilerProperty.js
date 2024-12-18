import React from "react";

const SimilerProperty = () => {
  return (
    <>
      <div className="sidebar-widgets">
        <h4>Similar Property</h4>
        <div className="sidebar_featured_property">
          {/* List Sibar Property */}
          <div className="sides_list_property">
            <div className="sides_list_property_thumb">
              <img src="assets/img/p-1.png" className="img-fluid" alt="" />
            </div>
            <div className="sides_list_property_detail">
              <h4>
                <a href="single-property-1.html">Loss vengel New Apartment</a>
              </h4>
              <span>
                <i className="ti-location-pin" />
                Sans Fransico
              </span>
              <div className="lists_property_price">
                <div className="lists_property_types">
                  <div className="property_types_vlix sale">For Sale</div>
                </div>
                <div className="lists_property_price_value">
                  <h4>$4,240</h4>
                </div>
              </div>
            </div>
          </div>
          {/* List Sibar Property */}
          <div className="sides_list_property">
            <div className="sides_list_property_thumb">
              <img src="assets/img/p-4.png" className="img-fluid" alt="" />
            </div>
            <div className="sides_list_property_detail">
              <h4>
                <a href="single-property-1.html">Montreal Quriqe Apartment</a>
              </h4>
              <span>
                <i className="ti-location-pin" />
                Liverpool, London
              </span>
              <div className="lists_property_price">
                <div className="lists_property_types">
                  <div className="property_types_vlix">For Rent</div>
                </div>
                <div className="lists_property_price_value">
                  <h4>$7,380</h4>
                </div>
              </div>
            </div>
          </div>
          {/* List Sibar Property */}
          <div className="sides_list_property">
            <div className="sides_list_property_thumb">
              <img src="assets/img/p-7.png" className="img-fluid" alt="" />
            </div>
            <div className="sides_list_property_detail">
              <h4>
                <a href="single-property-1.html">Curmic Studio For Office</a>
              </h4>
              <span>
                <i className="ti-location-pin" />
                Montreal, Canada
              </span>
              <div className="lists_property_price">
                <div className="lists_property_types">
                  <div className="property_types_vlix buy">For Buy</div>
                </div>
                <div className="lists_property_price_value">
                  <h4>$8,730</h4>
                </div>
              </div>
            </div>
          </div>
          {/* List Sibar Property */}
          <div className="sides_list_property">
            <div className="sides_list_property_thumb">
              <img src="assets/img/p-5.png" className="img-fluid" alt="" />
            </div>
            <div className="sides_list_property_detail">
              <h4>
                <a href="single-property-1.html">Montreal Quebec City</a>
              </h4>
              <span>
                <i className="ti-location-pin" />
                Sreek View, New York
              </span>
              <div className="lists_property_price">
                <div className="lists_property_types">
                  <div className="property_types_vlix">For Rent</div>
                </div>
                <div className="lists_property_price_value">
                  <h4>$6,240</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default SimilerProperty;
