import React, { useState } from "react";
import Swal from "sweetalert2";

const AgentCard = ({ owner, ownerReviews }) => {
  const [isPhoneVisible, setIsPhoneVisible] = useState(false);

  let formattedPhone = `+${owner.phone_number.slice(
    0,
    3
  )}${owner.phone_number.slice(3, 5)}**${owner.phone_number.slice(7)}...Show`;

  const handlePhoneClick = () => {
    if (!sessionStorage.getItem("user")) {
      // User is not logged in, show SweetAlert
      Swal.fire({
        icon: "warning",
        title: "Login required",
        text: "Please log in to see the phone number.",
        confirmButtonText: "OK",
      });
    } else {
      // User is logged in, show phone number
      setIsPhoneVisible(true);
    }
  };

  return (
    <>
      {/* Agent Detail */}
      <div className="sider_blocks_wrap">
        <div className="side-booking-body">
          <div className="agent-_blocks_title">
            <div className="agent-_blocks_thumb">
              <img src={owner.profile_image} alt="" />
            </div>
            <div className="agent-_blocks_caption">
              <h4>
                <a>{owner.name}</a>
              </h4>
              <span className="approved-agent">
                <i className="ti-check" />
                approved
              </span>
            </div>
            <div className="clearfix" />
          </div>
          <a className="agent-btn-contact">
            <i className="ti-comment-alt" />(
            {ownerReviews.reviewCount + " reviews"})
            {parseFloat(ownerReviews.averageRating).toFixed(1)}
            <i className="fa fa-star" style={{ color: "gold" }}></i>
          </a>
          <span
            id="number"
            data-last={formattedPhone}
            style={{ cursor: "pointer" }}
          >
            <span>
              <i className="ti-headphone-alt" />
              <a onClick={handlePhoneClick} className="see">
                {isPhoneVisible ? owner.phone_number : formattedPhone}
              </a>
            </span>
          </span>
        </div>
      </div>
    </>
  );
};

export default AgentCard;
