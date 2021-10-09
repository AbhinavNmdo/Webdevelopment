import { useState } from "react";
import NoteContext from "./NoteContext";

const NoteState = (props)=>{
    const host = "http://localhost:5000";
    const notesInitial = [];
    const [notes, setNotes] = useState(notesInitial);

    const getNote = async ()=>{
        let responce = await fetch(`${host}/api/notes/allnotes`,{
            method: 'GET',
            headers: {
                "Content-type": "application/json",
                "auth-token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM"
            }
        });
        let json = await responce.json();
        console.log(json);
        setNotes(json);

    }

    const addNote = async (title, description)=>{
        let responce = await fetch(`${host}/api/notes/addnote`,{
            method: 'POST',
            headers: {
                "Content-type": "application/json",
                "auth-token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM"
            },
            body: JSON.stringify({title, description})
        });

        const note = {
            "title": title,
            "description":description
        };
        setNotes(notes.concat(note))
    };

    const deleteNote = async (_id)=>{
        let responce = await fetch(`${host}/api/notes/deletenote/${_id}`,{
            method: 'DELETE',
            headers: {
                "Content-Type": "application/json",
                "auth-token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM"
            }
        });

        let newNote = notes.filter((note)=>{return note._id !== _id });
        setNotes(newNote);

    };

    const editNote = async (_id, title, description)=>{
        let responce = await fetch(`${host}/api/notes/updatenote/${_id}`,{
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "auth-token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoiNjE1ZDQ1YjU3YzFjMjc0M2NkYzE5MmMxIn0sImlhdCI6MTYzMzUwMjgzN30.O6KsdEbEZzvv5efEPDbp3iKhqiERAftpgLEMtxle9vM"
            },
            body: JSON.stringify({title, description})
        });
        let json =  responce.json();
        
        for (let index = 0; index < notes.length; index++) {
            const element = notes[index];
            if(element._id === _id){
                element.title = title;
                element.description = description;
            };
        }
    };
    return (
        <NoteContext.Provider value={{notes, editNote, deleteNote, addNote, getNote}}>
            {props.children}
        </NoteContext.Provider>
    )
}

export default NoteState;