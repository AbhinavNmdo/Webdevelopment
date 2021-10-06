import React, { useContext, useEffect } from "react";
import NoteContext from "../context/Notes/NoteContext";

const Home = () => {
  const a = useContext(NoteContext);
  
  useEffect(() => {
    return () => {
      a.update();
      // eslint-disable-next-line
    }
  }, [a])

  return (
    <div>
      <h1>I am {a.state.name} and my role is {a.state.role}</h1>
    </div>
  );
};

export default Home;
