import React from "react";
import Swal from "sweetalert2";
import { Link, useNavigate } from "react-router-dom";

const ProfileBookingCard = ({ booking, setActiveOption }) => {
  const navigate = useNavigate();

  const handleDelete = (bookingId) => {
    Swal.fire({
      title: "Are you sure?",
      text: "This booking will be deleted and cannot be restored!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch(
          `${process.env.REACT_APP_API_URL}/profile/delete_booking/${bookingId}`,
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
            },
          }
        )
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              Swal.fire(
                "Deleted!",
                "Your booking has been deleted.",
                "success"
              );
              setActiveOption("profile");
            } else {
              Swal.fire(
                "Error!",
                "There was an issue deleting your booking.",
                "error"
              );
            }
          })
          .catch((error) => {
            Swal.fire(
              "Error!",
              "Something went wrong. Please try again later.",
              "error"
            );
          });
      }
    });
  };

  return (
    <tr>
      <td>
        <div className="dash_prt_wrap">
          <Link
            to={"/property?id=" + booking.listing_details.listing_id}
            className="dash_prt_thumb"
          >
            <img
              src={booking.listing_details.image_url}
              className="img-fluid"
              alt={booking.listing_details.title}
            />
          </Link>
          <div className="dash_prt_caption">
            <h5>
              {booking.listing_details.title.length > 25
                ? booking.listing_details.title.slice(0, 15) + "..."
                : booking.listing_details.title}
            </h5>
            <div className="prt_dashb_lot">
              {booking.listing_details.location}
            </div>
            <div className="prt_dash_rate">
              <span>{booking.booking_details.payment_value}</span>
            </div>
          </div>
        </div>
      </td>
      <td className="m2_hide">
        <div className="prt_leads">
          <span> till now</span>
        </div>
        <div className="prt_leads_list">
          <ul>
            <li>
              <a href="#">
                <img
                  src={booking.user_details.profile_picture}
                  className="img-fluid circle"
                  alt=""
                />
              </a>
            </li>
          </ul>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>{booking.booking_details.checkin}</h5>
        </div>
        <div className="_leads_view_title">
          <span>
            {new Date(booking.booking_details.checkin).toLocaleDateString()}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>{booking.booking_details.checkout}</h5>
        </div>
        <div className="_leads_view_title">
          <span>
            {new Date(booking.booking_details.checkout).toLocaleDateString()}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_status">
          <span
            className={
              booking.booking_details.payment_status === "completed"
                ? "active"
                : "expire"
            }
          >
            {booking.booking_details.payment_status}
          </span>
        </div>
      </td>

      <td className="m2_hide">
        <div className="_leads_status">
          <span
            className={
              booking.booking_details.status === "confirmed"
                ? "active"
                : "expire"
            }
          >
            {booking.booking_details.status}
          </span>
        </div>
      </td>

      <td>
        <div className="_leads_action">
          <a href="#">
            <i className="fas fa-edit" />
          </a>
          <a
            href="#"
            onClick={() => handleDelete(booking.booking_details.booking_id)}
          >
            <i className="fas fa-trash delete-user" />
          </a>
        </div>
      </td>
    </tr>
  );
};

export default ProfileBookingCard;
