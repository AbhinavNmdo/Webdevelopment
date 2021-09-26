const mongoose = require('mongoose');

const registSchema = new mongoose.Schema({
    name: String,
    class: Number,
    age: Number,
    Data:{
        type: Date,
        default: Date.now
    }
});

const students = new mongoose.model('student', registSchema);

module.exports = students;