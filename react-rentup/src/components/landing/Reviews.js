import React, { useState, useEffect } from "react";
import ReviewCard from "../cards/ReviewCard";
import axios from "axios";

const Reviews = () => {
  const [reviews, setReviews] = useState([]);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchReviews = async () => {
      try {
        const response = await axios.get(
          `${process.env.REACT_APP_API_URL}/recentReviews`
        );
        setReviews(response.data);
      } catch (err) {
        setError("Failed to fetch reviews");
      }
    };

    fetchReviews();
  }, []);

  if (error) {
    return <p>{error}</p>;
  }

  if (reviews.length === 0) {
    return <p>No reviews found.</p>;
  }

  return (
    <section className="gray-simple">
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-lg-7 col-md-8">
            <div className="sec-heading center">
              <h2>Good Reviews By Clients</h2>
              <p>
                Our clients value the quality and dedication we bring. See how
                we've made a positive impact and earned their trust.
              </p>
            </div>
          </div>
        </div>

        <div className="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center">
          {reviews.map((review, index) => (
            <ReviewCard key={index} review={review} />
          ))}
        </div>
      </div>
    </section>
  );
};

export default Reviews;
