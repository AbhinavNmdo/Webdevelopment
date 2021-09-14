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

date_default_timezone_set("Asia/Kolkata");
$created = date("Y-m-d - H:i:s");

$p_id = isset($_REQUEST['product_id'])?$_REQUEST['product_id']:"";
// $p_name = isset($_REQUEST['product_name'])?$_REQUEST['product_name']:"";
$p_price = isset($_REQUEST['product_price'])?$_REQUEST['product_price']:"";
$p_quantity = isset($_REQUEST['product_quantity'])?$_REQUEST['product_quantity']:"";

$ff = fopen("matrix.txt", 'a');
fwrite($ff, $p_id."\n");
// fwrite($ff, $p_name."\n");
fwrite($ff, $p_price."\n");
fwrite($ff, $p_quantity."\n");
fwrite($ff, "The no. is :: " . $_SESSION['wpnumb']."\n");


// Retrieve Product Informations from ID

$query = new MongoDB\Driver\Query(['_id'=>new MongoDB\BSON\ObjectID($p_id)]);

$cursor = $manager->executeQuery($Mongo_database.'.products', $query);

foreach ($cursor as $document)
{
$_SESSION['product_id'] = $document->_id; // product id
$_SESSION['product_sub_categories'] = $document->productSubCategories; // product tags
$_SESSION['product_title'] = $document->productTitle; //product title
$_SESSION['product_local_title'] = $document->productTitle; // product Description
$_SESSION['parent_Title'] = $document->ParentTitle; // Parent title
$_SESSION['product_Sell_Price'] = $document->productSellPrice; // product sell price
$_SESSION['product_category'] = $document->ProductCategory;  // product category
$_SESSION['product_image'] = $document->productImage;  // product image

}

// Insert Product Inside Cart Collection table
// get object id >> managed.cart
// try {
$documentss = array(
'_id'=>$p_id,
'productTags'=>$_SESSION['product_sub_categories'],
'productTitle'=>$_SESSION['product_title'],
'productLocalTitle'=>$_SESSION['product_local_title'],
'productQuantity'=>$p_quantity,
'productCustomerUnit'=>'PC',
'productComment'=>null,
'shortCode'=>null,
'productUnit'=>'pc',
'productFoundInDB'=>true,
'unitMismatch'=>false,
'productSellPrice'=>$_SESSION['product_Sell_Price'],
'ParentTitle'=>$_SESSION['product_category'],
'IsVariantAvailabe'=>false,
'totalItemPrice'=>$_SESSION['product_Sell_Price'],
'productImage'=>$_SESSION['product_image']
);


// $_SESSION['cart'] = array();
$filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
$limit = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $limit);

$cursor = $manager->executeQuery($Mongo_database.'.managedcart', $query);

foreach ($cursor as $document)
{
$_SESSION['a_cart'] = $document->cart;
$_SESSION['cart'] = array(''.$_SESSION['product_id'].''=>$documentss);
}

// Update Managed Cart for the user

$filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
$limit = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $limit);

$rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

foreach ($rows as $row) {
if($row->phone === $_SESSION['wpnumb'] || $row->phone == $_SESSION['wpnumb']){
   
   $_SESSION['row_id'] = $row->_id;
   $_SESSION['totalAmount'] = $row->totalAmount;
   $_SESSION['ordercount'] = $row->orderProductCount;

}else{
	$_SESSION['row_id'] == "NOTHING";
}
fwrite($ff, 'The row id is :: ' . $_SESSION['row_id']."\n\n");

}

if ($_SESSION['row_id'] != "NOTHING") {
	
	$result = array_merge((array)$_SESSION['a_cart'], (array)$_SESSION['cart']);
	$insRec = new MongoDB\Driver\BulkWrite;
	
	// $insRec->update(['_id'=>new MongoDB\BSON\ObjectID($_SESSION['row_id'])], array('userId' => 1, 'questions.questionId' => '1'), array('$push' => array('questions.$.ans' => 'try2')));
	// $arrayname[$_SESSION['product_id']] = array($_SESSION['cart']);
	$insRec->update(['_id'=>new MongoDB\BSON\ObjectID($_SESSION['row_id'])],['$set' =>[
	// 'orderText'=>$_SESSION['product_local_title'],
	'totalAmount'=>($_SESSION['totalAmount'] + ($p_quantity * $_SESSION['product_Sell_Price'])),
	// 'cart'=>array($_SESSION['cart']),
	'cart'=>$result,
	// 'cart.'$_SESSION['product_id']=>$_SESSION['cart'],
	'orderProductCount'=>$_SESSION['ordercount'] + 1,
	'status'=>'ToBeReviewed',
	// 'orderComment'=>'',
	'deliveryCharges'=>0,
	'lastModifiedDate'=>$created,
	]], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

	$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);
	// exit;
	                                                               
}else{
	// exit;
}

// exit;
