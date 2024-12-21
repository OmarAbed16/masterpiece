import React from "react";
import { Link } from "react-router-dom";

const ProfileReviewCard = ({ booking }) => {
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

      <td>
        <div className="_leads_action">
          <a href="#">
            <i className="fas fa-edit" />
          </a>
        </div>
      </td>
    </tr>
  );
};

export default ProfileReviewCard;
