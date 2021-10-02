import React, { Component } from "react";

export class NewsCards extends Component {
  render() {
    let { title, desc, image, url, published } = this.props;
    return (
      // <div className="col-md-4">
      //   <div className="card m-4" style={{width: '18rem', borderRadius: '20px'}}>
      //     <img src={image} className="card-img-top" alt="..." style={{borderRadius: '20px'}} />
      //     <div className="card-body">
      //       <h5 className="card-title">{title}</h5>
      //       <p className="card-text">
      //         {desc}
      //       </p>
      //       <a href={url} className="btn btn-sm btn-primary">
      //         Read More
      //       </a>
      //     </div>
      //   </div>
      // </div>
      <div
        class="card mb-5"
        style={{ borderRadius: "25px", border: "0.01rem solid grey" }}
      >
        <div class="row g-0">
          <div class="col-md-4">
            <img
              src={image}
              class="img-fluid"
              alt="..."
              style={{ borderRadius: "25px" }}
            />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{title}</h5>
              <p class="card-text mt-4">{desc}</p>
              <a href={url} className="btn btn-sm btn-info">
                Read More
              </a>
              <div className="bottom-align-text">
                <p class="card-text">
                  <small class="text-muted">Published At: {published}</small>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default NewsCards;
