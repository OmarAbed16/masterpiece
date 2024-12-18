// aboutUs.js
import React from "react";
import PageTitle from "../components/about/PageTitle"; // Adjust the path if necessary
import OurStory from "../components/about/OurStory"; // Adjust the path if necessary

const AboutUs = () => {
  return (
    <>
      <PageTitle
        title="About Us - Who We Are?"
        backgroundImage="background: #f4f4f4"
        overlay="5"
      />
      <OurStory />
    </>
  );
};

export default AboutUs;
