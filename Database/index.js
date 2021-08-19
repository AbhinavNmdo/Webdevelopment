const mongoose = require('mongoose');
mongoose.connect('mongodb://localhost:27017/abhay', {useNewUrlParser: true, useUnifiedTopology: true});

const db = mongoose.connection;
db.on('error', console.error.bind(console, 'connection error:'));
db.once('open', function() {
    console.log("Connected")
});

const a1 = new mongoose.Schema({
    name: String ,
    age: Number ,
    address: String
  });

a1.methods.speak = function () {
    const greeting = "My name is " + this.name + " and age is " + this.age + " and my address is " + this.address
    console.log(greeting);
  }

const a2 = mongoose.model('items', a1);

const data = new a2({ name: 'Abhay', age: '18', address: 'Dixitpura'});
const data2 = new a2({ name: 'Ashu', age: '23', address: 'Dixitpura'});
// data.speak();

data.save(function (err, data) {
    if (err) return console.error(err);
    data.speak();
});

data2.save(function (err, data2) {
  if (err) return console.error(err);
  data.speak();
});