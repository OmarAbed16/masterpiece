import { useEffect, useState } from "react";
import Pusher from "pusher-js";

function Try() {
  const [username, setUsername] = useState("username");
  const [messages, setMessages] = useState([]);
  const [message, setMessage] = useState("");

  // Extract query parameter (e.g., ?rec=ReceiverId)
  const getQueryParam = (param) => {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  };

  const receiverId = getQueryParam("rec");
  alert(receiverId);
  useEffect(() => {
    if (!receiverId) {
      return; // Do nothing if no rec parameter is found
    }

    Pusher.logToConsole = true;

    var pusher = new Pusher("1e951c14abce150d3b43", {
      cluster: "eu",
    });

    var channel = pusher.subscribe(`chat.${receiverId}`);
    channel.bind("message", function (data) {
      alert(JSON.stringify(data));
    });

    return () => {
      pusher.unsubscribe(`chat.${receiverId}`);
    };
  }, [receiverId]); // Run effect when receiverId changes

  const submit = async (e) => {
    e.preventDefault();

    await fetch("http://127.0.0.1:8000/api/messages/realTime1", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        username,
        message,
      }),
    });

    setMessage("");
  };

  return (
    <div className="container">
      <div className="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
        <div className="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
          <input
            className="fs-5 fw-semibold"
            value={username}
            onChange={(e) => setUsername(e.target.value)}
          />
        </div>
        <div className="list-group list-group-flush border-bottom scrollarea">
          {messages.map((message) => {
            return (
              <div
                className="list-group-item list-group-item-action py-3 lh-tight"
                key={message.id}
              >
                <div className="d-flex w-100 align-items-center justify-content-between">
                  <strong className="mb-1">{message.username}</strong>
                </div>
                <div className="col-10 mb-1 small">{message.message}</div>
              </div>
            );
          })}
        </div>
      </div>
      <form onSubmit={(e) => submit(e)}>
        <input
          className="form-control"
          placeholder="Write a message"
          value={message}
          onChange={(e) => setMessage(e.target.value)}
        />
      </form>
    </div>
  );
}

export default Try;
