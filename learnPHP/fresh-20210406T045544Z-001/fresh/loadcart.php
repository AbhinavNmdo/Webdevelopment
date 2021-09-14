<?php 

require_once 'Mongo_config.php';

global $manager;
global $Mongo_database;

error_reporting(0);
// require_once 'Mongo_config.php';

$default_val = 1;
session_start();

$Product_ids = array();
$flag_check = 0;
$data = '';
$phone = $_SESSION['wpnumb'];


// Creating a Fucntion to convert Object StdClass to Array.

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

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div  data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="shopping_cart.html"> <span class="cart_count">
  
</span> </a> </div>
<div>
<div class="top-cart-content"> 
<ul class="mini-products-list" id="cart-sidebar">
<?php 

function FetchProducts($oid, $phone){
  
  global $manager;
  global $Mongo_database;

  $prod = array();

  $filter = ['phone' => $phone, 'orderType' => ''];
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

      array_push($prod, 'productTitle:'.$name);
      array_push($prod, 'productSellPrice:'.$price);
      array_push($prod, 'productQuantity:'.$qty);
      array_push($prod, 'productImage:'.$images);
      array_push($prod, 'productID:'.$oid);

    }

  }
  return $prod;  
}


try {

    global $manager;
    global $Mongo_database;

    $filter = ['phone' => $phone, 'orderType' => ''];
    $limit = ['limit' => 1];
    $query = new MongoDB\Driver\Query($filter, $limit);

    $rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

    $count = 0;

    foreach ($rows as $row) {

      $new_array = objectToArray($row);

        // if($new_array['status'] == "ToBeReviewed"){
            
            $flag_check = 1;
            while ($count <= sizeof($new_array)) {

                if($count != 1){

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
                    $data = '<li class="item first">
                    <div class="item-inner"> <a class="product-image" title="'.explode("productTitle:", $p[0])[1].'" ><img alt="'.explode("productImage:", $p[3])[1].'" src="'.explode("productImage:", $p[3])[1].'"> </a>
                    <div class="product-details">
                    <div class="access"><a onClick="reply_click(this.id)" class="btn-remove1" id="'.explode("productID:", $p[4])[1].'" title="Remove This Item" >Remove</a> <a class="btn-edit" title="Edit item" ><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> 
                    </div>
                    <strong>'.explode("productQuantity:", $p[2])[1].'</strong> x <span class="price">&#8377;'.explode("productSellPrice:", $p[1])[1].'</span>
                    <p class="product-name"><a>'.explode("productTitle:", $p[0])[1].'</a> </p>
                    </div>
                    </div>
                    </li>';

                }else{

                    break;

                }

                if(sizeof($new_array['cart']) > 0){
                    
                    echo $data;
                
                }else{
                
                    $data = '<li class="item first">
                    <div class="product-details">
                    <a> Sorry, your cart is empty!</a>
                    </div>
                    </li>';
                    echo $data;
                    $_SESSION['no_of_prods'] = '';
                    break;        
                
                }

                $count++;
            }
            // }    
        // elseif($flag_check == 0){

        //   $data = '<li class="item first">
        //             <div class="product-details">
        //             <a> Sorry, your cart is empty!</a>
        //             </div>
        //             </li>';
        //             echo $data;
        //   $flag_check = 1;

        // }
    }
} catch (MongoDB\Driver\Exception\Exception $e) {

}

?>    
</ul>

<!--actions-->
<div class="actions">
<a class="btn-checkout" title="Checkout" type="button" href="Checkout.php" style="width: auto; padding: 10px;"><span>Checkout</span> </a>
<?php 
if($_SESSION['no_of_prods'] > 2){
  $amtl = $_SESSION['no_of_prods'] - $default_val;
  $_SESSION['no_of_prods_'] = 'View +('.$amtl.' more)';
}elseif($_SESSION['no_of_prods'] == ''){
  $_SESSION['no_of_prods_'] = 'cart is empty!';
}elseif($_SESSION['no_of_prods'] == $_SESSION['no_of_prods']){
  $_SESSION['no_of_prods_'] = 'View +('.$_SESSION['no_of_prods'].' more)';;
}else{
  $amtll = $default_val - $_SESSION['no_of_prods'];
  $_SESSION['no_of_prods_'] = 'View +('.$amtll.' more)';;
}

 ?>
<a style="
  margin-left: 10px; 
  background: none repeat scroll 0 0 #e31837;
  color: #fff;
  display: inline-block;
  font-size: 11px;
  font-weight: 300;
  letter-spacing: 0.5px;
  line-height: normal;
  padding:10px 12px 8px 12px;
  text-transform: uppercase;
  border: 1px #e31837 solid;
  border-radius:3px;
  border-bottom: 3px #cf0e2b solid;
  width: auto;
  padding: 10px;
  font-family: 'Rubik', sans-serif;
  float:left;"  title="View cart" href="shopping_cart.php"><span><?php echo $_SESSION['no_of_prods_']; ?></span></a>
</div>

</div>
</div>    

<script type="text/javascript">

  load_orderCounts();

  function load_orderCounts(){

    var num = <?php echo $_SESSION['wpnumb']; ?>;

    $.ajax({
         url:"numer_of_orders.php",
         method:"POST",
         data:{num:num},
         success:function(data){
            $('.cart_count').html(data);
         }
      });

  }

</script> 
<?php

reset($new_array);

exit; ?>
</body>
</html>