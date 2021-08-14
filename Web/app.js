const express = require("express")
const app = express();
const port = 80;
const fs = require("fs")
// const home = fs.readFileSync('Test2.html')
// const about = fs.readFileSync('AboutUs.html')

app.get("/home", (req, res)=>{
    res.send("This is webpage of home page")
    // res.end(home)
})

app.get("/AboutUs.html", (req, res)=>{
    res.send("This is webpage of about sectoin lsdkjflsakjflkasjflask;dj")
    // res.end(about)
})

app.listen(port, ()=>{
    console.log(`The application is started in ${port}`)
})