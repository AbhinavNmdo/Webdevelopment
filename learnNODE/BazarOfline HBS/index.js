const hbs = require('hbs');
const express = require('express');
const database = require('./data/_dbconnect.js');
const path = require('path');
const app = express();
const port = 5000;
const categories = require('./models/categories.js');
app.use(express.static(path.join(__dirname, "views/Images")));

hbs.registerHelper('trimString', function(passedString, startstring, endstring) {
    var theString = passedString.substring( startstring, endstring );
    return new hbs.SafeString(theString)
});

app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'views'));
hbs.registerPartials(path.join(__dirname, 'views/partials'));
app.use('/', require(path.join(__dirname, 'routes/home.js')));


app.listen(port, ()=>{
    console.log("All done with Server");
});