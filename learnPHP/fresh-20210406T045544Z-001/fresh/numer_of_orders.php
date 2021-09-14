<?php require_once('Mongo_config.php'); ?><?php 
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

$num = isset($_REQUEST['num'])?$_REQUEST['num']:"";

$filter = ['phone' => $num, 'orderType' => ''];
$limit = ['limit' => 1];

$query = new MongoDB\Driver\Query($filter, $limit);

$cursor = $manager->executeQuery($Mongo_database.'.managedcart', $query);

foreach ($cursor as $document)
{
  $order_counts = objectToArray($document);

  $orders = count($order_counts['cart']);
  echo $orders;
}

?>