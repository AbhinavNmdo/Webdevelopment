import React, { useContext, useEffect, useRef, useState } from "react";
import NoteContext from "../context/Notes/NoteContext";
import NotesCards from "./NotesCards";

const NotesContent = () => {
  const context = useContext(NoteContext);
  const ref = useRef(null);
  const { notes, getNote } = context;

  useEffect(() => {
    getNote();
  }, []);

  const [note, setNote] = useState({etitle: "", edescription: ""})

  const updateNote = (currentNote)=>{
    ref.current.click();
    setNote({etitle: currentNote.title, edescription: currentNote.description})
  }

  const handleClick = (e)=>{
    console.log("Updating notes....");
    e.preventDefault();
  }

  const handleChange = (e)=>{
    setNote({...note, [e.target.name]: e.target.value})
  }

  return (
    <>
      <button
        type="button"
        class="btn btn-primary d-none"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
        ref={ref}
      >
        Launch
      </button>

      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Edit Note
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form>
                <div className="mb-3">
                  <label htmlFor="etitle" className="form-label">
                    <strong>Title</strong>
                  </label>
                  <input
                    type="text"
                    className="form-control"
                    id="etitle"
                    name="etitle"
                    aria-describedby="emailHelp"
                    min="1"
                    onChange={handleChange}
                    value={note.etitle}
                  />
                </div>
                <div className="mb-3">
                  <label htmlFor="edescription" className="form-label">
                    <strong>Description</strong>
                  </label>
                  <textarea
                    className="form-control"
                    id="edescription"
                    onChange={handleChange}
                    name="edescription"
                    value={note.edescription}
                  />
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick={handleClick}>
                Update
              </button>
            </div>
          </div>
        </div>
      </div>




      <div className="row">
        <h1 style={{ display: "flex", justifyContent: "center" }}>
          Your iNotes
        </h1>
        {notes.map((note) => {
          return <NotesCards key={note._id} note={note} updateNote={updateNote}/>;
        })}
      </div>
    </>
  );
};

export default NotesContent;
