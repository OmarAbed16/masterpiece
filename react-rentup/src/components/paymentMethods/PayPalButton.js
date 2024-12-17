import React, { useEffect } from "react";

const PayPalButton = ({ totalPrice }) => {
  useEffect(() => {
    // Check if PayPal buttons script is available
    if (window.paypal) {
      // Initialize PayPal buttons
      window.paypal
        .Buttons({
          style: {
            shape: "rect",
            color: "white",
            layout: "vertical",
            label: "pay",
          },
          createOrder: function (data, actions) {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: totalPrice.toFixed(2).toString(),
                  },
                },
              ],
            });
          },
          onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
              alert(
                "Transaction completed by " + details.payer.name.given_name
              );
              // Optionally handle the success state
            });
          },
        })
        .render("#paypal-button-container"); // Replace #paypal-button-container with the id of your container element in your component
    } else {
      console.error("PayPal script not loaded.");
    }
  }, [totalPrice]); // Dependency array with totalPrice to refresh PayPal buttons on price change

  return (
    <div style={{ textAlign: "center" }}>
      <div id="paypal-button-container"></div>
    </div>
  );
};

export default PayPalButton;
