import React from "react";

const ProfileEdit = ({ title }) => {
  return (
    <>
      <div className="col-lg-9 col-md-8 col-sm-12">
        <div className="dashboard-body">
          <div className="dashboard-wraper">
            {/* Basic Information */}
            <div className="frm_submit_block">
              <h4>My Account</h4>
              <div className="frm_submit_wrap">
                <div className="form-row row">
                  <div className="form-group col-md-6">
                    <label>Your Name</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="Shaurya Preet"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>Email</label>
                    <input
                      type="email"
                      className="form-control"
                      defaultValue="preet77@gmail.com"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>Your Title</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="Web Designer"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>Phone</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="123 456 5847"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>Address</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="522, Arizona, Canada"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>City</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="Montquebe"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>State</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="Canada"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>Zip</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue={160052}
                    />
                  </div>
                  <div className="form-group col-md-12">
                    <label>About</label>
                    <textarea
                      className="form-control"
                      defaultValue={
                        "Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper"
                      }
                    />
                  </div>
                </div>
              </div>
            </div>
            <div className="frm_submit_block">
              <h4>Social Accounts</h4>
              <div className="frm_submit_wrap">
                <div className="form-row row">
                  <div className="form-group col-md-6">
                    <label>Facebook</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="https://facebook.com/"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>Twitter</label>
                    <input
                      type="email"
                      className="form-control"
                      defaultValue="https://twitter.com/"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>Google Plus</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="https://googleplus.com/"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label>LinkedIn</label>
                    <input
                      type="text"
                      className="form-control"
                      defaultValue="https://linkedin.com/"
                    />
                  </div>
                  <div className="form-group col-lg-12 col-md-12 mt-4">
                    <button className="btn btn-danger btn-lg" type="submit">
                      Save Changes
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileEdit;
