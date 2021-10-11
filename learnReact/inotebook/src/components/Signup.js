import React, { useState } from "react";

const Signup = () => {

    const [credentials, setCredentials] = useState({name: "", email: "", password: ""})

    const onChange = (e)=>{
        setCredentials({...credentials, [e.target.name]: e.target.value});
    };

    const submitSignup = async (e)=>{
        e.preventDefault();
        const responce = await fetch("http://localhost:5000/api/auth/signup", {
            method: 'POST',
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify({name: credentials.name, email: credentials.email, password: credentials.password})
        });
        const json = await responce.json();
        console.log(json);

    }

  return (
    <div
      className="container d-flex flex-column justify-content-center align-items-center"
      style={{ height: "79vh" }}
    >
      <h1 className="p-3">Login</h1>

      <div className="card p-2" style={{ width: "20rem", height: "auto" }}>
        <form onSubmit={submitSignup}>
          <div className="mb-3">
            <label htmlFor="email" className="form-label">
              Your Name
            </label>
            <input
              type="text"
              className="form-control"
              id="name"
              name="name"
              onChange={onChange}
              value={credentials.name}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="email" className="form-label">
              Email address
            </label>
            <input
              type="email"
              className="form-control"
              id="email"
              name="email"
              onChange={onChange}
              value={credentials.email}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="password" className="form-label">
              Password
            </label>
            <input
              type="password"
              className="form-control"
              id="password"
              name="password"
              onChange={onChange}
              value={credentials.password}
            />
          </div>
          <button type="submit" className="btn btn-primary">
            SignUp
          </button>
        </form>
      </div>
    </div>
  );
};

export default Signup;
