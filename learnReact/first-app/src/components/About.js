import React from "react";

function About(props) {
  return (
    <>
      <div Style="height: 100vh; width: 100%; display: flex; justify-content: center; align-item: center;">
        <div className="card" style={{backgroundColor: props.mode==='dark'?'grey':'white'}} Style="width: 18rem; height: 25rem; border-radius: 20px;">
          <div className="card-body" style={{color: props.mode==='dark'?'white':'black'}}>
            <h5 className="card-title">Card title</h5>
            <p className="card-text">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
          </div>
        </div>
      </div>
    </>
  );
}

export default About;
