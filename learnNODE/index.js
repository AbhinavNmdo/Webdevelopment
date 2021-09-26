const express = require('express');
const app = express();
const port = 8000;

app.get('/', (req, res) =>{
    res.send("Hello, this is home page");
})

app.get('/about', (req, res) => {
    res.send("Hello, this is about page");
})

app.get('/contact', (req, res)=>{
    res.send("Hello, this is contact page");
})

app.post('/contact', (req, res) => {
    myname = req.name,
    phome = req.phone
    
})

app.listen(port, ()=>{
    console.log(`Listning to ${port}`);
})