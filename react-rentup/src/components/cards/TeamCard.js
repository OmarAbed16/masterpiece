import React from "react";

const TeamCard = ({ member }) => {
  return (
    <div className="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div className="single-team">
        <div className="team-grid" style={styles.card}>
          {/* Team Member Image */}
          <div className="teamgrid-user">
            <img
              src={member.profile_image || "https://via.placeholder.com/150"}
              alt={member.name}
              className="img-fluid"
            />
          </div>

          {/* Team Member Content */}
          <div className="teamgrid-content text-center">
            <h4>{member.name}</h4>
            <p>{member.position}</p>
          </div>

          {/* Team Member Social Links */}
          <div className="teamgrid-social text-center">
            <ul className="list-unstyled d-flex justify-content-center">
              {/* Phone Link */}
              <li className="mx-2">
                <a
                  href={`tel:${member.phone_number}`}
                  className="f-cl"
                  aria-label={`Call ${member.phone_number}`}
                >
                  <i className="fas fa-phone"></i>
                </a>
              </li>

              {/* Email Link */}
              <li className="mx-2">
                <a
                  href={`mailto:${member.email}`}
                  className="t-cl"
                  aria-label={`Email ${member.email}`}
                >
                  <i className="fas fa-envelope"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
};

const styles = {
  card: {
    boxShadow: "0px 10px 20px rgba(0, 0, 0, 0.4)",
    transition: "transform 0.3s ease, box-shadow 0.3s ease",
  },
};

export default TeamCard;
