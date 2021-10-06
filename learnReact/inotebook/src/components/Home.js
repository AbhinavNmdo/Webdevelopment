import React, { useContext, useEffect } from "react";

const Home = () => {
  return (
    <>
      <div>
        <div className="container" style={{height: '90vh', display: 'flex', alignItems: 'center', justifyContent: 'center', flexDirection: 'column'}}>
        <h1 className="my-4">
          iNoteBook
        </h1>
          <div className="card p-4 mb-5">
            <form style={{width: '500px'}}>
              <div className="mb-3">
                <label for="exampleInputEmail1" className="form-label">
                  <strong>Title</strong>
                </label>
                <input
                  type="text"
                  className="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  min="1"
                />
              </div>
              <div className="mb-3">
                <label for="exampleInputPassword1" className="form-label">
                  <strong>Description</strong>
                </label>
                <textarea className="form-control" id="exampleInputPassword1" />
                <div id="emailHelp" class="form-text">Scroll to see your Notes</div>
              </div>
              <button type="submit" className="btn btn-primary">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
      <div className="container" style={{display: 'flex', height: '90vh'}}>
        <h1 style={{display: 'flex', justifyContent: 'center'}}>Your iNotes</h1>
      </div>
    </>
  );
};

export default Home;
