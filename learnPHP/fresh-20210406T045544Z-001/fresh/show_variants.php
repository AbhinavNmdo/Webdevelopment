<?php require_once('Mongo_config.php'); ?>
<?php 

$start = microtime(true);
$data = '';

try {
  // function GetData(){
  $query = new MongoDB\Driver\Query([]); 

  $rows = $manager->executeQuery($Mongo_database.".products", $query);

  foreach ($rows as $row) {

    $Viewdesc = $row->productTitle;
    $ex = explode("-", $_SESSION['product_local_title'])[0];   
    if (strpos($Viewdesc, $ex) && $row->ProductCategory === $_SESSION['product_category'] || $row->ProductCategory == $_SESSION['product_category']){
      $data .= '<div class="item"><div class="item-inner"><div class="item-img"><div class="item-img-info"><a class="product-image" title="'.$row->productDescription.'" href="product_detail.html"> <img alt="'.$row->productDescription.'" src="'.$row->productImage.'"> </a></div></div><div class="item-info"><div class="info-inner"><div class="item-title"> <a title="Retis lapen casen" href="product_detail.html"> '.$row->productDescription.' </a> </div><div class="item-content"><div class="item-price"><div class="price-box"> <span class="regular-price"> <span class="price">&#8377;'.$row->productSellPrice.'</span> </span></div></div><div class="action"><button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span></button></div></div></div></div></div></div>';
    } 
  }
  echo $data;         

  // $handler = fopen($cache, 'w');
  // fwrite($handler, $data);
  // fclose($handler);
  // }

  // $end = microtime(true);
  // $time = round(($end - $start), 4);

} catch (MongoDB\Driver\Exception\Exception $e) {

// $filename = basename(__FILE__);

// echo "The $filename script has experienced an error.\n"; 
// echo "It failed with the following exception:\n";

// echo "Exception:", $e->getMessage(), "\n";
// echo "In file:", $e->getFile(), "\n";
// echo "On line:", $e->getLine(), "\n";       
}
   
exit;
?>    

