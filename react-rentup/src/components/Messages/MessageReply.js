import React, { useState } from "react";
import axios from "axios";

const MessageReply = ({ senderId, receiverId, onMessageSent }) => {
  const [message, setMessage] = useState("");

  const handleSendMessage = async () => {
    if (!message.trim()) return; // Prevent sending empty messages

    try {
      const response = await axios.post(
        `${process.env.REACT_APP_API_URL}/messages/add`, // Endpoint for adding messages
        {
          sender_id: senderId,
          receiver_id: receiverId,
          message: message,
        }
      );

      if (response.status === 201 || response.status === 200) {
        setMessage(""); // Clear input field
        onMessageSent(); // Trigger parent to reload messages
      }
    } catch (error) {
      console.error("Error sending message:", error);
    }
  };

  return (
    <div className="message-reply">
      <textarea
        cols={40}
        rows={3}
        className="form-control with-light rounded"
        placeholder="Your Message"
        value={message}
        onChange={(e) => setMessage(e.target.value)} // Update state on change
      />
      <button
        type="button"
        className="btn btn-danger mt-3"
        onClick={handleSendMessage} // Handle click event
      >
        Send Message
      </button>
    </div>
  );
};

export default MessageReply;
