const express = require('express');
const categories = require('../models/categories.js');
const shops = require('../models/shops.js');
const items = require('../models/items.js');
const router = express.Router();


router.get('/', (req, res, next) => {
    try {
        categories.find(function(err, cat){
            res.render('home', {
                title:"BazarOffline",
                categories: cat
            })
        })
    } catch (err) {
        console.log(err);
    }
});

router.get('/categories/:id', (req, res)=>{
    let id = req.params.id;
    shops.find({category: id}, function(err, content){
        res.render('Categories', {
            title: "BazarOffline",
            shopkeeper: content
        });
    });
});

router.get('/categories/items/:id', (req, res)=>{
    let ids = req.params.id;
    console.log(ids);
    items.find({shop_id: ids}, function(err, content){
        res.render('item', {
            items: content
        })
    })
})

module.exports = router