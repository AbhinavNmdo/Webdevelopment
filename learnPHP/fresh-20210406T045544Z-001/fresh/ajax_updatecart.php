<?php 
// require_once 'vendor/autoload.php';
require_once('Mongo_config.php');

session_start();
error_reporting(0);

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
$_SESSION['user_name_orderNum'];

date_default_timezone_set("Asia/Kolkata");
$created = date("Y-m-d::H:i:s");
$p_id = isset($_REQUEST['globalUpdateProdId'])?$_REQUEST['globalUpdateProdId']:"";
$p_qty = isset($_REQUEST['number_input_quantity'])?$_REQUEST['number_input_quantity']:"";
$p_price = isset($_REQUEST['number_input_product_price'])?$_REQUEST['number_input_product_price']:"";
$_p_hidden_qty = isset($_REQUEST['number_input_hidden_quantity'])?$_REQUEST['number_input_hidden_quantity']:"";

$fp = fopen("abcdef.txt", 'a');
fwrite($fp, $p_id."\n");

// Fetching cart informations and saving to array list

$my_carts_update = array();

$filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
$limit = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $limit);

$rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

$count = 0;

foreach ($rows as $row) {

	$new_array_update = objectToArray($row);

	$_SESSION['totalAmounts'] = $new_array_update['totalAmount'];

	while ($count <= sizeof(array_keys($new_array_update['cart']))) {
		
		if(sizeof(array_keys($new_array_update['cart'])) != $count){
		
			$my_carts_update[array_keys($new_array_update['cart'])[$count]] = array_values($new_array_update['cart'])[$count];

		}else{

			break;
		
		}

		$count = $count + 1;

	}

}

// echo '<pre>';
$new_array_update['cart'][$p_id]['productQuantity'] = $p_qty;
// var_dump($new_array_update['cart'][$p_id]);
// echo '</pre>';

if ($p_qty >= $_p_hidden_qty) {
	

	$prod_price = explode('₹', $p_price)[1];
	$al = $_p_hidden_qty * $prod_price;
	$all =  $_SESSION['totalAmounts'] - $al;
	$a_l = $p_qty * $prod_price;
	$alll = $all + $a_l;

	$insRec = new MongoDB\Driver\BulkWrite;

	$insRec->update(['_id'=>new MongoDB\BSON\ObjectID($_SESSION['row_id'])],['$set' =>[
	'totalAmount'=>$alll,
	'cart'=>$new_array_update['cart'],
	'lastModifiedDate'=>$created,
	]], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

	$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);

	echo '<pre>';
	var_dump($new_array_update['cart']);
	echo '</pre>';

	exit;

}elseif ($_p_hidden_qty > $p_qty) {

	$prod_price = explode('₹', $p_price)[1];

	$al = $_p_hidden_qty * $prod_price; // 530
	$all =  $_SESSION['totalAmounts'] - $al; //4911.7 -530
	$a_l = $p_qty * $prod_price; // 1 * 106 = 106
	$alll = $all + $a_l; // 4381.7 + 106

	$insRec = new MongoDB\Driver\BulkWrite;

	$insRec->update(['_id'=>new MongoDB\BSON\ObjectID($_SESSION['row_id'])],['$set' =>[
	'totalAmount'=>$alll,
	'cart'=>$new_array_update['cart'],
	'lastModifiedDate'=>$created,
	]], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

	$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);

	echo '<pre>';
	var_dump($new_array_update['cart']);
	echo '</pre>';

	exit;

}

?>
