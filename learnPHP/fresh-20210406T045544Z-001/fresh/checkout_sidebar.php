<!DOCTYPE html>
<html>
<body>
<?php 

error_reporting(0);
$default_val = 1;
$dc = 15;
session_start();
require_once('Mongo_config.php');
$Product_ids = array();
$total_ammounts = array();

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

function FetchProducts($oid, $phone){

global $manager;
global $Mongo_database;

$prods = array();
$filter = ['phone' => $phone, 'orderType' => ''];
$limit = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $limit);


  $rows = $manager->executeQuery($Mongo_database.".managedcart", $query);

  foreach ($rows as $row) {
    $new_array = objectToArray($row);
    // var_dump($new_array['cart'][$oid]);
     if($new_array['status'] == "ToBeReviewed"){

	    $name=$new_array['cart'][$oid]['productTitle'];
	    $qty=$new_array['cart'][$oid]['productQuantity'];
	    $price=$new_array['cart'][$oid]['productSellPrice'];
	    // $images=$new_array['cart'][$oid]['productImage'];

	    array_push($prods, $name);
	    array_push($prods, $qty);
	    array_push($prods, $price);
	    array_push($prods, $oid);
	 }
  }
  return $prods;  
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

      while ($count <= sizeof($new_array['cart'])) {


	      if($count != sizeof($new_array['cart'])){
	
	
	        $pid = array_keys($new_array['cart'])[$count];
	        $_SESSION['no_of_prods'] = sizeof($new_array['cart']);

	        $p = FetchProducts($pid, $phone);
	                
	      	$price_by_qty = $p[1] * $p[2];
            array_push($total_ammounts, $price_by_qty);

            if (strlen($p[0]) > 15) {
    	        $data = '<tr class="first odd">
	                 <td class="a-left"><a style="font-size: 10px;">'.substr($p[0], 0, 15).'..'.'</a></td>
	                 <td class="a-center"><a>'.$p[1].'</a></td>
	                 <td class="a-right"><a>&#8377;'.$p[2].'</a></td>
	                 </tr>';
            }else{
            	$data = '<tr class="first odd">
	                 <td class="a-left"><a style="font-size: 10px;">'.$p[0].'</a></td>
	                 <td class="a-center"><a>'.$p[1].'</a></td>
	                 <td class="a-right"><a>&#8377;'.$p[2].'</a></td>
	                 </tr>';
            }


	      }else{

			if(round(array_sum($total_ammounts)) > 150){

				echo $datas = '
				<tfoot style="border: 0; outline: 0;">
				<tr class="first last">
				<td class="a-right last" colspan="50">
				<strong> Delivery Charges : FREE</strong>
				</td>
				</tr>		
				<tr class="first last">
				<td class="a-right last" colspan="50">
				<strong> Total : &#8377;'.round(array_sum($total_ammounts)).'</strong>
				</td>
				</tr>
				</tfoot>';

				echo '<input type="hidden" name="order_final_price" id="order_final_price" value="'.round(array_sum($total_ammounts)).'">';

			}elseif(!empty(round(array_sum($total_ammounts))) && round(array_sum($total_ammounts)) < 150){
				array_push($total_ammounts, $dc);
				echo $datas = '
				<tfoot style="border: 0; outline: 0;">
				<tr class="first last">
				<td class="a-right last" colspan="50">
				<strong> Delivery Charges : &#8377;15</strong>
				</td>
				</tr>		
				<tr class="first last">
				<td class="a-right last" colspan="50">
				<strong> Total : &#8377;'.round(array_sum($total_ammounts)).'</strong>
				</td>
				</tr>
				</tfoot>';

				echo '<input type="hidden" name="order_final_price" id="order_final_price" value="'.round(array_sum($total_ammounts)).'">';


			}

 
	        break;

	      }
	      
	      if(sizeof($new_array['cart']) > 0){
	        echo $data;

	      }else{
	        $data = '<tr class="first odd">
                 <td class="a-left"><a>Cart is empty!</a></td>
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

<?php

reset($new_array);

$_SESSION['tm'] = round(array_sum($total_ammounts));
exit;
 ?>
</body>
</html>