<html lang="en">
   <head>
      <meta charset="utf-8">
      <!-- [if IE]>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <![endif] -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Favicons Icon -->
      <link rel="icon" href="images/favicon.png" type="image/x-icon">
      <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
      <!-- Mobile Specific -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
      <!-- <link rel="stylesheet" href="assets/css/Team-Grid.css"> -->
      <!--       <link rel="stylesheet" href="assets/css/styles.css">
         <link rel="stylesheet" href="assets/css/Team-Grid.css">
         -->
      <!-- CSS Style -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all">
      <link rel="stylesheet" type="text/css" href="css/simple-line-icons.css" media="all">
      <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
      <link rel="stylesheet" type="text/css" href="css/internal.css" media="all">
      <link rel="stylesheet" type="text/css" href="css/revslider.css">
      <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
      <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
      <link rel="stylesheet" type="text/css" href="css/flexslider.css">
      <link rel="stylesheet" type="text/css" href="css/jquery.mobile-menu.css">
      <!--===============================================================================================-->  
      <link rel="icon" type="image/png" href="images/icons/favicon.ico">
      <!--===============================================================================================-->
      <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
      <!--===============================================================================================-->  
      <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
      <!--===============================================================================================-->  
      <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="css/utilss.css">
      <!-- <link rel="stylesheet" type="text/css" href="css/mainss.css"> -->
      <!--===============================================================================================-->
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i,900" rel="stylesheet">
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
  
<?php
error_reporting(0);
session_start();
//"64 start"."<br>";
$default_val = 1;

require_once 'Mongo_config.php';

$Product_ids = array();

$data = '';
$numbers = isset($_REQUEST['numbers'])?$_REQUEST['numbers']:"";

$phone = $numbers;

$_SESSION['wpnumb'] = $numbers;

// Creating a Fucntion to convert Object StdClass to Array.
$sub_total_price = array();
//"75 start"."<br>";
function objectToArray($d)
{
    if (is_object($d))
    {
        $d = get_object_vars($d);
    }

    if (is_array($d))
    {
        return array_map(__FUNCTION__, $d);
    }
    else
    {
        return $d;
    }
    //"obj to array start"."<br>";
}

//"94 start"."<br>";
function FetchProducts($oid, $phone)
{
	//"fetch products start"."<br>";
    global $manager;
    global $Mongo_database;

    $prod = array();

    $filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
    $limit = ['limit' => 1];
    $query = new MongoDB\Driver\Query($filter, $limit);

    $rows = $manager->executeQuery($Mongo_database . ".managedcart", $query);

    foreach ($rows as $row)
    {
        $new_array = objectToArray($row);
        // //($new_array['cart'][$oid]);
        // if($new_array['status'] == "ToBeReviewed"){
        $price = $new_array['cart'][$oid]['productSellPrice'];
        $qty = $new_array['cart'][$oid]['productQuantity'];

        array_push($prod, $price);
        array_push($prod, intval($qty));
        // }
        
    }
    // //($prod);
    return $prod;
}

try
{
	//"try start"."<br>";
    global $manager;
    global $Mongo_database;

    $filter = ['phone' => $_SESSION['wpnumb'], 'orderType' => ''];
    $limit = ['limit' => 1];
    $query = new MongoDB\Driver\Query($filter, $limit);
    $rows = $manager->executeQuery($Mongo_database . ".managedcart", $query);
    //($_SESSION['wpnumb']);
    //($rows->toArray());

    $count = 0;

    foreach ($rows as $row)
    {
    	// echo "foreach start"."<br>";
        $new_array = objectToArray($row);

        // if($new_array['status'] == "ToBeReviewed"){
        while ($count <= sizeof($new_array['cart']))
        {

        	//"while start"."<br>";
            // //'<pre>';
            $pid = array_keys($new_array['cart']) [$count];
            // //$pid;
            // //"<br />";
            $_SESSION['no_of_prods'] = sizeof($new_array['cart']);

            // //($pid);
            $p = FetchProducts($pid, $phone);
            // //($p[1]);
            // //'</pre>';
            // total price
            // $c = $p[2] * $p[1];
            // //"<pre>";
            // //($new_array['cart']['productSellPrice']);
            $totalP = $p[1] * $p[0];

            array_push($sub_total_price, $totalP);
            // //($sub_total_price);
            // //"</pre>";
            $count++;

            if ($count == sizeof($new_array['cart']))
            {
            	//"while if break start"."<br>";
                break;
            }
        }
        // }
        

        
    }

    $_SESSION['totalPrice'] = array_sum($sub_total_price);

    $deliveryCharges = 15;
    // var_dump(array_sum($sub_total_price));
    if ($_SESSION['totalPrice'] < 150 && $_SESSION['totalPrice'] != 0)
    {	
    	// var_dump(array_sum($sub_total_price));
        $_SESSION['totalPrice'] = $_SESSION['totalPrice'] + $deliveryCharges;
        $_SESSION['deliveryCharges'] = 15;
    }
    else
    {	
    	// var_dump(array_sum($sub_total_price));
        $_SESSION['totalPrice'] = $_SESSION['totalPrice'];
        $_SESSION['deliveryCharges'] = "FREE";
    }

	// var_dump(array_sum($sub_total_price));

    $data = '<table class="table shopping-cart-table-total" id="shopping-cart-totals-table"><colgroup>
	<col><col width="1"></colgroup>
	<tfoot>
	<tr>
	<td colspan="1" class="a-left"><strong>Grand Total</strong></td>
	<td class="a-right" style=""><strong><span class="price">' . "&#8377;" . $_SESSION["totalPrice"] . '</span></strong></td>
	</tr>
	</tfoot>
	<tbody>
	<tr>
	<td colspan="1" class="a-left" style=""> Subtotal </td>
	<td class="a-right" style=""><span class="price">' . "&#8377;" . $_SESSION["totalPrice"] . '</span></td>
	</tr>
	<tr>
	<td colspan="1" class="a-left" style=""> Delivery Charges </td>
	<td class="a-right" style=""><span class="price"><strong>' . $_SESSION['deliveryCharges'] . '</strong></span></td>
	</tr>
	</tbody>
	</table>';

    if (array_sum($sub_total_price) > 15)
    {

        echo $data;

    }
    else
    {
        $data = '<table class="table shopping-cart-table-total" id="shopping-cart-totals-table"><colgroup>
			<col><col width="1"></colgroup>
			<tfoot>
			<tr>
			<td colspan="1" class="a-left"><strong>Grand Total</strong></td>
			<td class="a-right" style=""><strong><span class="price">' . "&#8377;0" . '</span></strong></td>
			</tr>
			</tfoot>
			<tbody>
			<tr>
			<td colspan="1" class="a-left" style=""> Subtotal </td>
			<td class="a-right" style=""><span class="price">' . "&#8377;0" . '</span></td>
			</tr>
			<tr>
			<td colspan="1" class="a-left" style=""> Delivery Charges </td>
			<td class="a-right" style=""><span class="price">' . "&#8377;0" . '</span></td>
			</tr>
			</tbody>
			</table>';
        
        echo $data;
        $_SESSION['no_of_prods'] = '';
    }
}
catch(MongoDB\Driver\Exception\Exception $e)
{

}

?>    

<ul class="checkout">
<li>
<button class="button btn-proceed-checkout" onclick="setLocation('Checkout.php')" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button>
<!-- Button trigger modal -->
</li>
</ul>
<!--actions-->
<script type="text/javascript">

function setLocation($url){

	window.location.assign($url);

}

</script>
<?php

// reset($new_array);
exit;
?>



</body>
</html>
