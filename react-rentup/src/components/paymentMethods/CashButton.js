import React from "react";
import Swal from "sweetalert2";
import axios from "axios";

const CashButton = ({ totalPrice, checkinDate, checkoutDate }) => {
  const getUserId = () => {
    const user = JSON.parse(sessionStorage.getItem("user"));
    return user ? user.id : null;
  };

  const userId = getUserId();
  const urlParamId = new URLSearchParams(window.location.search).get("id");

  const handleClick = async () => {
    if (!userId) {
      Swal.fire({
        title: "Login Required",
        text: "Please log in first to proceed with payment.",
        icon: "warning",
        confirmButtonText: "OK",
      });
      return;
    }

    Swal.fire({
      title: "Are you sure?",
      text: "You want to book this property?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }).then(async (result) => {
      if (result.isConfirmed) {
        try {
          console.log(
            `http://127.0.0.1:8000/api/booking?totalPrice=${totalPrice}&checkinDate=${checkinDate}&checkoutDate=${checkoutDate}&propertyId=${urlParamId}&urlParamId=${userId}&paymentType=cash`
          );

          const response = await axios.get(
            `http://127.0.0.1:8000/api/booking?totalPrice=${totalPrice}&checkinDate=${checkinDate}&checkoutDate=${checkoutDate}&propertyId=${urlParamId}&urlParamId=${userId}&paymentType=cash`
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
      }
    });
  };

  return (
    <button
      type="button"
      className="btn btn-danger full-width"
      onClick={handleClick}
    >
      Pay ${totalPrice.toFixed(2)}
    </button>
  );
};

export default CashButton;
