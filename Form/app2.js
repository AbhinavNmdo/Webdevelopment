const express = require("express")
const app = express();
const port = 80;
const path = require("path")
const fs = require("fs")

app.set('view engine', 'pug')
app.set('views',path.join(__dirname, 'views'))
app.use(express.urlencoded())

app.get("/", (req, res)=>{
    res.status(200).render('Index.pug')
})

app.post('/', (req, res)=>{
    let namee = req.body.name
    let age = req.body.age
    let email = req.body.email
    let more = req.body.more
    // let more = req.body

    let outputToWrite = `the name of the client is ${namee}, ${age} years old, ${email}. More about him/her: ${more} \n`
    fs.appendFileSync('output.txt', outputToWrite)
    const params = {'message': 'Your form has been submitted successfully'}
    res.status(200).render('Index.pug', params);

})

app.listen(port, ()=>{
    console.log(`The application is started in ${port}`)
})