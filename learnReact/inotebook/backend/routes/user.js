const express = require('express');
const User = require('../models/Users');
const router = express.Router();
const { body, validationResult } = require('express-validator');
const bcrypt = require('bcryptjs');

// Initializing Validators
router.post('/',[
    body('name', "Enter Name correctly").isLength({min: 3}),
    body('email', "Use correct Email").isEmail(),
    body('password', "Minimum Length is 5").isLength({min: 5})
], async (req, res)=>{
  // If error occured this this shows error message
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(400).json({ errors: errors.array() });
  };
  try {
    // Checking weather the email already exist or not 
    let user = await User.findOne({email: req.body.email});
    if (user){
      return res.status(400).json({error: "Sorry this email already exist"});
    }
    
    // Creating Hash of the password 
    let salt = await bcrypt.genSalt(10);
    let secPass = await bcrypt.hash(req.body.password, salt);

    // Creating new user
    user = User.create({
      name: req.body.name,
      email: req.body.email,
      password: secPass
    }).then(res.json({"nice": "nice"}));
  } catch (err) {
    res.send(500).json({"err": "Some Error Occured"});
  };
});

module.exports = router;