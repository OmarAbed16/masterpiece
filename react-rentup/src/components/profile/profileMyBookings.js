import React from "react";

const ProfileMyBookings = ({ title }) => {
  return (
    <>
      <div className="col-lg-9 col-md-8 col-sm-12">
        <div className="dashboard-body">
          <div className="row">
            <div className="col-lg-12 col-md-12">
              <div className="_prt_filt_dash">
                <div className="_prt_filt_dash_flex">
                  <div className="foot-news-last">
                    <div className="input-group">
                      <input
                        type="text"
                        className="form-control"
                        placeholder="Email Address"
                      />
                      <div className="input-group-append">
                        <span
                          type="button"
                          className="input-group-text bg-danger border-0 text-light"
                        >
                          <i className="fas fa-search" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="_prt_filt_dash_last m2_hide">
                  <div className="_prt_filt_radius"></div>
                  <div className="_prt_filt_add_new">
                    <a
                      href="submit-property-dashboard.html"
                      className="prt_submit_link"
                    >
                      <i className="fas fa-plus-circle" />
                      <span className="d-none d-lg-block d-md-block">
                        List New Property
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col-lg-12 col-md-12">
              <div className="dashboard_property">
                <div className="table-responsive">
                  <table className="table">
                    <thead className="thead-dark">
                      <tr>
                        <th scope="col">Property</th>
                        <th scope="col" className="m2_hide">
                          Leads
                        </th>
                        <th scope="col" className="m2_hide">
                          Stats
                        </th>
                        <th scope="col" className="m2_hide">
                          Posted On
                        </th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-1.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="active">Active</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-2.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="expire">Expired</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-3.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="active">Active</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-4.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="expire">Expired</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-5.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="active">Active</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-6.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="active">Active</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-7.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="expire">Expired</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-8.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="active">Active</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                      {/* tr block */}
                      <tr>
                        <td>
                          <div className="dash_prt_wrap">
                            <div className="dash_prt_thumb">
                              <img
                                src="assets/img/p-9.png"
                                className="img-fluid"
                                alt=""
                              />
                            </div>
                            <div className="dash_prt_caption">
                              <h5>4 Bhk Luxury Villa</h5>
                              <div className="prt_dashb_lot">
                                5682 Brown River Suit 18
                              </div>
                              <div className="prt_dash_rate">
                                <span>$ 2,200,000</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="prt_leads">
                            <span>27 till now</span>
                          </div>
                          <div className="prt_leads_list">
                            <ul>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="_leads_name style-1">
                                  K
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="assets/img/team-1.jpg"
                                    className="img-fluid circle"
                                    alt=""
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#" className="leades_more">
                                  10+
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_view">
                            <h5 className="up">816</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>Total Views</span>
                          </div>
                        </td>
                        <td className="m2_hide">
                          <div className="_leads_posted">
                            <h5>16 Aug - 12:40</h5>
                          </div>
                          <div className="_leads_view_title">
                            <span>16 Days ago</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_status">
                            <span className="expire">Expired</span>
                          </div>
                          <div className="_leads_view_title">
                            <span>Till 12 Oct</span>
                          </div>
                        </td>
                        <td>
                          <div className="_leads_action">
                            <a href="#">
                              <i className="fas fa-edit" />
                            </a>
                            <a href="#">
                              <i className="fas fa-trash" />
                            </a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          {/* row */}
        </div>
      </div>
    </>
  );
};

export default ProfileMyBookings;
