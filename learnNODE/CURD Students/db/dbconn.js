const mongoose = require('mongoose');

mongoose.connect('mongodb+srv://abhinav:abhinav1234@bazaroffline.0hj24.mongodb.net/learnnode?retryWrites=true&w=majority', {
    useNewUrlParser: true, useUnifiedTopology: true
}).then(()=>{
    console.log("Connection is successfull with DataBase")
}).catch(()=>{
    console.log("Failed to connect with DataBase");
})
