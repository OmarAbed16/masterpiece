const MessageItem = ({
  imgSrc,
  userName,
  time,
  message,
  status,
  isActive,
  onClick,
}) => (
  <li className={isActive ? "active-message" : ""} onClick={onClick}>
    <a style={{ cursor: "pointer" }}>
      {" "}
      {/* Added cursor: pointer here */}
      <div className="dash-msg-avatar">
        <img src={imgSrc} alt="" />
        <span className={`_user_status ${status}`} />
      </div>
      <div className="message-by">
        <div className="message-by-headline">
          <h5>{userName}</h5>
          <span>{time}</span>
        </div>
        <p>{message}</p>
      </div>
    </a>
  </li>
);

export default MessageItem;
