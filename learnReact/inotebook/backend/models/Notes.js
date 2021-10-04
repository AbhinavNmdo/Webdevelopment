const mongoose = require('mongoose');

const notesSchema = new Schema({
    title:{
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    date: {
        type: Date,
        default: Date.now
    }
});

const Notes = mongoose.model('notes', notesSchema);

module.exports = Notes;