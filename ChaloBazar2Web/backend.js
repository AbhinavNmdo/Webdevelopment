const express = require("express")
const app = express();
const bodyParser = require('body-parser');
const mongoose = require("mongoose")
const port = 80;
const path = require("path")
const fs = require("fs");
const { send } = require("process");
const { FILE } = require("dns");


mongoose.connect('mongodb://localhost:27017/ChaloBazar', {useNewUrlParser: true, useUnifiedTopology: true});
app.set('view engine', 'html');
app.engine('html', require('ejs').renderFile);
app.use(express.urlencoded())
app.use(express.static(path.join(__dirname, 'views')));


app.get("/", (req, res) => {
    res.status(200).render('index.html')
})

app.get("/contact", (req, res) => {
    res.status(200).render('contact.html')
})

app.get("/views/contactStyle.css", (req, res) =>{
    res.status(200).render('contactStyle.css')
})

// Mongoose Stuffs
const contactSchema = new mongoose.Schema({
    name: String,
    age: Number,
    email: String,
    address: String,
    phone: Number,
    photo: String
})

const contactSchemaModel = new mongoose.model('Contact', contactSchema)


app.post("/contact", (req, res)=>{
    var mydata = new contactSchemaModel(req.body)
    mydata.save(function (error, mydata) {
        if (error){
            res.render('contact.html')
        }
    });
    res.render('contact.html')
})

app.listen(port, () => {
    console.log("Connected")
})
