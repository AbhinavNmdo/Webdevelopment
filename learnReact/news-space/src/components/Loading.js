import React, { Component } from "react";
import loading from "./loading.gif";

export class Loading extends Component {
  render() {
    return (
      <div>
        <img className="text-center" src={loading} alt="loading" />
      </div>
    );
  }
}

export default Loading;
