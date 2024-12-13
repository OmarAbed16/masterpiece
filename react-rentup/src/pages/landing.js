import React from "react";
import HeroBanner from "../components/landing/HeroBanner";
import Recent from "../components/landing/Recent";
import OurTeam from "../components/landing/OurTeam";
import ExploreByLocation from "../components/landing/ExploreByLocation";
import Reviews from "../components/landing/Reviews";
import CallUs from "../components/layouts/CallUs";

const Landing = () => {
  return (
    <div>
      {/* Hero Banner Section */}
      <HeroBanner />
      <Recent />
      <OurTeam />
      <ExploreByLocation />
      <Reviews />
      {/* Call Us Section */}
      <CallUs />

      {/* Other components if needed, like Footer */}
    </div>
  );
};

export default Landing;
