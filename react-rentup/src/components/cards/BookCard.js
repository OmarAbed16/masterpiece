import { useState } from "react";

function BookCard({ BookInfo }) {
  const [checkinDate, setCheckinDate] = useState(
    new Date().toISOString().split("T")[0]
  );

  return (
    <div className="sider_blocks_wrap">
      <div className="side-booking-header">
        <div className="sb-header-left">
          <h3 className="price">
            ${BookInfo.price}
            <sub>/Night</sub>
          </h3>
        </div>
      </div>
      <div className="side-booking-body">
        <div className="row">
          <div className="col-lg-6 col-md-6 col-sm-6 col-6">
            <div className="form-group">
              <label>Check In</label>
              <div className="cld-box">
                <input
                  type="date"
                  name="checkin"
                  className="form-control"
                  min={new Date().toISOString().split("T")[0]} // Prevent past dates
                  value={checkinDate}
                  onChange={(e) => setCheckinDate(e.target.value)}
                />
              </div>
            </div>
          </div>
          <div className="col-lg-6 col-md-6 col-sm-6 col-6">
            <div className="form-group">
              <label>Check Out</label>
              <div className="cld-box">
                <input
                  type="date"
                  name="checkout"
                  className="form-control"
                  min={checkinDate} // Ensure checkout is after check-in
                />
              </div>
            </div>
          </div>
          <div className="col-lg-6 col-md-6 col-sm-6 col-6">
            <div className="form-group">
              <div>
                <label htmlFor="guests">Adults</label>
                <div className="guests-box">
                  <button className="counter-btn" type="button" id="cnt-down">
                    <i className="ti-minus" />
                  </button>
                  <input
                    type="text"
                    id="guestNo"
                    name="guests"
                    defaultValue={2}
                  />
                  <button className="counter-btn" type="button" id="cnt-up">
                    <i className="ti-plus" />
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div className="col-lg-6 col-md-6 col-sm-6 col-6">
            <div className="form-group">
              <div className="guests">
                <label>Kids</label>
                <div className="guests-box">
                  <button className="counter-btn" type="button" id="kcnt-down">
                    <i className="ti-minus" />
                  </button>
                  <input type="text" id="kidsNo" name="kids" defaultValue={0} />
                  <button className="counter-btn" type="button" id="kcnt-up">
                    <i className="ti-plus" />
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div className="col-lg12 col-md-12 col-sm-12 mt-3">
            <h6>Price &amp; Tax</h6>
            <div className="_adv_features">
              <ul>
                <li>
                  I Night<span>$310</span>
                </li>

                <li>
                  Service Fee<span>$17</span>
                </li>
                <li>
                  Breakfast Per Adult<span>$35</span>
                </li>
              </ul>
            </div>
          </div>
          <div className="side-booking-foot">
            <span className="sb-header-left">Total Payment</span>
            <h3 className="price text-danger">$170</h3>
          </div>
          <div className="col-lg-12 col-md-12 col-sm-12">
            <div className="stbooking-footer mt-1">
              <div className="form-group mb-0 pb-0">
                <a href="#" className="btn btn-danger full-width fw-medium">
                  Book It Now
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default BookCard;
