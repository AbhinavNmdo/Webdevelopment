<?php
require "views/_dbconnect.php";
$collection = $db->categories;
$asdf = $collection->findOne(["cat_name"]);
var_dump($asdf);





?>