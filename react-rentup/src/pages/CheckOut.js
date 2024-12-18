import React from "react";
import ContactBox from "../components/contact/ContactBox";
import ContactForm from "../components/contact/ContactForm";
import GoogleMap from "../components/contact/GoogleMap";
import PageTitle from "../components/contact/PageTitle";

const CheckOut = () => {
  return (
    <div>
      <PageTitle />
      <section className="pt-0">
        <div className="container">
          <div className="row align-items-center pretio_top">
            <ContactBox
              icon="ti-shopping-cart"
              title="Contact Sales"
              email="omarFathiAbed@gmail.com"
              phone="+962 781616916"
            />
            <ContactBox
              icon="ti-user"
              title="Contact Support"
              email="omarFathiAbed@gmail.com"
              phone="+962 781616916"
            />
            <ContactBox
              icon="ti-comment-alt"
              title="Live Chat"
              email="omarFathiAbed@gmail.com"
              phone="+962 781616916"
              liveChat
            />
          </div>

          <div className="row">
            <div className="col-lg-8 col-md-7">
              <ContactForm />
            </div>

            <GoogleMap />
          </div>
        </div>
      </section>
    </div>
  );
};

export default CheckOut;
