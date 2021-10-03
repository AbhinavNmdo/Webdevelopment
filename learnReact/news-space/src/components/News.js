import React, { Component } from "react";
import NewsCards from "./NewsCards";
import Loading from "./Loading";
import "./css/News.css";

export class News extends Component {
  static defaultProps = {
    pageSize: 10,
    category: 'space'
  };

  constructor() {
    super();
    console.log("Hello i am a constructor");
    this.state = {
      articles: [],
      loading: false,
      page: 1
    };
  }

  async componentDidMount() {
    // let url =`https://newsapi.org/v2/everything?q=${this.props.category}&apiKey=4b9a730640b741a3ac715d982fa4f689&page=1&pageSize=${this.props.pageSize}`;
    let url = `https://newsapi.org/v2/top-headlines?country=in&category=${this.props.category}&apiKey=4b9a730640b741a3ac715d982fa4f689&page=1&pagesize=${this.props.pageSize}`;
    this.setState({loading: true});
    let data = await fetch(url);
    let parsedData = await data.json();
    console.log(parsedData);
    this.setState({
      articles: parsedData.articles,
      totalResults: parsedData.totalResults,
      loading: false
    });
  }

  handlenextclick = async () => {
    console.log("Previous");
    // let url = `https://newsapi.org/v2/everything?q=${this.props.category}&apiKey=4b9a730640b741a3ac715d982fa4f689&page=${this.state.page + 1}&pageSize=${this.props.pageSize}`;
    let url = `https://newsapi.org/v2/top-headlines?country=in&category=${this.props.category}&apiKey=4b9a730640b741a3ac715d982fa4f689&page=${this.state.page + 1}&pagesize=${this.props.pageSize}`;
    this.setState({loading: true});
    let data = await fetch(url);
    let parsedData = await data.json();
    console.log(parsedData);
    this.setState({
      page: this.state.page + 1,
      articles: parsedData.articles,
      loading: false,
    });
  };

  handleprevclick = async () => {
    console.log("Next");
    if (!(this.state.page + 1 > Math.ceil(this.state.totalResults / 10))) {
      // let url = `https://newsapi.org/v2/everything?q=${this.props.category}&apiKey=4b9a730640b741a3ac715d982fa4f689&page=${this.state.page - 1}&pageSize=${this.props.pageSize}`;
      let url = `https://newsapi.org/v2/top-headlines?country=in&category=${this.props.category}&apiKey=4b9a730640b741a3ac715d982fa4f689&page=${this.state.page - 1}&pagesize=${this.props.pageSize}`;
      this.setState({loading: true});
      let data = await fetch(url);
      let parsedData = await data.json();
      console.log(parsedData);
      this.setState({
        page: this.state.page - 1,
        articles: parsedData.articles,
        loading: false,
      });
    }
  };

  render() {
    return (
      <>
        <div className="container text-center">
          {this.state.loading && <Loading/>}
        </div>
        <div id="header">
          <h1 align="center" id="header-title">
            Welcome to NewsSpace
          </h1>
          <p align="center" id="header-para">
            You can find Space related News Daily
          </p>
        </div>
        <div className="container margin">
          <h1 id="news-heading">News</h1>
          <div className="row">
            {!this.state.loading && this.state.articles.map((element) => {
              return (
                <NewsCards
                  key={element.url}
                  title={element.title}
                  desc={element.description}
                  image={element.urlToImage}
                  url={element.url}
                  published={element.publishedAt}
                />
              );
            })}
          </div>
        </div>
        <div className="container d-flex justify-content-around">
          <button
            disabled={this.state.page <= 1}
            type="button"
            onClick={this.handleprevclick}
            className="btn btn-info"
          >
            Previous
          </button>
          <button
            disabled={this.state.page + 1 > Math.ceil(this.state.totalResults / 10)}
            type="button"
            onClick={this.handlenextclick}
            className="btn btn-info"
          >
            Next
          </button>
        </div>
        <br />
        <br />
        <br />
      </>
    );
  }
}

export default News;
