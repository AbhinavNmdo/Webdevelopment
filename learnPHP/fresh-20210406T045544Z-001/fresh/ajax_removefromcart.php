<?php 
// require_once 'vendor/autoload.php';
require_once('Mongo_config.php');

global $manager;
global $Mongo_database;

session_start();
error_reporting(0);

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

date_default_timezone_set("Asia/Kolkata");
$created = date("Y-m-d::H:i:s");
$p_id = isset($_REQUEST['globalProdId'])?$_REQUEST['globalProdId']:"";


// Fetching cart informations and saving to array list

$my_carts = array();

$filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
$limit = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $limit);


$rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

$count = 0;

foreach ($rows as $row) {

$new_array = objectToArray($row);

while ($count <= sizeof(array_keys($new_array['cart']))) {
	
	if(sizeof(array_keys($new_array['cart'])) != $count){
	
		$my_carts[array_keys($new_array['cart'])[$count]] = array_values($new_array['cart'])[$count];

	}else{

		break;
	
	}

	$count = $count + 1;

}

if(sizeof($my_carts) > 1){
	$_SESSION['product_count'] = sizeof($my_carts) - 1;	
}


// Retrieve Product Informations from ID

$product_Sell_Price = $my_carts[$p_id]['productSellPrice']; // product sell price
$product_Quantity = $my_carts[$p_id]['productQuantity']; // product quantity
$product_totalAmount = $new_array['totalAmount']; // total Amount
$product_count = $new_array['orderProductCount']; // order Product Count

// echo 'Price ::: ' . $product_Sell_Price."<br>";
// echo 'Quantity ::: ' . $product_Quantity."<br>";
// echo 'Amount ::: ' . $product_totalAmount."<br>";

// Removing Single item from list of arrays

unset($my_carts[$p_id]);

}

echo $product_totalAmount - ($product_Quantity * $product_Sell_Price);
$insRec = new MongoDB\Driver\BulkWrite;

$insRec->update(['_id'=>new MongoDB\BSON\ObjectID($_SESSION['row_id'])],['$set' =>[
'totalAmount'=>($product_totalAmount - ($product_Quantity * $product_Sell_Price)),
'cart'=>$my_carts,
'orderProductCount'=>$product_count - 1,
'status'=>'ToBeReviewed',
'deliveryCharges'=>0,
'lastModifiedDate'=>$created,
]], ['multi' => false, 'upsert' => false]);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);

exit;
?>
