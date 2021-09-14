<?php 
// require_once('Mongo_config.php');
require_once('Mongo_config.php');

session_start();
error_reporting(E_ALL);

global $manager;
global $Mongo_database;

function objectToArray($d) {
  if (is_object($d)) {
      $d = get_object_vars($d);
  }

  if (is_array($d)) {
      return array_map(__FUNCTION__, $d);
  } else {
      return $d;
  }
}

$_SESSION['user_name'];
$_SESSION['user_name_phone'];
$_SESSION['user_postal_code'];
$_SESSION['user_name_whatsappmessagesId'];
$_SESSION['wpnumb'];
// $_SESSION['user_name_orderNum'];

date_default_timezone_set("Asia/Kolkata");
$created = date("Y-m-d::H:i:s");


// Fetching cart informations and saving to array list

$my_carts = array();

$query = new MongoDB\Driver\Query(['phone'=>$_SESSION['wpnumb']]); 

$rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

$count = 0;

foreach ($rows as $row) {
	$new_array = objectToArray($row);
	$_SESSION['row_ids'] = $new_array['_id']['oid'];
}

$insRec = new MongoDB\Driver\BulkWrite;

$insRec->update(['_id'=>new MongoDB\BSON\ObjectID($_SESSION['row_ids'])],['$set' =>[
'totalAmount'=>0,
'cart'=>array(),
'orderProductCount'=>0,
'status'=>'ToBeReviewed',
'deliveryCharges'=>0,
'lastModifiedDate'=>$created,
]], ['multi' => false, 'upsert' => false]);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);

unset($_SESSION['row_ids']);
exit;
?>
