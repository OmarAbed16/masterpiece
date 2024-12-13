import React, { useEffect } from "react";
import HeroBanner from "../components/landing/HeroBanner";
import Recent from "../components/landing/Recent";
import ExploreByLocation from "../components/landing/ExploreByLocation";
import Reviews from "../components/landing/Reviews";
import CallUs from "../components/layouts/CallUs";

// Import slick carousel
import $ from "jquery";
import "slick-carousel";

const Landing = () => {
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
      <Recent />

      <ExploreByLocation />
      <Reviews />
      <CallUs />
    </div>
  );
};

export default Landing;
