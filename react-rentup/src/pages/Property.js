import React, { useEffect, useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";
import Swal from "sweetalert2";
import Gallery from "../components/property/Gallery";
import Sidebar from "../components/property/Sidebar";
import Details from "../components/property/Details";

const Property = ({ onFavoriteCountChange }) => {
  const location = useLocation();
  const navigate = useNavigate();
  const [property, setProperty] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const queryParams = new URLSearchParams(location.search);
    const id = queryParams.get("id");
    const user = JSON.parse(sessionStorage.getItem("user")); // Get the user object
    const userId = user ? user.id : 0;
    if (!id) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Property ID is missing!",
        confirmButtonText: "OK",
      }).then((result) => {
        if (result.isConfirmed) {
          navigate("/search");
        }
      });
      return;
    }

    const fetchProperty = async () => {
      try {
        const response = await fetch(
          `http://127.0.0.1:8000/api/property/${id}?userId=${userId}`
        );
        if (!response.ok) {
          // Property not found
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "The property does not exist!",
            confirmButtonText: "OK",
          }).then((result) => {
            if (result.isConfirmed) {
              navigate("/search");
            }
          });
        } else {
          const data = await response.json();
          setProperty(data);
          setLoading(false);

          onFavoriteCountChange(data.favourite_count);
        }
      } catch (error) {
        console.error("Failed to fetch property:", error);
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Something went wrong!",
          confirmButtonText: "OK",
        }).then((result) => {
          if (result.isConfirmed) {
            navigate("/search");
          }
        });
      }
    };

    fetchProperty();
  }, [location, navigate]);

  return (
    <>
      {loading ? (
        <p>Loading...</p>
      ) : property ? (
        <>
          <Gallery images={property.images} />
          <section className="pt-4">
            <div className="container">
              <div className="row">
                <Details
                  onFavoriteCountChange={onFavoriteCountChange}
                  property={{ ...property, owner: undefined }}
                />
                <Sidebar
                  BookInfo={{ id: property.id, price: property.price }}
                  owner={property.owner}
                  agent={property.ownerReviews}
                />
              </div>
            </div>
          </section>
        </>
      ) : (
        // If property data is not available, user will be redirected and SweetAlert will trigger
        <p>Property not found. Redirecting...</p>
      )}
    </>
  );
};

export default Property;
