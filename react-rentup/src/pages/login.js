import React from "react";

const Login = () => {
  return (
    <div
      className="login-container"
      style={{
        maxWidth: "900px",
        margin: "50px auto",
        border: "1px solid #ddd",
        borderRadius: "10px",
        overflow: "hidden",
        boxShadow: "0 4px 6px rgba(0, 0, 0, 0.1)",
      }}
    >
      <div className="modal-dialog modal-xl login-pop-form">
        <div className="modal-content overli">
          <div className="modal-body p-0">
            <div className="resp_log_wrap">
              <div
                className="resp_log_thumb"
                style={{
                  background: "url(assets/img/slider-3.jpg) no-repeat center",
                  backgroundSize: "cover",
                }}
              ></div>
              <div className="resp_log_caption">
                <div className="edlio_152">
                  <ul
                    className="nav nav-pills tabs_system center"
                    id="pills-tab"
                    role="tablist"
                  >
                    <li className="nav-item">
                      <button
                        className="nav-link active"
                        id="pills-login-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-login"
                        role="tab"
                        aria-controls="pills-login"
                        aria-selected="true"
                      >
                        <i className="fas fa-sign-in-alt me-2"></i>Login
                      </button>
                    </li>
                    <li className="nav-item">
                      <button
                        className="nav-link"
                        id="pills-signup-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-signup"
                        role="tab"
                        aria-controls="pills-signup"
                        aria-selected="false"
                      >
                        <i className="fas fa-user-plus me-2"></i>Register
                      </button>
                    </li>
                  </ul>
                </div>
                <div className="tab-content" id="pills-tabContent">
                  {/* Login Form */}
                  <div
                    className="tab-pane fade show active"
                    id="pills-login"
                    role="tabpanel"
                    aria-labelledby="pills-login-tab"
                  >
                    <div className="login-form">
                      <form>
                        <div className="form-group">
                          <label>Email</label>
                          <div className="input-with-icon">
                            <input
                              type="text"
                              className="form-control"
                              placeholder="Enter your Email"
                            />
                            <i className="ti-user"></i>
                          </div>
                        </div>
                        <div className="form-group">
                          <label>Password</label>
                          <div className="input-with-icon">
                            <input
                              type="password"
                              className="form-control"
                              placeholder="Enter your Password"
                            />
                            <i className="ti-unlock"></i>
                          </div>
                        </div>
                        <div className="form-group">
                          <button
                            type="submit"
                            className="btn btn-danger fw-medium full-width"
                          >
                            Login
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>

                  {/* Register Form */}
                  <div
                    className="tab-pane fade"
                    id="pills-signup"
                    role="tabpanel"
                    aria-labelledby="pills-signup-tab"
                  >
                    <div className="login-form">
                      <form>
                        <div className="form-group">
                          <label>Full Name</label>
                          <div className="input-with-icon">
                            <input
                              type="text"
                              className="form-control"
                              placeholder="Enter your Name"
                            />
                            <i className="ti-user"></i>
                          </div>
                        </div>
                        <div className="form-group">
                          <label>Email ID</label>
                          <div className="input-with-icon">
                            <input
                              type="email"
                              className="form-control"
                              placeholder="Enter your Email"
                            />
                            <i className="ti-user"></i>
                          </div>
                        </div>
                        <div className="form-group">
                          <label>Password</label>
                          <div className="input-with-icon">
                            <input
                              type="password"
                              className="form-control"
                              placeholder="Enter your Password"
                            />
                            <i className="ti-unlock"></i>
                          </div>
                        </div>
                        <div className="form-group">
                          <label>Confirm Password</label>
                          <div className="input-with-icon">
                            <input
                              type="password"
                              className="form-control"
                              placeholder="Confirm your Password"
                            />
                            <i className="ti-unlock"></i>
                          </div>
                        </div>
                        <div className="form-group">
                          <button
                            type="submit"
                            className="btn btn-danger fw-medium full-width"
                          >
                            Register
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Login;
