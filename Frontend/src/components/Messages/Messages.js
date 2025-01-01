import React, { useState, useEffect } from "react";
import MessageItem from "./MessageItem";
import MessageReply from "./MessageReply";
import MessageContent from "./MessageContent";
import axios from "axios";

const Messages = () => {
  const [activeConversation, setActiveConversation] = useState(null);
  const [users, setUsers] = useState([]);
  const [conversationData, setConversationData] = useState([]);

  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : 0;

  // Fetch users
  const fetchUserList = async () => {
    try {
      const response = await axios.get(
        `${process.env.REACT_APP_API_URL}/messages/users/${userId}`
      );
      setUsers(response.data);
    } catch (error) {
      console.error("Error fetching users:", error);
    }
  };

  // Fetch conversation data
  const fetchConversation = async (user2Id) => {
    try {
      const response = await axios.get(
        `${process.env.REACT_APP_API_URL}/messages/${userId}/${user2Id}`
      );
      setConversationData(response.data);
    } catch (error) {
      console.error("Error fetching conversation:", error);
    }
  };

  // Append new message dynamically
  const appendMessage = (newMessage) => {
    setConversationData((prevData) => [...prevData, newMessage]);
  };

  // Handle click event to switch chats
  const handleConversationClick = (user2Id) => {
    if (user2Id !== activeConversation) {
      setActiveConversation(user2Id);
      fetchConversation(user2Id);
    }
  };

  useEffect(() => {
    if (userId) {
      fetchUserList();
    }
  }, [userId]);

  return (
    <div className="col-lg-9 col-md-8">
      <div className="messages-container margin-top-0">
        <div className="messages-headline">
          <h4>Messages</h4>
        </div>
        <div className="messages-container-inner">
          <div className="dash-msg-inbox">
            <ul style={{ height: "550px" }}>
              {users.map((user) => (
                <MessageItem
                  key={user.id}
                  imgSrc={
                    user.user2.profile_image ||
                    "assets/default_images/default_image.png"
                  }
                  userName={user.user2.name}
                  time={user.last_message_time}
                  message={
                    user.user2.about?.length > 20
                      ? `${user.user2.about.slice(0, 20)}...`
                      : user.user2.about
                  }
                  status="offline"
                  isActive={activeConversation === user.user2.id}
                  onClick={() => handleConversationClick(user.user2.id)}
                />
              ))}
            </ul>
          </div>
          <div className="dash-msg-content">
            <MessageContent
              senderId={activeConversation}
              conversationData={conversationData}
              appendMessage={appendMessage} // Pass function to add messages
            />
            <div className="clearfix" />
            <MessageReply
              senderId={userId}
              receiverId={activeConversation}
              onMessageSent={() => fetchConversation(activeConversation)}
            />
          </div>
        </div>
      </div>
    </div>
  );
};

export default Messages;
