const express = require("express")
const app = express();
const bodyParser = require('body-parser');
const mongoose = require("mongoose")
const port = 80;
const path = require("path")


mongoose.connect('mongodb://localhost:27017/ChaloBazar', {useNewUrlParser: true, useUnifiedTopology: true});
app.set('view engine', 'html');
app.engine('html', require('ejs').renderFile);
app.use(express.urlencoded())
app.use(express.static(path.join(__dirname, 'views')));


app.get("/", (req, res) => {
    res.status(200).render('index.html')
})

app.get("/login", (req, res) => {
    res.status(200).render('login.html')
})

app.get("/registration", (req, res) => {
    res.status(200).render('registration.html')
})

app.get("/views/contactStyle.css", (req, res) =>{
    res.status(200).render('contactStyle.css')
})

// Mongoose Stuffs
const contactSchema = new mongoose.Schema({
    name: String,
    pan: String,
    email: String,
    address: String,
    phone: Number,
    password: String
})

const contactSchemaModel = new mongoose.model('Contact', contactSchema)


app.post("/registration", (req, res)=>{
    var mydata = new contactSchemaModel(req.body)
    mydata.save(function (error, mydata) {
        if (error){
            res.render('registration.html')
        }
    });
    res.render('registration.html')
})



app.listen(port, () => {
    console.log("Connected")
})
