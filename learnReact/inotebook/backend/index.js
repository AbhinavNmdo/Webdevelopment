const mongoConnect = require('./database/db')
const express = require('express');
const port = 5000;

mongoConnect();
const app = express();

app.use('/api/notes', require('./routes/notes'));
app.use('/api/auth', require('./routes/user'));

app.listen(port, ()=>{
    console.log(`Listning at http://localhost:${port}`);
});