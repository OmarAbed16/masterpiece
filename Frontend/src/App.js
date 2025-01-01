import React, { useState } from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Header from "./components/header/Header";
import Footer from "./components/footer/Footer";
import Login from "./pages/Login";
import Register from "./pages/Register";
import Landing from "./pages/landing";
import Search from "./pages/Search";
import Property from "./pages/Property";
import ContactUs from "./pages/contactus";
import AboutUs from "./pages/aboutUs";
import Profile from "./pages/profile";
import { AuthProvider } from "./pages/AuthContext";
import NotFound from "./pages/NotFound";
import Chatbot from "./pages/chatbot";

const App = () => {
  const [favoriteCount, setFavoriteCount] = useState(0);

  const handleFavoriteCountChange = (newCount) => {
    setFavoriteCount(newCount);
  };

  return (
    <Router>
      <AuthProvider>
        <Header favoriteCount={favoriteCount} />

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
        <Chatbot />
        <Footer />
      </AuthProvider>
    </Router>
  );
};

export default App;
