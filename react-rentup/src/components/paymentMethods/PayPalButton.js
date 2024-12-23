import React, { useEffect, useState } from "react";
import { PayPalScriptProvider, PayPalButtons } from "@paypal/react-paypal-js";
import Swal from "sweetalert2";
import axios from "axios";

const PayPalButton = ({ totalPrice, checkinDate, checkoutDate }) => {
  const [price, setPrice] = useState(totalPrice);
  const [dates, setDates] = useState({
    checkin: checkinDate,
    checkout: checkoutDate,
  });

  // Update state when props change
  useEffect(() => {
    setPrice(totalPrice);
    setDates({
      checkin: checkinDate,
      checkout: checkoutDate,
    });
  }, [totalPrice, checkinDate, checkoutDate]);

  const handlePaypalOrder = async () => {
    const userId = getUserId();
    const urlParamId = new URLSearchParams(window.location.search).get("id");

    if (!userId) {
      Swal.fire({
        title: "Login Required",
        text: "Please log in first to proceed with payment.",
        icon: "warning",
        confirmButtonText: "OK",
      });
      return;
    }

    try {
      const response = await axios.get(
        `${process.env.REACT_APP_API_URL}/booking?totalPrice=${price}&checkin=${dates.checkin}&checkout=${dates.checkout}&propertyId=${urlParamId}&urlParamId=${userId}&paymentType=paypal`
      );

      // Success
      Swal.fire({
        title: "Booking Successful",
        text: "Your booking has been created successfully.",
        icon: "success",
        confirmButtonText: "OK",
      });
    } catch (error) {
      // Error
      Swal.fire({
        title: "Booking Failed",
        text: "There was an error creating your booking. Please try again.",
        icon: "error",
        confirmButtonText: "OK",
      });
      console.log(error.response.data.error);
    }
  };

  const getUserId = () => {
    const user = JSON.parse(sessionStorage.getItem("user"));
    return user ? user.id : null;
  };

  const componentKey = `${price}-${dates.checkin}-${dates.checkout}`;

  return (
    <PayPalScriptProvider
      options={{
        "client-id": `Aa--k9gAL2zd1YhSRmjKbIYHM8KjgukOF7OFTGZkehXDjIWt2MJOBGt5pkNRAQYv4NP6fsEEbpZ6Jprb`,
      }}
    >
      <div style={{ maxWidth: "500px", margin: "auto", padding: "20px" }}>
        <h2>Pay with PayPal</h2>
        <PayPalButtons
          key={componentKey} // Force rerender on prop/state change
          style={{ layout: "vertical" }}
          createOrder={(data, actions) => {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: price, // Use the updated price state
                  },
                  description: `Booking from ${dates.checkin} to ${dates.checkout}`, // Use the updated dates state
                },
              ],
            });
          }}
          onApprove={(data, actions) => {
            return actions.order.capture().then(async (details) => {
              // Directly call the API to create the booking after PayPal success
              await handlePaypalOrder();
              console.log(details); // Optional: Log transaction details
            });
          }}
          onError={(err) => {
            console.error("PayPal Checkout Error:", err);
            Swal.fire({
              title: "Payment Failed",
              text: "There was an issue with PayPal payment. Please try again.",
              icon: "error",
              confirmButtonText: "OK",
            });
          }}
        />
      </div>
    </PayPalScriptProvider>
  );
};

export default PayPalButton;
