const express = require('express');
const categories = require('../modals/categories.js');
const router = express.Router();


router.get('/', (req, res, next) => {
    try {
        categories.find(function(err, data){
            res.render('home', {
                title:"BazarOffline",
                cat:data
            })
        })
    } catch (err) {
        console.log(err);
    }
});

module.exports = router