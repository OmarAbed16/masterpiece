import React from "react";

const ContactBox = ({ icon, title, email, phone, liveChat }) => {
  return (
    <div className="col-lg-4 col-md-4 col-sm-12">
      <div className="contact-box">
        <i className={`${icon} text-danger`}></i>
        <h4>{title}</h4>
        <p>{email}</p>
        <span>{phone}</span>
        {liveChat && <span className="live-chat">Live Chat</span>}
      </div>
    </div>
  );
};

export default ContactBox;
