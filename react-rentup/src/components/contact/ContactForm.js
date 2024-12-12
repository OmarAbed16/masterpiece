import React from "react";

const ContactForm = () => {
  return (
    <div className="property_block_wrap">
      <div className="property_block_wrap_header">
        <h4 className="property_block_title">Fillup The Form</h4>
      </div>

      <div className="block-body">
        <div className="row">
          <div className="col-lg-6 col-md-12">
            <div className="form-group">
              <label>Name</label>
              <input type="text" className="form-control simple" />
            </div>
          </div>
          <div className="col-lg-6 col-md-12">
            <div className="form-group">
              <label>Email</label>
              <input type="email" className="form-control simple" />
            </div>
          </div>
        </div>

        <div className="form-group">
          <label>Subject</label>
          <input type="text" className="form-control simple" />
        </div>

        <div className="form-group">
          <label>Message</label>
          <textarea className="form-control simple"></textarea>
        </div>

        <div className="form-group">
          <button className="btn btn-danger" type="submit">
            Submit Request
          </button>
        </div>
      </div>
    </div>
  );
};

export default ContactForm;
