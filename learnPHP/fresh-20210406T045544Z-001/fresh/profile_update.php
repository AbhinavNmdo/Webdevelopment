<?php 
// require_once 'vendor/autoload.php';
require_once('Mongo_config.php');

session_start();
error_reporting(0);

global $manager;
global $Mongo_database;

$_SESSION['user_name'];
$_SESSION['user_name_phone'];
$_SESSION['user_postal_code'];
$_SESSION['user_name_whatsappmessagesId'];
$_SESSION['wpnumb'];
$_SESSION['user_name_orderNum'];

date_default_timezone_set("Asia/Kolkata");
$created = date("Y-m-d::H:i:s");

$firstName = isset($_REQUEST['fn'])?$_REQUEST['fn']:"";
$lastName = isset($_REQUEST['ln'])?$_REQUEST['ln']:"";
$address = isset($_REQUEST['address'])?$_REQUEST['address']:"";
$city = isset($_REQUEST['city'])?$_REQUEST['city']:"";
$state = isset($_REQUEST['state'])?$_REQUEST['state']:"";
$postcode = isset($_REQUEST['zipcode'])?$_REQUEST['zipcode']:"";
$country = isset($_REQUEST['country'])?$_REQUEST['country']:"";


$insRec = new MongoDB\Driver\BulkWrite;

$insRec->update(['phone'=>$_SESSION['wpnumb']],['$set' =>[
'firstName' =>$firstName, 
'lastName'=>$lastName, 
'address'=>$address, 
'postcode'=>$postcode, 
'state'=>$state, 
'country'=>$country, 
'city'=>$city,
]]);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite($Mongo_database.'.customers', $insRec, $writeConcern);
exit;


?>
