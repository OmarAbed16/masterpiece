import React, { useState, useEffect } from "react";
import PayMethods from "./PayMethods";

const BookCard = ({ BookInfo }) => {
  // Calculate total price based on dates
  const calculateTotalPrice = () => {
    const checkin = new Date(checkinDate);
    const checkout = new Date(checkoutDate);
    const nights = (checkout - checkin) / (1000 * 60 * 60 * 24);
    return nights * BookInfo.price;
  };

  const [checkinDate, setCheckinDate] = useState(
    new Date().toISOString().split("T")[0]
  );
  const [checkoutDate, setCheckoutDate] = useState(
    new Date(new Date().setDate(new Date().getDate() + 1))
      .toISOString()
      .split("T")[0]
  );
  const [totalPrice, setTotalPrice] = useState(calculateTotalPrice);
  const [refreshPayMethods, setRefreshPayMethods] = useState(false);

  useEffect(() => {
    setTotalPrice(calculateTotalPrice());
  }, [checkinDate, checkoutDate]);

  // Check if checkout date is before check-in date
  const isCheckoutInvalid = new Date(checkoutDate) <= new Date(checkinDate);

  // Function to refresh PayMethods component
  const refreshMethods = () => {
    setRefreshPayMethods(!refreshPayMethods);
  };

  return (
    <div className="sider_blocks_wrap">
      <div className="side-booking-header">
        <div className="sb-header-left">
          <h3 className="price">
            ${BookInfo.price}
            <sub>/Night</sub>
          </h3>
        </div>
      </div>
      <div className="side-booking-body">
        <div className="row">
          <div className="col-lg-6 col-md-6 col-sm-6 col-6">
            <div className="form-group">
              <label>Check In</label>
              <div className="cld-box">
                <input
                  type="date"
                  name="checkin"
                  className="form-control"
                  min={new Date().toISOString().split("T")[0]} // Prevent past dates
                  value={checkinDate}
                  onChange={(e) => setCheckinDate(e.target.value)}
                />
              </div>
            </div>
          </div>
          <div className="col-lg-6 col-md-6 col-sm-6 col-6">
            <div className="form-group">
              <label>Check Out</label>
              <div className="cld-box">
                <input
                  type="date"
                  name="checkout"
                  className={`form-control ${
                    isCheckoutInvalid ? "border-danger" : ""
                  }`}
                  min={
                    new Date(new Date().setDate(new Date().getDate() + 1))
                      .toISOString()
                      .split("T")[0]
                  } // Ensure checkout is after 1 day
                  value={checkoutDate}
                  onChange={(e) => setCheckoutDate(e.target.value)}
                />
              </div>
            </div>
          </div>

          <div className="side-booking-foot">
            <span className="sb-header-left">Total Payment</span>
            <h3 className={`price ${isCheckoutInvalid ? "text-danger" : ""}`}>
              ${totalPrice}
            </h3>
            {!isCheckoutInvalid &&
              BookInfo.status !== "inactive" &&
              BookInfo.status !== "archived" && (
                <PayMethods
                  key={refreshPayMethods} // Key refreshes the component
                  checkinDate={checkinDate}
                  checkoutDate={checkoutDate}
                  totalPrice={totalPrice}
                />
              )}
          </div>
          {BookInfo.status === "inactive" ? (
            <p className="text-danger">
              The property is not available right now.
            </p>
          ) : BookInfo.status === "archived" ? (
            <p className="text-danger">This property is no longer available.</p>
          ) : isCheckoutInvalid ? (
            <p className="text-danger">
              Checkout date must be after check-in date.
            </p>
          ) : null}
        </div>
      </div>
    </div>
  );
};

export default BookCard;
