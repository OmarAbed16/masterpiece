import React from "react";

const TeamCard = ({ member }) => {
  return (
    <div className="single-team">
      <div className="team-grid">
        {/* Team Member Image */}
        <div className="teamgrid-user">
          <img
            src={member.profile_image}
            alt={member.name}
            className="img-fluid"
          />
        </div>

        {/* Team Member Content */}
        <div className="teamgrid-content">
          <h4>{member.name}</h4>
        </div>

        {/* Team Member Social Links */}
        <div className="teamgrid-social">
          <ul>
            {/* Phone Link */}
            <li>
              <a
                href={`tel:${member.phone_number}`}
                className="f-cl"
                aria-label={`Call ${member.phone_number}`}
              >
                <i className="fas fa-phone"></i>
              </a>
            </li>

            {/* Email Link */}
            <li>
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
  );
};

export default TeamCard;
