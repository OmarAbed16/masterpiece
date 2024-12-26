import React, { useState } from "react";
import axios from "axios";
import "./chatbot.css";

const Chatbot = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [messages, setMessages] = useState([
    { type: "incoming", text: "Hi there. How can I help you today?" },
  ]);
  const [input, setInput] = useState("");

  const toggleChatbot = () => setIsOpen(!isOpen);

  const handleInputChange = (e) => setInput(e.target.value);

  const sendMessage = async () => {
    if (input.trim() === "") return;

    // Add the user's message to the conversation history
    const newMessages = [...messages, { type: "outgoing", text: input }];
    setMessages(newMessages);
    setInput("");

    try {
      // Get user ID from session storage or other methods
      const user = JSON.parse(sessionStorage.getItem("user"));
      const userId = user ? user.id : 27;

      // Call the backend API to get the chatbot's response via GET
      const response = await axios.get(
        `${process.env.REACT_APP_API_URL}/chat`, // Ensure this URL is correct
        {
          params: {
            userId: userId, // Send the user ID as a query parameter
            question: input, // Send the user's message as a query parameter
          },
        }
      );

      const chatResponse = response.data.message;
      setMessages((prev) => [
        ...prev,
        { type: "incoming", text: chatResponse },
      ]);
    } catch (error) {
      console.error("Error fetching response from the backend", error);
      setMessages((prev) => [
        ...prev,
        { type: "incoming", text: "Sorry, something went wrong!" },
      ]);
    }
  };

  return (
    <div>
      <button
        style={{ zIndex: "500" }}
        className="chatbot__button"
        onClick={toggleChatbot}
      >
        <i className={`fas ${isOpen ? "fa-times" : "fa-comment-dots"}`}></i>
      </button>

      {isOpen && (
        <div style={{ zIndex: "500" }} className="chatbot">
          <div className="chatbot__header">
            <h3 className="chatbox__title">Chatbot</h3>
            <i
              className="fas fa-times"
              onClick={toggleChatbot}
              style={{
                cursor: "pointer",
                position: "absolute",
                right: "10%",
                top: "8%",
              }}
            ></i>
          </div>

          <ul className="chatbot__box">
            {messages.map((msg, index) => (
              <li key={index} className={`chatbot__chat ${msg.type}`}>
                {msg.type === "incoming" && <i className="fas fa-robot"></i>}
                <p>{msg.text}</p>
              </li>
            ))}
          </ul>

          <div className="chatbot__input-box">
            <textarea
              className="chatbot__textarea"
              placeholder="Enter a message..."
              value={input}
              onChange={handleInputChange}
              required
            ></textarea>
            <i
              id="send-btn"
              className="fas fa-paper-plane"
              onClick={sendMessage}
              style={{ cursor: "pointer" }}
            ></i>
          </div>
        </div>
      )}
    </div>
  );
};

export default Chatbot;
