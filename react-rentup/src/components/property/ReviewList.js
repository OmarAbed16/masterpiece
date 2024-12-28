import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";

const ReviewList = ({ Reviews }) => {
  console.log(Reviews);
  console.log("g");
  const user = JSON.parse(sessionStorage.getItem("user")); // Get user from sessionStorage
  const userId = user ? user.id : 0;
  const navigate = useNavigate(); // Initialize the navigate function

  // Function to handle the "Say Hello" click
  const handleSayHello = async (receiverId, senderId) => {
    // Custom functionality to send the "Hello" message
    try {
      const response = await axios.post(
        `${process.env.REACT_APP_API_URL}/messages/add`,
        {
          sender_id: senderId,
          receiver_id: receiverId,
          message: "Hello",
        }
      );

      if (response.status === 201 || response.status === 200) {
        console.log("Message sent successfully");

        // After sending the message, navigate to the profile page
        navigate(`/profile?page=messages&user=${receiverId}`);
      }
    } catch (error) {
      console.error("Error sending message:", error);
    }
  };

  return (
    <div className="author-review">
      <div className="comment-list">
        <ul>
          {Reviews.map((Review, index) => (
            <li key={index} className="article_comments_wrap">
              <article>
                <div className="article_comments_thumb">
                  <img
                    style={{ height: "50px", width: "50px" }}
                    src={Review.user.profile_image}
                    alt=""
                  />
                </div>
                <div className="comment-details">
                  <div className="comment-meta">
                    <div className="comment-left-meta">
                      <h4 className="author-name">
                        {Review.user.name}{" "}
                        {Review.user.id &&
                          userId !== 0 &&
                          Review.user.id !== userId && (
                            <button
                              onClick={
                                () => handleSayHello(Review.user.id, userId) // Trigger the function with userId and Review.user.id
                              }
                              className="btn btn-primary btn-sm ms-2"
                            >
                              Say Hello👋
                            </button>
                          )}
                      </h4>
                      <div className="comment-date">
                        {new Date(Review.created_at).toLocaleDateString(
                          "en-GB",
                          {
                            day: "2-digit",
                            month: "long",
                            year: "numeric",
                            daySuffix: true,
                          }
                        )}
                      </div>

                      <div className="rating">
                        {Array.from({ length: 5 }, (_, index) => (
                          <i
                            key={index}
                            className={`fa fa-star ${
                              index < Review.rating ? "filled" : "empty"
                            }`}
                            style={{
                              color: index < Review.rating ? "gold" : "grey",
                            }}
                          ></i>
                        ))}
                      </div>
                    </div>
                  </div>
                  <div className="comment-text" style={{ margin: "0px" }}>
                    <p>{Review.comment}</p>
                  </div>
                </div>
              </article>
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
};

export default ReviewList;
