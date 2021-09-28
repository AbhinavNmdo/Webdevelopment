const mongoose = require('mongoose');

const itemSchema = new mongoose.Schema({
    name: String,
    description: String,
    shop_id: String
});

const items = new mongoose.model('items', itemSchema);
module.exports = items;