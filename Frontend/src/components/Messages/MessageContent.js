import { useEffect } from "react";
import MessageUser from "./MessageUser";
import Pusher from "pusher-js";

const MessageContent = ({ conversationData, appendMessage, senderId }) => {
  const user = JSON.parse(sessionStorage.getItem("user"));
  const userId = user ? user.id : 0;
  console.log(conversationData);

  useEffect(() => {
    // Setup Pusher
    Pusher.logToConsole = false;

    const pusher = new Pusher("1e951c14abce150d3b43", {
      cluster: "eu",
    });

    const channel = pusher.subscribe(`chat.${senderId}.${userId}`);
    channel.bind("message", (data) => {
      console.log("New message received:", data.message);

      // Append the new message dynamically
      appendMessage(data.message);
    });

    // Cleanup
    return () => {
      pusher.unsubscribe(`chat.${senderId}.${userId}`);
    };
  }, [userId, appendMessage]);

  return (
    <div
      className="dash-msg-content"
      style={{ overflowY: "scroll", height: "250px" }}
    >
      {conversationData && conversationData.length > 0 ? (
        conversationData.map((message, index) => {
          const isMe = message.sender_id === userId;

          return (
            <MessageUser
              key={index}
              avatar={message.user.profile_image}
              text={message.message}
              date={message.created_at}
              isMe={isMe}
            />
          );
        })
      ) : (
        <p>Select a conversation to view messages</p>
      )}
    </div>
  );
};

export default MessageContent;
