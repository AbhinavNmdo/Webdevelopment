import { useState } from "react";
import NoteContext from "./NoteContext";

const NoteState = (props)=>{
    const notesInitial = [
        {
            "title": "title",
            "description":"description"
        },
        {
            "title": "title",
            "description":"description"
        },
        {
            "title": "title",
            "description":"description"
        },
        {
            "title": "title",
            "description":"description"
        },
        {
            "title": "title",
            "description":"description"
        },
        {
            "title": "title",
            "description":"description"
        },
        {
            "title": "title",
            "description":"description"
        },
    ];
    const [notes, setNotes] = useState(notesInitial);
    return (
        <NoteContext.Provider value={{notes, setNotes}}>
            {props.children}
        </NoteContext.Provider>
    )
}

export default NoteState;