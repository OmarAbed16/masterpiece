import React from "react";
import { PayPalScriptProvider, PayPalButtons } from "@paypal/react-paypal-js";

const PayPalButton = () => {
  return (
    <PayPalScriptProvider options={{ "client-id": "YOUR_CLIENT_ID" }}>
      <div style={{ maxWidth: "500px", margin: "auto", padding: "20px" }}>
        <h2>Pay with PayPal</h2>
        <PayPalButtons
          style={{ layout: "vertical" }}
          createOrder={(data, actions) => {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: "10.00", // Replace with your price
                  },
                },
              ],
            });
          }}
          onApprove={(data, actions) => {
            return actions.order.capture().then((details) => {
              alert(
                "Transaction completed by " + details.payer.name.given_name
              );
              console.log(details); // Optional: Log transaction details
            });
          }}
          onError={(err) => {
            console.error("PayPal Checkout Error:", err);
            alert("Something went wrong. Please try again.");
          }}
        />
      </div>
    </PayPalScriptProvider>
  );
};

export default PayPalButton;
