const mongoose = require('mongoose');

const catSchema = new mongoose.Schema({
    name: String,
    description: String,
});

const categories = new mongoose.model('categories', catSchema);
module.exports = categories;