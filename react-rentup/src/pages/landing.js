import React, { useEffect } from "react";
import HeroBanner from "../components/landing/HeroBanner";
import Recent from "../components/landing/Recent";
import Reviews from "../components/landing/Reviews";
import CallUs from "../components/layouts/CallUs";
import OurTeam from "../components/landing/OurTeam";

// Import slick carousel
import $ from "jquery";
import "slick-carousel";

const Landing = ({ onFavoriteCountChange }) => {
  useEffect(() => {
    // Initialize slick carousel after component mounts
    $(".slick-carousel").slick({
      // Your slick settings here
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: true,
    });
  }, []);

  return (
    <div>
      <HeroBanner />
      <Recent onFavoriteCountChange={onFavoriteCountChange} />
      <OurTeam />
      <Reviews />
      <CallUs />
    </div>
  );
};

export default Landing;
