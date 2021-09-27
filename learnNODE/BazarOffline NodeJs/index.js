const express = require('express');
const data = require('./data/_dbconnect');
const mongoose = require('mongoose');
const app = express();
const exphbs = require('express-handlebars');
const port = 8000;
const path = require('path');
const db = mongoose.connection;

app.use(express.static(path.join(__dirname, "views")))
app.engine('handlebars', exphbs());
app.set('view engine', 'handlebars');

app.get('/', (req, res, next) => {
    const collection = db.collection('categories');
    collection.find((err, docs)=>{
        res.render('home', {
            category:docs
        });
    });
    // res.render('home', {
    //     categories: req.cat
    // });
});

app.listen(port, () => {
    console.log(`Listning at http://localhost:${port}`)
});