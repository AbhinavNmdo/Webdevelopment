import React, { Component } from "react";
import NewsCards from "./NewsCards";

export class News extends Component {
  render() {
    return (
      <div className="container">
        <div className="row">
          <NewsCards />
          <NewsCards />
          <NewsCards />
          <NewsCards />
        </div>
      </div>
    );
  }
}

export default News;
