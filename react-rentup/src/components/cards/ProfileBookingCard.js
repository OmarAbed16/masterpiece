import React from "react";

const ProfileBookingCard = ({ booking }) => {
  const { property, leads, views, postedOn, status } = booking;

  return (
    <tr>
      <td>
        <div className="dash_prt_wrap">
          <div className="dash_prt_thumb">
            <img src={property.image} className="img-fluid" alt="" />
          </div>
          <div className="dash_prt_caption">
            <h5>{property.name}</h5>
            <div className="prt_dashb_lot">{property.address}</div>
            <div className="prt_dash_rate">
              <span>{property.price}</span>
            </div>
          </div>
        </div>
      </td>
      <td className="m2_hide">
        <div className="prt_leads">
          <span>{leads} till now</span>
        </div>
        <div className="prt_leads_list">
          <ul>
            {booking.leadsUsers.map((user, index) => (
              <li key={index}>
                <a href="#">
                  <img src={user.avatar} className="img-fluid circle" alt="" />
                </a>
              </li>
            ))}
            {booking.leadsUsers.length > 5 && (
              <li>
                <a href="#" className="leades_more">
                  {booking.leadsUsers.length - 5}+
                </a>
              </li>
            )}
          </ul>
        </div>
      </td>
      <td className="m2_hide">
        <div className="_leads_view">
          <h5 className="up">{views}</h5>
        </div>
        <div className="_leads_view_title">
          <span>Total Views</span>
        </div>
      </td>
      <td className="m2_hide">
        <div className="_leads_posted">
          <h5>{postedOn}</h5>
        </div>
        <div className="_leads_view_title">
          <span>{new Date(postedOn).toLocaleDateString()}</span>
        </div>
      </td>
      <td>
        <div className="_leads_status">
          <span className={status === "Active" ? "active" : "expire"}>
            {status}
          </span>
        </div>
        <div className="_leads_view_title">
          <span>Till 12 Oct</span>
        </div>
      </td>
      <td>
        <div className="_leads_action">
          <a href="#">
            <i className="fas fa-edit" />
          </a>
          <a href="#">
            <i className="fas fa-trash" />
          </a>
        </div>
      </td>
    </tr>
  );
};

export default ProfileBookingCard;
