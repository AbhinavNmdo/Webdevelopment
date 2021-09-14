<?php 
	error_reporting(0);
	
	require_once 'vendor/autoload.php';
	
	$Mongo_database = "development";
  	$manager = new MongoDB\Driver\Manager("mongodb+srv://greenlentils:lqNkeoF8KkERUazS@cluster0.oxoik.mongodb.net/{$Mongo_database}");


 ?>