import React, { useContext } from "react";
import NoteContext from "../context/Notes/NoteContext";
import NotesCards from "./NotesCards";

const NotesContent = () => {
  const context = useContext(NoteContext);
  const {notes, setNotes} = context;
  return (
    <div className="row">
      <h1 style={{ display: "flex", justifyContent: "center" }}>Your iNotes</h1>
      {notes.map((note)=>{
          return <NotesCards key={note._id} note={note}/>
      })}
    </div>
  );
};

export default NotesContent;
