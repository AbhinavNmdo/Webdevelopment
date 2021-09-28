const mongoose = require('mongoose');

const shopSchema = new mongoose.Schema({
    ShopName: String,
    OwnerName: String,
    Address: String,
    Email: String,
    Username: String,
    Password: String,
    CPassword: String,
    category: String,
    Zip: Number,
    Timing: String, 
    Map: String,
    Mobile: String,
    AgentCode: String
});

const shops = new mongoose.model('shopkeepers', shopSchema);
module.exports = shops;