import React, { useEffect, useState } from "react";
import axios from "axios";
import TeamCard from "../cards/TeamCard"; // Assuming TeamCard is a separate component for each team member

const OurTeam = () => {
  const [teamMembers, setTeamMembers] = useState([]);

  useEffect(() => {
    // Fetch team member data from backend
    axios
      .get(`${process.env.REACT_APP_API_URL}/ourTeam`) // Replace with your actual API endpoint
      .then((response) => {
        setTeamMembers(response.data);
      })
      .catch((error) => {
        console.error("Error fetching team members:", error);
      });
  }, []);

  return (
    <section>
      <div className="container">
        <div className="row">
          <div className="col-lg-12 col-md-12">
            <div className="sec-heading center">
              <h2>Meet Our Team</h2>
              <p>Professional & Dedicated Team</p>
            </div>
          </div>
        </div>

        <div className="row">
          <div className="col-lg-12 col-md-12 col-sm-12">
            <div className="team-slide item-slide">
              {teamMembers.length > 0 ? (
                teamMembers.map((member) => (
                  <TeamCard key={member.id} member={member} />
                ))
              ) : (
                <div className="sec-heading center">
                  <h4>There is no data to show.</h4>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default OurTeam;
