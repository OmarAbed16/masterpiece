import React from "react";
import { GoogleLogin } from "@react-oauth/google";
import { jwt_decode } from "jwt-decode";

const GoogleLoginButton = () => {
  const handleSuccess = (response) => {
    console.log("Login Success:", response);
    const userInfo = jwt_decode(response.credential);
    console.log("User Info:", userInfo);
  };

  const handleError = () => {
    console.log("Login Failed");
  };

  return (
    <div>
      <GoogleLogin onSuccess={handleSuccess} onError={handleError} />
    </div>
  );
};

export default GoogleLoginButton;
