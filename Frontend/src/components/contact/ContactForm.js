import React from "react";
import Swal from "sweetalert2";
const ContactForm = () => {
  const onSubmit = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);

    formData.append("access_key", "81e74902-df9c-42b7-a2cb-2702b3ede709");

    const object = Object.fromEntries(formData);
    const json = JSON.stringify(object);

    const res = await fetch("https://api.web3forms.com/submit", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: json,
    }).then((res) => res.json());

    if (res.success) {
      Swal.fire({
        title: "Success!",
        text: "Message sent successfully",
        icon: "success",
      });
    } else {
      Swal.fire({
        title: "Failed!",
        text: "Message failed!",
        icon: "error",
      });
    }
  };

  return (
    <form onSubmit={onSubmit}>
      <div className="property_block_wrap">
        <div className="property_block_wrap_header">
          <h4 className="property_block_title">Fillup The Form</h4>
        </div>

        <div className="block-body">
          <div className="row">
            <div className="col-lg-6 col-md-12">
              <div className="form-group">
                <label>Name</label>
                <input
                  type="text"
                  className="form-control simple"
                  id="name"
                  name="name"
                  required
                />
              </div>
            </div>
            <div className="col-lg-6 col-md-12">
              <div className="form-group">
                <label>Email</label>
                <input
                  type="email"
                  className="form-control simple"
                  id="email"
                  name="email"
                  required
                />
              </div>
            </div>
          </div>

          <div className="form-group">
            <label>Subject</label>
            <input
              type="text"
              className="form-control simple"
              id="subject"
              name="subject"
              required
            />
          </div>

          <div className="form-group">
            <label>Message</label>
            <textarea
              className="form-control simple"
              id="message"
              name="message"
              required
            ></textarea>
          </div>

          <div className="form-group">
            <button className="btn btn-danger" type="submit">
              Submit Request
            </button>
          </div>
        </div>
      </div>
    </form>
  );
};

export default ContactForm;
