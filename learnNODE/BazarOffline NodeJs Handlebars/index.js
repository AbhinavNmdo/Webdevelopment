const express = require('express');
const data = require('./data/_dbconnect');
const app = express();
const exphbs = require('express-handlebars');
const Handlebars = require('handlebars')
const port = 8000;
const path = require('path');
const fs = require('fs');
const bodyParser = require('body-parser');
const catModal = require('./modals/categories.js');
const { allowInsecurePrototypeAccess } = require('@handlebars/allow-prototype-access');

app.use(express.static(path.join(__dirname, "views")))
app.engine('handlebars', exphbs({handlebars: allowInsecurePrototypeAccess(Handlebars)}));
app.set('view engine', 'handlebars');
app.use('/', require(path.join(__dirname, 'routes/home.js')));

app.listen(port, () => {
    console.log(`Listning at http://localhost:${port}`)
});