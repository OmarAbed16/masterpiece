import React from "react";

const ReviewList = ({ Reviews }) => {
  return (
    <div className="author-review">
      <div className="comment-list">
        <ul>
          {Reviews.map((Review, index) => (
            <li key={index} className="article_comments_wrap">
              <article>
                <div className="article_comments_thumb">
                  <img src={Review.user.profile_image} alt="" />
                </div>
                <div className="comment-details">
                  <div className="comment-meta">
                    <div className="comment-left-meta">
                      <h4 className="author-name">{Review.user.name}</h4>
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
