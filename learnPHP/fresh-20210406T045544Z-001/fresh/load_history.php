<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php 

require_once('Mongo_config.php'); 

error_reporting(0);

$default_val = 1;

session_start();

global $manager;
global $Mongo_database;

$Product_ids = array();

$data = '';

$phone = '919930441095';
// Creating a Fucntion to convert Object StdClass to Array.

$sub_total_price = array();

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

$filter = ['phone' => '919930441095'];
$query = new MongoDB\Driver\Query($filter);


$rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

foreach ($rows as $row) {
  $new_array = objectToArray($row);
  if ($row->orderType === "COD" || $row->orderType === "BANK"){?>

  <div style="width: 100%; padding: 5px; margin-top: 20px; margin-bottom: 20px; border-bottom: #59B210 5px solid;"></div>
  <?php
    echo "Order Type : " . $row->orderType ."<br />";
    echo "Order ID : " . $row->orderNum."<br />";
    echo "Total : " . $row->totalAmount."<br />";
    echo "Datetime : " . str_replace("::", " ", $row->lastModifiedDate)."<br />";
    $newrows = $manager->executeQuery($Mongo_database.".managedcart", $query);

      $data = '<table class="data-table cart-table" id="shopping-cart-table">
               <colgroup>
                  <col width="1">
                  <col>
                  <!-- <col width="1"> -->
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  <col width="1">
               </colgroup>
               <thead>
                  <tr class="first last">
                     <th rowspan="1">&nbsp;</th>
                     <th rowspan="1"><span class="nobr">Product Name</span></th>
                     <!-- <th rowspan="1"></th> -->
                     <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                     <th class="a-center" rowspan="1">Qty</th>
                     <th colspan="1" class="a-center">Subtotal</th>
                  </tr>
               </thead>
               <tbody class="cart_list_form">';
    echo $data;
    foreach ($new_array['cart'] as $nrow) {

                $data = '<tr class="first odd">
                   <td class="image"><a class="product-image" title="' . $nrow['productTitle'] . '" ><img width="75" alt="Sample Product" src="' . $nrow['productImage'] . '"></a></td>
                   <td>
                   <h2 class="product-name ' . $nrow['productTitle'] . '"> <a>' . $nrow['productTitle'] . '</a> </h2>
                   </td>
                   <td class="a-right"><span class="cart-price"><input type="text" style="width: 100px; background-color: #FFFFFF; border: 0; outline: 0;" readonly class="price" id="Price_' . $nrow['productSellPrice'] . '" value="&#8377;' . $nrow['productSellPrice'] . '"> </span></td><td class="a-center movewishlist"><input type="hidden" id="QTYS_' . $nrow['productQuantity'] . '" value="' . $nrow['productSellPrice'] . '" /><input type="number" readonly class="updatetext" id="qtyss_' . $nrow['productQuantity'] . '" value="' . $nrow['productSellPrice'] . '" title="Quantity" style="text-align: center; width: 45px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FFFFFF; border: 0; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><td class="a-right movewishlist"><span class="cart-price"> <span class="price">&#8377;' . $nrow['totalItemPrice'] . '</span> </span></td><td class="a-center last"></td><td class="a-center last"></td></tr>';

    echo $data;

    }
  echo '</tbody></table>';

  }
    
}

?>


  
</body>
</html>
