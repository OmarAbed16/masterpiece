import React, { useEffect, useState } from "react";
import axios from "axios";
import ReviewCard from "../cards/ReviewCard"; // Assuming ReviewCard is a separate component

const Reviews = () => {
  const [reviews, setReviews] = useState([]);

  useEffect(() => {
    // Fetch reviews from the backend API
    axios
      .get("/api/reviews") // Replace with your actual API endpoint
      .then((response) => {
        setReviews(response.data);
      })
      .catch((error) => {
        console.error("Error fetching reviews:", error);
      });
  }, []);

  return (
    <section className="gray-simple">
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-lg-7 col-md-8">
            <div className="sec-heading center">
              <h2>Good Reviews By Clients</h2>
              <p>
                Our clients’ success is our greatest achievement. Each review
                reflects our dedication to excellence, innovation, and trust.
              </p>
            </div>
          </div>
        </div>

        <div className="row">
          <div className="col-lg-12 col-md-12">
            <div className="item-slide space">
              {reviews.length > 0 ? (
                reviews.map((review) => (
                  <ReviewCard key={review.id} review={review} />
                ))
              ) : (
                <div className="sec-heading center">
                  <h4>There are no reviews to show.</h4>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Reviews;
