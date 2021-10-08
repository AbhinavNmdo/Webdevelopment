import { useState } from "react";
import NoteContext from "./NoteContext";

const NoteState = (props)=>{
    const notesInitial = [
        {
            "_id": "asldfaesdfasdf",
            "title": "title",
            "description":"description"
        },
        {
            "_id": "asldfasdtfasdf",
            "title": "title",
            "description":"description"
        },
        {
            "_id": "asldfgasdfasdf",
            "title": "title",
            "description":"description"
        },
        {
            "_id": "asldfaasdfasdf",
            "title": "title",
            "description":"description"
        },
        {
            "_id": "asldfsasdfasdf",
            "title": "title",
            "description":"description"
        },
        {
            "_id": "asldfdasdfasdf",
            "title": "title",
            "description":"description"
        },
        {
            "_id": "asldffasdfasdf",
            "title": "title",
            "description":"description"
        },
    ];
    const [notes, setNotes] = useState(notesInitial);
    const addNote = (title, description)=>{
        const note = {
            "title": title,
            "description":description
        };
        setNotes(notes.concat(note))
    };

    const deleteNote = (id)=>{
        console.log(id);
    };

    const editNote = ()=>{

    };
    return (
        <NoteContext.Provider value={{notes, editNote, deleteNote, addNote}}>
            {props.children}
        </NoteContext.Provider>
    )
}

export default NoteState;