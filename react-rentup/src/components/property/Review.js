import React from "react";

const Review = () => {
  return (
    <>
      <div className="property_block_wrap">
        <div className="property_block_wrap_header">
          <h4 className="property_block_title">Write a Review</h4>
        </div>
        <div className="block-body">
          <div className="row">
            <div className="col-lg-6 col-md-6 col-sm-12">
              <div className="form-group">
                <label>Name</label>
                <input type="text" className="form-control" />
              </div>
            </div>
            <div className="col-lg-6 col-md-6 col-sm-12">
              <div className="form-group">
                <label>eMmail ID</label>
                <input type="email" className="form-control" />
              </div>
            </div>
            <div className="col-lg-12 col-md-12 col-sm-12">
              <div className="form-group">
                <label>Messages</label>
                <textarea className="form-control ht-80" defaultValue={""} />
              </div>
            </div>
            <div className="col-lg-12 col-md-12 col-sm-12">
              <div className="form-group">
                <button className="btn btn-danger rounded" type="submit">
                  Submit Review
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Review;
