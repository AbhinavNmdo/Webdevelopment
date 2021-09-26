const mongoose = require('mongoose');

const registSchema = new mongoose.Schema({
    name: String,
    class: Number,
    age: Number
});

const students = new mongoose.model('student', registSchema);

module.exports = students;