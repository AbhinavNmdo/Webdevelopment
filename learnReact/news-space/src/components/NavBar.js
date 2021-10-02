import React, { Component } from "react";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

export class NavBar extends Component {
  render() {
    return (
      <Router>
      <nav className="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div className="container-fluid">
          <Link className="navbar-brand" to="/">
            News Space
          </Link>
          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav me-auto mb-2 mb-lg-0">
              <li className="nav-item">
                <Link className="nav-link active" aria-current="page" to="/">
                  Home
                </Link>
              </li>
              <li class="nav-item dropdown">
                <Link
                  class="nav-link dropdown-toggle"
                  to="/"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Other News
                </Link>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <Link class="dropdown-item" to="/General">
                      General
                    </Link>
                  </li>
                  <li>
                    <Link class="dropdown-item" to="/Business">
                      Business
                    </Link>
                  </li>
                  <li>
                    <Link class="dropdown-item" to="/Entertainment">
                      Entertainment
                    </Link>
                  </li>
                  <li>
                    <Link class="dropdown-item" to="/Health">
                      Health
                    </Link>
                  </li>
                  <li>
                    <Link class="dropdown-item" to="/Science">
                      Science
                    </Link>
                  </li>
                  <li>
                    <Link class="dropdown-item" to="/Sports">
                      Sports
                    </Link>
                  </li>
                  <li>
                    <Link class="dropdown-item" to="/Technology">
                      Technology
                    </Link>
                  </li>
                </ul>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/About">
                  About
                </Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      </Router>
    );
  }
}

export default NavBar;
