import React from "react";

const MessageUser = ({ avatar, text, isMe }) => (
  <div className={`message-plunch ${isMe ? "me" : ""}`}>
    <div className="dash-msg-avatar">
      <img src={avatar} alt="User Avatar" />
    </div>
    <div className="dash-msg-text">
      <p>{text}</p>
    </div>
  </div>
);

export default MessageUser;
