const express = require('express');
const app = express();
const db = require("./db/dbconn");
const student = require("./modals/registration");
const port = 3000;

app.use(express.json());
// app.post('/registration', (req, res) => {
//     console.log(req.body);
//     const user = new student(req.body);
//     res.status(201).send("Hello this is registration Page");
//     user.save().then(()=>{
//         console.log("Success in data");
//     });
// });

app.post('/registration', async(req, res) => {
    try{
        const user = new student(req.body);
        const create = await user.save();
        res.status(201).send(create);
    }catch(e){
        console.log(e);
        res.status(400).send(e);
    }
})

app.listen(port, ()=>{
    console.log(`Listning to the ${port}`)
})