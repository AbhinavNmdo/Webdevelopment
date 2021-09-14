<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php require_once('Mongo_config.php'); ?>
  
<?php 
error_reporting(0);
$default_val = 1;
session_start();

global $manager;
global $Mongo_database;

$Product_ids = array();

$data = '';
$phone = $_SESSION['wpnumb'];
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

function FetchProducts($oid, $phone){

  global $manager;
  global $Mongo_database;

  $prod = array();

  $filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
  $limit = ['limit' => 1];
  $query = new MongoDB\Driver\Query($filter, $limit);
 

  $rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

  foreach ($rows as $row) {
    $new_array = objectToArray($row);
    // var_dump($new_array['cart'][$oid]);
    if($new_array['status'] == "ToBeReviewed"){

      $name=$new_array['cart'][$oid]['productTitle'];
      $price=$new_array['cart'][$oid]['productSellPrice'];
      $qty=$new_array['cart'][$oid]['productQuantity'];
      $images=$new_array['cart'][$oid]['productImage'];

      array_push($prod, $name);
      array_push($prod, $price);
      array_push($prod, $qty);
      array_push($prod, $images);
      array_push($prod, $oid);
    }  
  }
  return $prod;  
}


try {

  global $manager;
  global $Mongo_database;

  $filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
  $limit = ['limit' => 1];
  $query = new MongoDB\Driver\Query($filter, $limit);
 

  $rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

  $count = 0;

  foreach ($rows as $row) {

  $new_array = objectToArray($row);
      
      // if($new_array['status'] == "ToBeReviewed"){
        while ($count <= sizeof($new_array)) {

        if($count != sizeof($new_array['cart'])){

          // echo '<pre>';
          $pid = array_keys($new_array['cart'])[$count];
          // echo $pid;
          // echo "<br />";
          $_SESSION['no_of_prods'] = sizeof($new_array['cart']);

          $p = FetchProducts($pid, $phone);
          // var_dump($p[1]);
          // echo '</pre>';
          // total price
          // $c = $p[2] * $p[1];
          $totalP = $p[2] * $p[1];

          array_push($sub_total_price, $totalP);
          
          $_SESSION['totalPrice'] = array_sum($sub_total_price);

          $data = '<tr class="first odd">
                   <td class="image"><a class="product-image" title="'.$p[3].'" ><img width="75" alt="Sample Product" src="'.$p[3].'"></a></td>
                   <td>
                   <h2 class="product-name '.$p[0].'"> <a>'.$p[0].'</a> </h2>
                   </td>
                   <td class="a-right"><span class="cart-price"><input type="text" style="width: 100px; background-color: #FFFFFF; border: 0; outline: 0;" readonly class="price" id="Price_'.$p[4].'" value="&#8377;'.$p[1].'"> </span></td><td class="a-center movewishlist"><input type="hidden" id="QTYS_'.$p[4].'" value="'.$p[2].'" /><button onClick="plus(this.id)" id="plus_'.$p[4].'" style="width: 40px; height: 40px;"><span style="width: 10px height:10px;">&#43;</span></button><input type="number" readonly class="updatetext" id="qtyss_'.$p[4].'" value="'.$p[2].'" title="Quantity" style="text-align: center; width: 45px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FFFFFF; border: 0; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><button onClick="minus(this.id)" id="minus_'.$p[4].'" style="width: 40px; height: 40px;"><span style="width: 10px height:10px;">&#8722;</span></button><td class="a-right movewishlist"><span class="cart-price"> <span class="price">&#8377;'.$totalP.'</span> </span></td><td class="a-center last"><a class="button remove-item remove_item_from_list" onClick="reply_click(this.id)" title="Remove item" id="'.$p[4].'"><span><span>Remove item</span></span></a></td><td class="a-center last"></td></tr>';
        
                   // <input maxlength="12" class="input-text qty" title="Qty" size="10" value="'.$p[2].'" name="'.$p[2].'"></td>

        }else{

          break;

        }
        
        if(sizeof($new_array['cart']) > 0){
          echo $data;
        }else{
          $data = '<tr class="first odd">
                  <h2> Cart is empty! </h2>
                  </tr>';
          echo $data;
          $_SESSION['no_of_prods'] = '';
          break;        
        }
        
        $count++;
        
      }
    // }  
  }

} catch (MongoDB\Driver\Exception\Exception $e) {

}

?>    

<!--actions-->
<?php 

// reset($new_array);
exit;
 ?>



</body>
</html>