import React from "react";
import "./Gallery.css";
import Carousel from "react-bootstrap/Carousel";
const Gallery = ({ images }) => {
  return (
    <>
      <section className="gallery_parts pt-2 pb-2   ">
        <div className="container">
          <div className="row align-items-center">
            <Carousel className="col-lg-8 col-md-12 col-sm-12 pr-1">
              {images.map((image, index) => (
                <Carousel.Item key={index}>
                  <img
                    className="gallery-image d-block w-100"
                    src={image.image_url}
                    alt={`Slide ${index + 1}`}
                  />
                </Carousel.Item>
              ))}
            </Carousel>

            <div className="col-lg-4 col-md-5 col-sm-12 pl-1  d-none d-sm-none d-md-none d-lg-block d-xl-block">
              {images.slice(0, 3).map((image, index) => (
                <div
                  style={{ height: "170px" }}
                  key={index}
                  className={`gg_single_part-right  ${
                    index === 1 ? "mt-3 mb-3" : ""
                  }`}
                >
                  <a className="mfp-gallery h-100">
                    <img
                      src={image.image_url}
                      className="img-fluid full-width rounded object-fit h-100"
                      alt="property image"
                    />
                  </a>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>
    </>
  );
};

export default Gallery;
