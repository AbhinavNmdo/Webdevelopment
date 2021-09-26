const express = require('express');
const app = express();
const db = require("./db/dbconn");
const student = require("./modals/registration");
const port = 3000;

app.use(express.json());

app.get('/', (req, res)=>{
    res.send("This is Home Page");
})

app.get('/students', async (req, res)=>{
    try{
        const studentsData = await student.find();
        res.send(studentsData);
    }catch(e){
        console.log(e);
    }

});

app.get('/registration', (req, res)=>{
    res.send("This is Registration Page");
});

app.get('/students/:id', async (req, res)=>{
    try {
        const _id = await req.params.id;
        const result = await student.findById({_id: _id});
        if (!result) {
            return res.status(404).send();
        } else {
            res.send(result);
        }

        
    } catch (e) {
        console.log(e);
    }
});

app.delete('/students/:id', async (req, res) => {
    try {
        const deleteStu = await student.findByIdAndDelete(req.params.id);
        res.end();
    } catch (e) {
        res.status(500).send(e);
        console.log(e);
    }
})


app.post('/registration', async(req, res) => {
    try{
        const user = new student(req.body);
        const create = await user.save();
        res.status(201).send(create);
    }catch(e){
        console.log(e);
        res.status(400).send(e);
    }
});

app.patch('/students/:id', async (req, res)=>{
    try {
        const _id = req.params.id;
        const updateStud = await student.findByIdAndUpdate(_id, req.body);
        res.status(201).send(updateStud);
    } catch (e) {
        console.log(e);
        res.status(500).send('Error Occured');
    }
})

app.listen(port, ()=>{
    console.log(`Listning to the ${port}`);
});