// src/App.js
import React, { useState } from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Header from "./components/header/Header";
import Footer from "./components/footer/Footer";
import Landing from "./pages/landing";
import ContactUs from "./pages/contactus";
import Login from "./pages/Login";
import Register from "./pages/Register";
import Search from "./pages/Search";
import AboutUs from "./pages/aboutUs";
import NotFound from "./pages/NotFound";
import { AuthProvider } from "./pages/AuthContext"; // Import your AuthContext
import Property from "./pages/Property";
import Profile from "./pages/profile";

const App = () => {
  const [favoriteCount, setFavoriteCount] = useState(0);

  const handleFavoriteCountChange = (newCount) => {
    setFavoriteCount(newCount);
  };

  return (
    <Router>
      <AuthProvider>
        <Header favoriteCount={favoriteCount} />
        {/* Pass favorite count as prop */}
        <Routes>
          <Route
            path="/"
            element={
              <Landing onFavoriteCountChange={handleFavoriteCountChange} />
            }
          />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
          <Route
            path="/search"
            element={
              <Search onFavoriteCountChange={handleFavoriteCountChange} />
            }
          />
          <Route
            path="/property"
            element={
              <Property onFavoriteCountChange={handleFavoriteCountChange} />
            }
          />
          <Route
            path="/profile"
            element={
              <Profile onFavoriteCountChange={handleFavoriteCountChange} />
            }
          />
          <Route path="/about" element={<AboutUs />} />
          <Route path="/contact" element={<ContactUs />} />
          <Route path="*" element={<NotFound />} />
        </Routes>
        <Footer />
      </AuthProvider>
    </Router>
  );
};

export default App;
