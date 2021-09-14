<?php
session_start();
error_reporting(E_ALL);
$_SESSION['pincode'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/Team-Grid.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<style type="text/css">
  .productTitle:hover {
    color: #e31837;
  }
</style>

<body>

  <?php

  $searchseol = isset($_REQUEST['searchseo']) ? $_REQUEST['searchseo'] : "";

  $searchseoll = strtolower($searchseol);

  $searchseo = ucwords($searchseoll);

  function fileExists($filePath)
  {
    return is_file($filePath) && file_exists($filePath);
  }

  global $manager;
  global $Mongo_database;

  $start = microtime(true);
  $data = '';
  require_once('Mongo_config.php');
  try {

    // function GetData(){
    $query = new MongoDB\Driver\Query(['productTitle' => new \MongoDB\BSON\Regex($searchseo)]);

    $rows = $manager->executeQuery($Mongo_database . ".products", $query);

    foreach ($rows as $row) {

      if (fileExists($row->productImage)) {
        $cpin = 'C' . $_SESSION['pincode'];
        $apin = 'A' . $_SESSION['pincode'];
        if ($row->$cpin === 'TRUE') {
          if ($row->$apin !== 'null') {

            // if ($row->productSellPrice > 0){
            $data .= '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: 270px; margin: 18.5; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: 420px;"><div class="float-none visible" id="image-view" style="background-repeat: no-repeat; width: 100%; background-size: contain; background-image: url(' . "'" . $row->productImage . "'" . ');"></div><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><button id="' . $row->_id . '" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Roboto, sans-serif; color: #515151; font-size: 14px; font-weight: 500; ">' . $row->productTitle . '</button></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><span class="mt-auto" id="productSellPrice_' . $row->_id . '" style="width: 100%;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858; font-size: 12px;"><input type="text" style="margin-top: 5px; float: left; text-align: right; width: 40%; outline: 0; border: 0;text-decoration: line-through;" value="&#8377; ' . $row->OutsidePrice . '" readonly /><input type="text" id="productDiscountprice_' . $row->_id . '" name="productDiscountprice" style="border: 0; outline: 0; float: right; text-align: left; width: 55%; background-color: #fff; height: auto; font-weight: bold; font-size: 15px; font-family: Rubik, sans-serif; color: #585858;" value="&#8377; ' . $row->$apin . '  (' . $row->productUnit . ')" readonly /></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><input type="number" id="quantity_' . $row->_id . '" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><input  type="submit" class="btn btn-primary cartbtn" name="addtocartbtn" id="' . $row->_id . '" style="margin-top: -7px; background-color: #e31837; font-family: Rubik, sans-serif; font-size: 14px; text-shadow: none; padding: 9px 10px 5px 10px; font-weight: 500; transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s; border: none; height: 40px; text-transform: uppercase; border-bottom: 3px rgba(0,0,0,0.1) solid; margin-left: 1px; color : #ffffff;" value="ADD TO CART" /></li></ul></center></div>';
          } else {


            // if ($row->productSellPrice > 0){
            $data .= '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: 270px; margin: 18.5; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: 420px;"><div class="float-none visible" id="image-view" style="background-repeat: no-repeat; width: 100%; background-size: contain; background-image: url(' . "'" . $row->productImage . "'" . ');"></div><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><button id="' . $row->_id . '" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Roboto, sans-serif; color: #515151; font-size: 14px; font-weight: 500; ">' . $row->productTitle . '</button></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><span class="mt-auto" id="productSellPrice_' . $row->_id . '" style="width: 100%;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858; font-size: 12px;"><input type="text" style="margin-top: 5px; float: left; text-align: right; width: 40%; outline: 0; border: 0;text-decoration: line-through;" value="&#8377; ' . $row->OutsidePrice . '" readonly /><input type="text" id="productDiscountprice_' . $row->_id . '" name="productDiscountprice" style="border: 0; outline: 0; float: right; text-align: left; width: 55%; background-color: #fff; height: auto; font-weight: bold; font-size: 15px; font-family: Rubik, sans-serif; color: #585858;" value="&#8377; ' . $row->productSellPrice . '  (' . $row->productUnit . ')" readonly /></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><input type="number" id="quantity_' . $row->_id . '" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><input  type="submit" class="btn btn-primary cartbtn" name="addtocartbtn" id="' . $row->_id . '" style="margin-top: -7px; background-color: #e31837; font-family: Rubik, sans-serif; font-size: 14px; text-shadow: none; padding: 9px 10px 5px 10px; font-weight: 500; transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s; border: none; height: 40px; text-transform: uppercase; border-bottom: 3px rgba(0,0,0,0.1) solid; margin-left: 1px; color : #ffffff;" value="ADD TO CART" /></li></ul></center></div>';
          }
        }
      }
    }

    echo $data;
  } catch (MongoDB\Driver\Exception\Exception $e) {

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
  }


  ?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>

</html>