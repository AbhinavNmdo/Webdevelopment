<?php 

session_start();


// $obj = array();

// $firstName = $_SESSION['dfirstName'];
// $phone = $_SESSION['dphone'];
// $orderText = $_SESSION['dorderText'];
// $postcode = $_SESSION['dpostcode'];
// $totalAmount = 0;
// $cart = $obj;
// $vendor = $obj;
// $orderNum = $_SESSION['dorderNum'];
// $whatsappmessagesId = "manual";
// $orderProductCount = 0;
// $status = "ToBeReviewed";
// $orderComment = "";
// $shippingAddress = "";
// $orderDate = "";
// $deliveryCharges = 0;
// $lastModifiedDate = date("Y-m-d  H:i:s:m");
// $deliveryTime = "";
// $canShareReceipt = "true";


// // website Reviewed
// // wp ToBeReviewed
// // Ordered


// $insRec = new MongoDB\Driver\BulkWrite;
// $insRec->insert([
// 'firstName' => $firstName,
// 'phone' => $phone,
// 'orderText' => $orderText,
// 'postcode' => $postcode,
// 'totalAmount' => $totalAmount,
// 'cart' => $cart,
// 'vendor' => $vendor,
// 'orderNum' => $orderNum,
// 'whatsappmessagesId' => $whatsappmessagesId,
// 'orderProductCount' => $orderProductCount,
// 'status' => $status,
// 'orderComment' => $orderComment,
// 'shippingAddress' => $shippingAddress,
// 'orderDate' => $orderDate,
// 'deliveryCharges' => $deliveryCharges,
// 'lastModifiedDate' => $lastModifiedDate,
// 'deliveryTime' => $deliveryTime,
// 'canShareReceipt' => $canShareReceipt,
// 'orderTransactionID' => '',
// 'orderType' => '',
// ]);

// $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

// $result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);

// $filter = ['phone' => $phone];
// $limit = ['limit' => 1];

// $query = new MongoDB\Driver\Query($filter, $limit);

// $cursor = $manager->executeQuery($Mongo_database.'.managedcart', $query);

// foreach ($cursor as $document)
// {
//   $_SESSION['user_name'] = $document->firstName;
//   $_SESSION['user_name_phone'] = $document->phone;
//   $_SESSION['user_postal_code'] = $document->postcode;
//   $_SESSION['user_name_whatsappmessagesId'] = $document->whatsappmessagesId;
//   $_SESSION['wpnumb'] = $phone;
//   $_SESSION['order_num'] = $document->orderNum;
// }



?>