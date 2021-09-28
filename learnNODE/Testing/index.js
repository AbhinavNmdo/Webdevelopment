const hbs = require('hbs');
const express = require('express');
const data = require('./data/dbconn.js');
const path = require('path');
const app = express();
const port = 5000;
const fs = require('fs');
const categories = require('./model/categories.js')

app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'views'))

app.get('/', (req, res)=>{
    categories.find(function(err, data){
        res.render('index', {
            data:data
        })
    })
    
});

app.listen(port, ()=>{
    console.log("All OK")
});