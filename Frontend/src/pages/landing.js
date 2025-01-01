import React, { useEffect } from "react";
import HeroBanner from "../components/landing/HeroBanner";
import Recent from "../components/landing/Recent";
import Reviews from "../components/landing/Reviews";
import CallUs from "../components/layouts/CallUs";
import OurTeam from "../components/landing/OurTeam";

const Landing = ({ onFavoriteCountChange }) => {
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
