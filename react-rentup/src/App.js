import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Header from "./components/header/Header";
import Footer from "./components/footer/Footer";
import Landing from "./pages/landing";
import ContactUs from "./pages/contactus"; // Import your contact page
import Login from "./pages/login"; // Import your login page

const App = () => {
  return (
    <Router>
      <div>
        <Header />

        {/* Define Routes for each page */}
        <Routes>
          <Route path="/" element={<Landing />} /> {/* Landing Page */}
          <Route path="/contact" element={<ContactUs />} />{" "}
          {/* Contact Us Page */}
          <Route path="/login" element={<Login />} /> {/* Login Page */}
        </Routes>

        <Footer />
      </div>
    </Router>
  );
};

export default App;
