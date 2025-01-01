import React from "react";

const GoogleMap = ({ colLg = 4, colMd = 5, height = 455 }) => {
  return (
    <div className={`col-lg-${colLg} col-md-${colMd}`}>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13538.629293053125!2d35.89952861721893!3d31.970191989060613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca1dd7bca79dd%3A0x9b0416f056ff0786!2sOrange%20Digital%20Village!5e0!3m2!1sen!2sjo!4v1733421971649!5m2!1sen!2sjo"
        width="100%"
        height={height}
        style={{ border: 0 }}
        allowFullScreen=""
        loading="lazy"
      ></iframe>
    </div>
  );
};

export default GoogleMap;
