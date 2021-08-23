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

// app.get("/views/contactStyle.css", (req, res) =>{
//     res.status(200).render('contactStyle.css')
// })

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

app.post("/login", async(req, res)=>{
    try {
        const email = req.body.email
        const password = req.body.password
        

        const useremail = await contactSchemaModel.findOne({email:email})
        if (useremail.password == password) {
            res.status(201).render('afterlogin.html')
        } else {
            res.status(400).send("Password incorrect")
        }
        // console.log(useremail.name)
        var x = (useremail.name);
        document.getElementById("wel").innerHTML = x;
    } catch (error) {
        res.status(400).send("Invalid Email or Password")
    }
    // res.render('index.html')
    
})

app.listen(port, () => {
    console.log("Connected")
})
