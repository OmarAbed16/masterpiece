import React from "react";
import HeroBanner from "../components/header/landing/HeroBanner";
import CallUs from "../components/layouts/CallUs";

const Landing = () => {
  return (
    <div>
      {/* Hero Banner Section */}
      <HeroBanner />

      {/* Call Us Section */}
      <CallUs />

      {/* Other components if needed, like Footer */}
    </div>
  );
};

export default Landing;
