<?php require_once('Mongo_config.php'); ?><?php 

global $manager;
global $Mongo_database;

session_start();

error_reporting(0);

$wpnumber = isset($_REQUEST['number'])?$_REQUEST['number']:"";
$fn = isset($_REQUEST['fullname'])?$_REQUEST['fullname']:"";
$zipcode = isset($_REQUEST['pincode'])?$_REQUEST['pincode']:"";
$otp = isset($_REQUEST['otp'])?$_REQUEST['otp']:"";

if(strpos($fn, " ")){

	$firstName = explode(' ', $fn)[0];

}else{
  
	$firstName = $fn;

}

$phone = $wpnumber;
$orderText = "backend";
$postcode = $zipcode;
$totalAmount = "";
$cart = $obj;
$vendor = $obj;
$orderNum = $otp;
$whatsappmessagesId = "manual";
$orderProductCount = "";
$status = "ToBeReviewed";
$orderComment = "";
$shippingAddress = "";
$orderDate = "";
$deliveryCharges = "";
$lastModifiedDate = date("Y-m-d  H:i:s:m");
$deliveryTime = "";
$canShareReceipt = "true";


// website Reviewed
// wp ToBeReviewed
// Ordered


$insRec = new MongoDB\Driver\BulkWrite;
$insRec->insert([
'firstName' => $firstName,
'phone' => $phone,
'orderText' => $orderText,
'postcode' => $postcode,
'totalAmount' => $totalAmount,
'cart' => $cart,
'vendor' => $vendor,
'orderNum' => $orderNum,
'whatsappmessagesId' => $whatsappmessagesId,
'orderProductCount' => $orderProductCount,
'status' => $status,
'orderComment' => $orderComment,
'shippingAddress' => $shippingAddress,
'orderDate' => $orderDate,
'deliveryCharges' => $deliveryCharges,
'lastModifiedDate' => $lastModifiedDate,
'deliveryTime' => $deliveryTime,
'canShareReceipt' => $canShareReceipt,
'orderTransactionID' => '',
'orderType' => '',
]);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);

// get the data from managed cart

$query = new MongoDB\Driver\Query(['phone'=>$wpnumber]);

$cursor = $manager->executeQuery($Mongo_database.'.managedcart', $query);

foreach ($cursor as $document)
{
  $_SESSION['user_name'] = $document->firstName;
  $_SESSION['user_name_phone'] = $document->phone;
  $_SESSION['user_postal_code'] = $document->postcode;
  $_SESSION['user_name_whatsappmessagesId'] = $document->whatsappmessagesId;
  $_SESSION['wpnumb'] = $wpnumber;
  $_SESSION['pincode'] = $document->postcode;
}

 ?>