const http = require('http')
const fs = require('fs')

const hostname = '127.0.0.1';
const port = 3000;

const home = fs.readFileSync('test2.html')
const clothes = fs.readFileSync('Clothes.html')
const about = fs.readFileSync('AboutUs.html')
const contact = fs.readFileSync('Contact.html')
const gallery = fs.readFileSync('Gallery.html')
const logo = fs.readFileSync('logo3.png')

const server = http.createServer((req, res)=>{
    console.log(req.url)
    url = req.url

    res.statusCode = 200
    res.setHeader = ('Content-type','text/html')

    if (url == '/'){
        res.end(home)
    }
    else if (url == '/Test2.html'){
        res.end(home)
    }
    else if (url == '/Clothes.html'){
        res.end(clothes)
    }
    else if (url == '/AboutUs.html'){
        res.end(about)
    }
    else if (url == '/Gallery.html'){
        res.end(gallery)
    }
    else if (url == '/Contact.html'){
        res.end(contact)
    }
    else if (url == '/logo3.png'){
        res.end(logo)
    }
    else {
        res.statusCode = 404;
        res.end("<h1>404 not found</h1>");
    }
})

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
  });