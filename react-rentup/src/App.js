import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Header from "./components/header/Header";
import Footer from "./components/footer/Footer";
import Landing from "./pages/landing";
import ContactUs from "./pages/contactus"; // Import your contact page

import Login from "./pages/Login"; // Import your login page
import Register from "./pages/Register";
import Search from "./pages/Search";
import AboutUs from "./pages/aboutUs";

const App = () => {
  return (
    <Router>
      <div>
        <Header />

        {/* Define Routes for each page */}
        <Routes>
          <Route path="/" element={<Landing />} />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
          <Route path="/search" element={<Search />} />
          <Route path="/about" element={<AboutUs />} />
          <Route path="/contact" element={<ContactUs />} />
        </Routes>

        <Footer />
      </div>
    </Router>
  );
};

export default App;
