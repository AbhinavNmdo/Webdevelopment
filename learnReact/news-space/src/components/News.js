import React, { Component } from "react";
import NewsCards from "./NewsCards";
import './css/News.css'

export class News extends Component {
articles = [
  {
      "source": {
          "id": "cnn-es",
          "name": "CNN Spanish"
      },
      "author": "CNN",
      "title": "Octubre espacial: misión Lucy, dos lluvias de meteoros y más de SpaceX",
      "description": "Calendario espacial de octubre: la primera misión a los asteroides troyanos de Júpiter, dos lluvias de meteoros y más de SpaceX",
      "url": "https://cnnespanol.cnn.com/2021/10/01/eventos-octubre-la-primera-mision-a-los-asteroides-troyanos-de-jupiter-dos-lluvias-de-meteoros-y-mas-de-spacex-orix/",
      "urlToImage": "https://cnnespanol.cnn.com/wp-content/uploads/2021/10/GettyImages-1283228524.jpeg?quality=100&strip=info",
      "publishedAt": "2021-10-02T02:04:17Z",
      "content": "Perseverance de NASA, sin comunicación durante 2 semanas 0:42\r\n(CNN Español) -- Concluidos los viajes de turismo espacial, octubre se llena de espectáculos astronómicos y un par de lanzamientos al es… [+5938 chars]"
  },
  {
      "source": {
          "id": "techcrunch",
          "name": "TechCrunch"
      },
      "author": "Connie Loizos",
      "title": "Chamath Palihapitiya speaks to SPAC concerns, from fees to disclosures to quality",
      "description": "It was almost exactly two years ago that a special purpose acquisition vehicle (SPAC) spearheaded by investor Chamath Palihapitiya took public the space tourism company Virgin Galactic. It was the first human spaceflight company to trade on the NYSE — or any …",
      "url": "https://techcrunch.com/2021/10/01/chamath-palihapitiya-speaks-to-spac-concerns-from-fees-to-disclosures-to-quality/",
      "urlToImage": "https://techcrunch.com/wp-content/uploads/2019/06/GettyImages-615650710-e1633132470632.jpg?w=627",
      "publishedAt": "2021-10-02T00:30:30Z",
      "content": "It was almost exactly two years ago that a special purpose acquisition vehicle (SPAC) spearheaded by investor Chamath Palihapitiya took public the space tourism company Virgin Galactic. It was the fi… [+1497 chars]"
  },
  {
      "source": {
          "id": "bbc-news",
          "name": "BBC News"
      },
      "author": "BBC News",
      "title": "Europe's BepiColombo space probe zips past Mercury",
      "description": "The spacecraft has its first high-speed encounter with the innermost planet of the Solar System.",
      "url": "http://www.bbc.co.uk/news/science-environment-58754882",
      "urlToImage": "https://ichef.bbci.co.uk/news/1024/branded_news/29E7/production/_120772701_bepicolombo_first_mercury.jpg",
      "publishedAt": "2021-10-02T00:07:18.367531Z",
      "content": "Jonathan AmosScience correspondent@BBCAmoson Twitter\r\nImage source, ESA/ATG medialab\r\nImage caption, Artwork: Bepi has five further flybys planned to get itself into orbit\r\nEurope's BepiColombo missi… [+5336 chars]"
  },
  {
      "source": {
          "id": "ars-technica",
          "name": "Ars Technica"
      },
      "author": "Eric Berger",
      "title": "After years of futility, NASA turns to private sector for spacesuit help",
      "description": "\"A flight-ready suit remains years away from completion.\"",
      "url": "https://arstechnica.com/science/2021/10/after-years-of-futility-nasa-turns-to-private-sector-for-spacesuit-help/",
      "urlToImage": "https://cdn.arstechnica.net/wp-content/uploads/2021/10/NHQ201910150006_large-760x380.jpg",
      "publishedAt": "2021-10-01T18:48:39+00:00",
      "content": "Enlarge/ NASA Administrator Jim Bridenstine high-fives Kristine Davis, a spacesuit engineer at NASAs Johnson Space Center, wearing a ground prototype of NASAs new Exploration Extravehicular Mobility … [+4511 chars]"
  },
  {
      "source": {
          "id": "t3n",
          "name": "T3n"
      },
      "author": "Andreas Weck",
      "title": "„Ich muss alles, was ich tue, visualisieren“ – Dari Shechter von Mindspace",
      "description": "In der Serie „5 Dinge, ohne die ich nicht arbeiten kann“ fragen wir Webworker, worauf sie im Job nicht verzich",
      "url": "https://t3n.de/news/dari-shechter-mindspace-portrait-1412399/",
      "urlToImage": "https://t3n.de/news/wp-content/uploads/2021/10/dari-shechter-mindspace.jpg",
      "publishedAt": "2021-10-01T15:00:30Z",
      "content": "In der Serie „5 Dinge, ohne die ich nicht arbeiten kann“ fragen wir Webworker, worauf sie im Job nicht verzichten können. Heute zu Gast: Dari Shechter von Mindspace.\r\nDari Shechter ist VP Creation an… [+2628 chars]"
  }
]

constructor(){
  super();
  console.log("Hello i am a constructor");
  this.state = {
    articles: this.articles,
    loading: false
  }
}

  render() {
    return (
      <>
      <div id="header">
        <h1 align="center" id="header-title">Welcome to NewsSpace</h1>
        <p align="center" id="header-para">You can find Space related News Daily</p>
      </div>
      <div className="container">
        <div className="row">
          {this.state.articles.map((element)=>{
            return <NewsCards key={element.url} title={element.title} desc={element.description} image={element.urlToImage} url={element.url} published={element.publishedAt} />
          })}
        </div>
      </div>
      </>
    );
  }
}

export default News;
