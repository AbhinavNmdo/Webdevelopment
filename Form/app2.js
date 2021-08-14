const express = require("express")
const app = express();
const port = 80;
const path = require("path")
const fs = require("fs")
const form = fs.readFileSync('form.html')

app.set('view engine', 'pug')
app.set('views',path.join(__dirname, 'views'))

app.get("/", (req, res)=>{
    res.status(200).render('Index.pug')
})

app.post('/', (req, res)=>{
    name = req.body.name
    age = req.body.age
    gender = req.body.gender
    address = req.body.address
    more = req.body.more

    let outputToWrite = `the name of the client is ${name}, ${age} years old, ${gender}, residing at ${address}. More about him/her: ${more}`
    fs.writeFileSync('output.txt', outputToWrite)
    const params = {'message': 'Your form has been submitted successfully'}
    res.status(200).render('index.pug', params);

})

app.listen(port, ()=>{
    console.log(`The application is started in ${port}`)
})