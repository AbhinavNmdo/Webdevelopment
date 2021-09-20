console.log("Hello this is news websitee");
let api = '4b9a730640b741a3ac715d982fa4f689';
let source = 'the-times-of-india';

// Grab the News Card
let newsCards = document.getElementById('newsCards');

// Create new Ajax get request
const xhr = new XMLHttpRequest();
xhr.open('GET', `https://newsapi.org/v2/top-headlines?country=in&apiKey=${api}`, true);

// What to do on responce
xhr.onload = function() {
    if(this.status === 200){
        let json = JSON.parse(this.responseText);
        console.log(json);
        let articles = json.articles;
        let hmtl = "";
        articles.forEach(function(element, index){
            let text = `<div class="card text-center my-4">
                            <div class="card-header">
                                From ${element.source.name}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">${element.title}</h5>
                                <p class="card-text">${element.description}</p>
                                <a href="${element.url}" class="btn btn-primary" target="_blank">Read More</a>
                            </div>
                            <div class="card-footer text-muted">
                                Updated At: ${element.publishedAt}
                            </div>
                        </div>`;
            hmtl += text;
        });
        newsCards.innerHTML = hmtl;
    }
    else{
        console.log("something is wrong")
    }
};
xhr.send();