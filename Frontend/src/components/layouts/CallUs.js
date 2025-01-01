import React from "react";
import { Link } from "react-router-dom";

const CallUs = () => {
  return (
    <section className="bg-danger call_action_wrap-wrap">
      <div className="container">
        <div className="row">
          <div className="col-lg-12">
            <div className="call_action_wrap">
              <div className="call_action_wrap-head">
                <h3>Do You Have Questions?</h3>
                <span>We'll help you to grow your career and growth.</span>
              </div>
              <Link to="/contact" className="btn btn-call_action_wrap">
                Contact Us Today
              </Link>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default CallUs;
