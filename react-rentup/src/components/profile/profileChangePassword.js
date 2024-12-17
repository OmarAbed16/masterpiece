import React from "react";

const ProfileChangePassword = ({ title }) => {
  return (
    <>
      <div className="col-lg-9 col-md-8">
        <div className="dashboard-body">
          <div className="dashboard-wraper">
            {/* Basic Information */}
            <div className="frm_submit_block">
              <h4 className="ms-3 mb-4">Change Your Password</h4>
              <div className="frm_submit_wrap">
                <div className="form-row">
                  <div className="form-group col-lg-7 col-md-10">
                    <label>Old Password</label>
                    <input type="password" className="form-control" />
                  </div>
                  <div className="form-group col-lg-7 col-md-10">
                    <label>New Password</label>
                    <input type="password" className="form-control" />
                  </div>
                  <div className="form-group col-lg-7 col-md-10">
                    <label>Confirm password</label>
                    <input type="password" className="form-control" />
                  </div>
                  <div className="form-group col-lg-7 col-md-10">
                    <button className="btn btn-danger" type="submit">
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

export default ProfileChangePassword;
