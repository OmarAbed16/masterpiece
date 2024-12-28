import React from "react";

const MessageUser = ({ avatar, text, isMe, date }) => {
  const formattedDate = new Date(date).toLocaleString("en-US", {
    weekday: "short", // Day of the week (e.g., "Thu")
    hour: "2-digit", // Hour (12-hour format)
    minute: "2-digit", // Minute
    hour12: true, // AM/PM
  });

  return (
    <div className={`message-plunch ${isMe ? "me" : ""}`}>
      <div className="dash-msg-avatar">
        <img src={avatar} alt="User Avatar" style={{ objectFit: "cover" }} />
      </div>
      <div className="dash-msg-text">
        <p>{text}</p>
      </div>
      <p>{formattedDate}</p>
    </div>
  );
};

export default MessageUser;
