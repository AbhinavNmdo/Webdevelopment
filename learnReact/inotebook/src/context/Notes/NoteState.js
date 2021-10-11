import { useState } from "react";
import NoteContext from "./NoteContext";

const NoteState = (props) => {
  const host = "http://localhost:5000";
  const notesInitial = [];
  const [notes, setNotes] = useState(notesInitial);
  const [alert, setAlert] = useState(null);

  // Fetching the logidin user notes
  const getNote = async () => {
    let responce = await fetch(`${host}/api/notes/allnotes`, {
      method: "GET",
      headers: {
        "Content-type": "application/json",
        "auth-token":
          "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM",
      },
    });
    let json = await responce.json();
    console.log(json);
    setNotes(json);
  };

  // Adding notes
  const addNote = async (title, description) => {
    let responce = await fetch(`${host}/api/notes/addnote`, {
      method: "POST",
      headers: {
        "Content-type": "application/json",
        "auth-token":
          "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM",
      },
      body: JSON.stringify({ title, description }),
    });

    const note = {
      title: title,
      description: description,
    };
    setNotes(notes.concat(note));
  };

  // Deleting notes
  const deleteNote = async (_id) => {
    let responce = await fetch(`${host}/api/notes/deletenote/${_id}`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
        "auth-token":
          "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM",
      },
    });

    let newNote = notes.filter((note) => {
      return note._id !== _id;
    });
    setNotes(newNote);
  };

  // Editing notes
  const editNote = async (_id, title, description) => {
    console.log(_id);
    console.log("1");
    let responce = await fetch(`${host}/api/notes/updatenote/${_id}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "auth-token":
          "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM",
      },
      body: JSON.stringify({ title, description }),
    });
    let json = responce.json();

    const newNote = JSON.parse(JSON.stringify(notes));
    for (let index = 0; index < newNote.length; index++) {
      const element = newNote[index];
      if (element._id == _id) {
        console.log("2");
        newNote[index].title = title;
        newNote[index].description = description;
        break;
      }
    }
    setNotes(newNote);
  };


  return (
    <NoteContext.Provider
      value={{ notes, editNote, deleteNote, addNote, getNote }}
    >
      {props.children}
    </NoteContext.Provider>
  );
};

export default NoteState;
