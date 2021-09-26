const mongoose = require('mongoose');

mongoose.connect('mongodb+srv://abhinav:abhinav1234@bazaroffline.0hj24.mongodb.net/learnnode?retryWrites=true&w=majority', {
    useNewUrlParser: true, useUnifiedTopology: true
}).then(()=>{
    console.log("connection is successuull")
}).catch(()=>{
    console.log("Failed");
})
