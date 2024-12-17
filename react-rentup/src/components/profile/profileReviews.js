import React from "react";

const ProfileReviews = ({ title }) => {
  return (
    <>
      <div className="col-lg-9 col-md-8 col-sm-12">
        <div className="dashboard-body">
          <div className="dashboard-wraper">
            {/* Bookmark Property */}
            <div className="frm_submit_block">
              <h4>Bookmark Property</h4>
            </div>
            <table className="property-table-wrap responsive-table bkmark">
              <tbody>
                <tr>
                  <th>
                    <i className="fa fa-file-text" /> Property
                  </th>
                  <th />
                </tr>
                {/* Item #1 */}
                <tr>
                  <td className="dashboard_propert_wrapper">
                    <img src="assets/img/p-2.png" alt="" />
                    <div className="title">
                      <h4>
                        <a href="#">Serene Uptown</a>
                      </h4>
                      <span>6 Bishop Ave. Perkasie, PA </span>
                      <span className="table-property-price">
                        $900 / monthly
                      </span>
                    </div>
                  </td>
                  <td className="action">
                    <a href="#" className="delete">
                      <i className="ti-close" /> Delete
                    </a>
                  </td>
                </tr>
                {/* Item #2 */}
                <tr>
                  <td className="dashboard_propert_wrapper">
                    <img src="assets/img/p-3.png" alt="" />
                    <div className="title">
                      <h4>
                        <a href="#">Oak Tree Villas</a>
                      </h4>
                      <span>71 Lower River Dr. Bronx, NY</span>
                      <span className="table-property-price">$535,000</span>
                    </div>
                  </td>
                  <td className="action">
                    <a href="#" className="delete">
                      <i className="ti-close" /> Delete
                    </a>
                  </td>
                </tr>
                {/* Item #3 */}
                <tr>
                  <td className="dashboard_propert_wrapper">
                    <img src="assets/img/p-4.png" alt="" />
                    <div className="title">
                      <h4>
                        <a href="#">Selway Villas</a>
                      </h4>
                      <span>33 William St. Northbrook, IL </span>
                      <span className="table-property-price">$420,000</span>
                    </div>
                  </td>
                  <td className="action">
                    <a href="#" className="delete">
                      <i className="ti-close" /> Delete
                    </a>
                  </td>
                </tr>
                {/* Item #4 */}
                <tr>
                  <td className="dashboard_propert_wrapper">
                    <img src="assets/img/p-5.png" alt="" />
                    <div className="title">
                      <h4>
                        <a href="#">Town Manchester</a>
                      </h4>
                      <span> 7843 Durham Avenue, MD</span>
                      <span className="table-property-price">$420,000</span>
                    </div>
                  </td>
                  <td className="action">
                    <a href="#" className="delete">
                      <i className="ti-close" /> Delete
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileReviews;
