import React from "react";

import CashButton from "../paymentMethods/CashButton";
// import PayPalButton from "../paymentMethods/PayPalButton";

const PayMethods = ({ checkinDate, checkoutDate, totalPrice }) => (
  <>
    <div className="panel-group pay_opy980" id="payaccordion">
      {/* Pay By Paypal */}
      <div className="panel panel-default">
        <div className="panel-heading" id="pay">
          <h4 className="panel-title">
            <a
              data-bs-toggle="collapse"
              role="button"
              data-parent="#payaccordion"
              href="#payPal"
              aria-expanded="true"
              aria-controls="payPal"
              className=""
            >
              PayPal
            </a>
          </h4>
        </div>
        <div
          id="payPal"
          className="panel-collapse collapse show"
          aria-labelledby="pay"
          data-parent="#payaccordion"
        >
          <div className="panel-body">
            {/* <PayPalButton
              totalPrice={totalPrice}
              checkinDate={checkinDate}
              checkoutDate={checkoutDate}
            /> */}
          </div>
        </div>
      </div>
      {/* Pay By Cash */}
      <div className="panel panel-default">
        <div className="panel-heading" id="stripes">
          <h4 className="panel-title">
            <a
              data-bs-toggle="collapse"
              role="button"
              data-parent="#payaccordion"
              href="#stripePay"
              aria-expanded="false"
              aria-controls="stripePay"
              className=""
            >
              Cash
            </a>
          </h4>
        </div>
        <div
          id="stripePay"
          className="collapse"
          aria-labelledby="stripes"
          data-parent="#payaccordion"
        >
          <div className="panel-body">
            <CashButton
              totalPrice={totalPrice}
              checkinDate={checkinDate}
              checkoutDate={checkoutDate}
            />
          </div>
        </div>
      </div>
    </div>
  </>
);

export default PayMethods;
