console.log("Hello this is news websitee");
let api = '4b9a730640b741a3ac715d982fa4f689';
let source = 'the-times-of-india';

// Grab the News Card
let newsCards = document.getElementById('newsCards');

// Create new Ajax get request
const xhr = new XMLHttpRequest();
xhr.open('GET', `GET https://newsapi.org/v2/top-headlines?country=in&apiKey=${api}`, true);

// What to do on responce
xhr.onload = function() {
    if(this.status == 200){
        console.log('all ok');
    }
    else{
        console.log("something is wrong")
    }
}