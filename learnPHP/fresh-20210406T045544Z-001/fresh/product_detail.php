<?php require_once('Mongo_config.php'); ?><?php 

session_start();
error_reporting(0);

global $manager;
global $Mongo_database;

$_SESSION['user_name'];
$_SESSION['user_name_phone'];
$_SESSION['user_postal_code'];
$_SESSION['user_name_whatsappmessagesId'];
$_SESSION['wpnumb'];


$p_id = isset($_REQUEST['product_id'])?$_REQUEST['product_id']:"";

$ff = fopen("matrix_pd.txt", 'a');
fwrite($ff, $p_id."\n");

// Retrieve Product Informations from ID

$query = new MongoDB\Driver\Query(['_id'=>new MongoDB\BSON\ObjectID($p_id)]);

$cursor = $manager->executeQuery($Mongo_database.'.products', $query);

foreach ($cursor as $document)
{
$_SESSION['product_tags'] = $document->productSubCategories; // product tags
$_SESSION['product_title'] = $document->productTitle; //product title
$_SESSION['product_local_title'] = $document->productTitle; // product Description
$_SESSION['parent_Title'] = $document->ProductCategory; // Parent title
$_SESSION['product_Sell_Price'] = $document->productSellPrice; // product sell price
$_SESSION['product_category'] = $document->ProductCategory;  // product category
$_SESSION['product_OutsidePrice'] = $document->OutsidePrice; // Outside Price
$_SESSION['product_images'] = $document->productImage; // product Image
}
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Favicons Icon -->
      <link rel="icon" href="images/favicon.png" type="image/x-icon">
      <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
      <title>Daily Fresh Store</title>
      <!-- Mobile Specific -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
      <style type="text/css">
         /*Wave login panel*/
         /*#59B210*/
         #bgdiv{
         background-repeat: no-repeat;
         background-size: cover;
         background-image: url(images/b2.jpg);  
         }
         #imgfruit:hover{
         transform: scale(1.1,1.1); 
         }
         #groceryimg:hover{
         transform: scale(1.1,1.1); 
         }
      </style>
   </head>
<body class="shopping-cart-page">
<div id="page">
    <!-- Main Container -->
  <section class="main-container col1-layout mainclasses">
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <div class="product-view">
              <div class="product-essential">
                <form action="#" method="post" id="product_addtocart_form">
                  <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                  <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                    <!-- <div class="new-label new-top-left"> New </div> -->
                    <div class="product-image">
                      <div class="product-full"> <img id="product-zoom" src="<?php echo $_SESSION['product_images']; ?>" data-zoom-image="<?php echo $_SESSION['product_images']; ?>" alt="product-image"/> </div>

                    </div>
                    <!-- end: more-images --> 
                  </div>
                  <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                    <div class="product-name">

                  <input type="hidden" id="productTitle_product_details" value="<?php echo $_SESSION['product_local_title']; ?>">
                  <input type="hidden" id="productDiscountprice_product_details" value="<?php echo $_SESSION['product_Sell_Price']; ?>">
                  <input type="hidden" id="productId_product_details" value="<?php echo $p_id; ?>">

                      <h1><?php echo $_SESSION['product_local_title']; ?></h1>
                    </div>
                    
                    <div class="ratings">
                      <div class="rating-box">
                        <div style="width:60%" class="rating"></div>
                      </div>
                      <!-- <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p> -->
                    </div>
                    
                    <div class="price-block">
                      <div class="price-box">
                        <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> &#8377;<?php echo $_SESSION['product_Sell_Price']; ?> </span> </p>
                        <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> &#8377;<?php echo $_SESSION['product_OutsidePrice']; ?> </span> </p>
                        <p class="availability in-stock pull-right"><span>In Stock</span></p>
                      </div>
                    </div>
                    <div class="short-description">
                      <h2>Quick Overview</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. </p>
                    </div>
                    <div class="add-to-box">
                      <div class="add-to-cart">
                        <div class="pull-left">
                          <div class="custom pull-left">
                            <input type="number" id="quantity_" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" />
                          </div>
                        </div>
                        <?php 
                        $data = '<button id="' . $p_id . '_PN_' . $_SESSION['product_local_title'] . '_PRICE_' . $hot_render['productSellPrice'] . '" data-original-title="Add to Cart" title="" type="button" class="button btn-cart cartbtnsingle"><span>Add to Cart</span> </button>';
                        echo $data;
                        ?>
                      </div>
<!--                       <div class="email-addto-box">
                        <ul class="add-to-links">
                          <li> <a class="link-wishlist" href="wishlist.html"><span>Add to Wishlist</span></a></li>
                          <li><span class="separator">|</span> <a class="link-compare" href="compare.html"><span>Add to Compare</span></a></li>
                        </ul>
                        <p class="email-friend"><a href="#" class=""><span>Email to a Friend</span></a></p>
                      </div> -->
                    </div>
                    <div class="social">
                      <ul class="link">
                        <li class="fb"><a href="#"></a></li>
                        <li class="tw"><a href="#"></a></li>
                        <li class="googleplus"><a href="#"></a></li>
                        <li class="rss"><a href="#"></a></li>
                        <li class="pintrest"><a href="#"></a></li>
                        <li class="linkedin"><a href="#"></a></li>
                        <li class="youtube"><a href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
            <div class="add_info">
              <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                <!-- <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li> -->
                <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>
                <!-- <li> <a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a> </li> -->
                <!-- <li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li> -->
              </ul>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="product_tabs_description">
                  <div class="std">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                    <p> Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>
                  </div>
                </div>


                <div class="tab-pane fade" id="reviews_tabs">
                  <div class="box-collateral box-reviews" id="customer-reviews">
                    <div class="box-reviews1">
                      <div class="form-add">
                        <form id="review-form" method="post" action="https://www.magikcommerce.com/review/product/post/id/176/">
                          <h3>Write Your Own Review</h3>
                          <fieldset>
                            <h4>How do you rate this product? <em class="required">*</em></h4>
                            <span id="input-message-box"></span>
                            <table id="product-review-table" class="data-table">
                              <colgroup>
                              <col>
                              <col width="1">
                              <col width="1">
                              <col width="1">
                              <col width="1">
                              <col width="1">
                              </colgroup>
                              <thead>
                                <tr class="first last">
                                  <th>&nbsp;</th>
                                  <th><span class="nobr">1 *</span></th>
                                  <th><span class="nobr">2 *</span></th>
                                  <th><span class="nobr">3 *</span></th>
                                  <th><span class="nobr">4 *</span></th>
                                  <th><span class="nobr">5 *</span></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="first odd">
                                  <th>Price</th>
                                  <td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
                                  <td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
                                  <td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
                                  <td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
                                  <td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
                                </tr>
                                <tr class="even">
                                  <th>Value</th>
                                  <td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
                                  <td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
                                  <td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
                                  <td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
                                  <td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
                                </tr>
                                <tr class="last odd">
                                  <th>Quality</th>
                                  <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
                                  <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
                                  <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
                                  <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
                                  <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
                                </tr>
                              </tbody>
                            </table>
                            <input type="hidden" value="" class="validate-rating" name="validate_rating">
                            <div class="review1">
                              <ul class="form-list">
                                <li>
                                  <label class="required" for="nickname_field">Nickname<em>*</em></label>
                                  <div class="input-box">
                                    <input type="text" class="input-text" id="nickname_field" name="nickname">
                                  </div>
                                </li>
                                <li>
                                  <label class="required" for="summary_field">Summary<em>*</em></label>
                                  <div class="input-box">
                                    <input type="text" class="input-text" id="summary_field" name="title">
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="review2">
                              <ul>
                                <li>
                                  <label class="required " for="review_field">Review<em>*</em></label>
                                  <div class="input-box">
                                    <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                                  </div>
                                </li>
                              </ul>
                              <div class="buttons-set">
                                <button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                    <div class="box-reviews2">
                      <h3>Customer Reviews</h3>
                      <div class="box visible">
                        <ul>
                          <li>
                            <table class="ratings-table">
                              <colgroup>
                              <col width="1">
                              <col>
                              </colgroup>
                              <tbody>
                                <tr>
                                  <th>Value</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:100%;"></div>
                                    </div></td>
                                </tr>
                                <tr>
                                  <th>Quality</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:100%;"></div>
                                    </div></td>
                                </tr>
                                <tr>
                                  <th>Price</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:100%;"></div>
                                    </div></td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="review">
                              <h6><a href="#">Excellent</a></h6>
                              <small>Review by <span>Leslie Prichard </span>on 1/3/2014 </small>
                              <div class="review-txt"> I have purchased shirts from Minimalism a few times and am never disappointed. The quality is excellent and the shipping is amazing. It seems like it's at your front door the minute you get off your pc. I have received my purchases within two days - amazing.</div>
                            </div>
                          </li>
                          <li class="even">
                            <table class="ratings-table">
                              <colgroup>
                              <col width="1">
                              <col>
                              </colgroup>
                              <tbody>
                                <tr>
                                  <th>Value</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:100%;"></div>
                                    </div></td>
                                </tr>
                                <tr>
                                  <th>Quality</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:100%;"></div>
                                    </div></td>
                                </tr>
                                <tr>
                                  <th>Price</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:80%;"></div>
                                    </div></td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="review">
                              <h6><a href="#/catalog/product/view/id/60/">Amazing</a></h6>
                              <small>Review by <span>Sandra Parker</span>on 1/3/2014 </small>
                              <div class="review-txt"> Minimalism is the online ! </div>
                            </div>
                          </li>
                          <li>
                            <table class="ratings-table">
                              <colgroup>
                              <col width="1">
                              <col>
                              </colgroup>
                              <tbody>
                                <tr>
                                  <th>Value</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:100%;"></div>
                                    </div></td>
                                </tr>
                                <tr>
                                  <th>Quality</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:100%;"></div>
                                    </div></td>
                                </tr>
                                <tr>
                                  <th>Price</th>
                                  <td><div class="rating-box">
                                      <div class="rating" style="width:80%;"></div>
                                    </div></td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="review">
                              <h6><a href="#/catalog/product/view/id/59/">Nicely</a></h6>
                              <small>Review by <span>Anthony  Lewis</span>on 1/3/2014 </small>
                              <div class="review-txt last"> Unbeatable service and selection. This store has the best business model I have seen on the net. They are true to their word, and go the extra mile for their customers. I felt like a purchasing partner more than a customer. You have a lifetime client in me. </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="actions"> <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a> </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 
  
  <!-- Related Products Slider -->
  
  <div class="container">

    <div class="product-bestseller">
       <div class="product-bestseller-content">
          <div class="product-bestseller-list">
             <div class="tab-container">
       
                <div class="tab-panel active" id="tab-1">
                   <div class="category-products">
                      <center>
                         <div class="team-grid" style="margin-left: 16px;">
                            <div class="container" id="pcontainer">
                               <div class="row people" id="shows" style="margin-left: -30px;">                                    
                                  <?php 

                                   $start = microtime(true);
                                   $datapl = '';
                                   require_once 'vendor/autoload.php';
                                   
                                   try {

                                        $query = new MongoDB\Driver\Query([]); 

                                        $rows = $manager->executeQuery($Mongo_database.".products", $query);

                                        foreach ($rows as $row) {

                                          $Viewdesc = $row->productTitle;
                                          $ex = explode("-", $_SESSION['product_local_title'])[0];   
                                          if (strpos($Viewdesc, $ex) !== false && $row->ProductCategory === $_SESSION['product_category'] || $row->ProductCategory == $_SESSION['product_category']){
                                            if(explode('/', $row->productTitle)[0] !== false){

                                              $datapl .= '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: 200px; margin: 18.5; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: 270px;"><div class="float-none visible" id="image-view" style="margin: 5px; background-repeat: no-repeat; width: 60%; height: 40%; background-size: contain; background-image: url('."'".$row->productImage."'".');"></div><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><button id="'.$row->_id.'" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Rubik, sans-serif; color: #515151; font-size: 12px;">'.explode('/', $row->productTitle)[0].'</button></li>';

                                            }else{

                                              $datapl .= '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: 200px; margin: 18.5; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: 270px;"><div class="float-none visible" id="image-view" style="margin: 5px; background-repeat: no-repeat; width: 60%; height: 40%; background-size: contain; background-image: url('."'".$row->productImage."'".');"></div><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><button id="'.$row->_id.'" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Rubik, sans-serif; color: #515151; font-size: 12px;">'.$row->productTitle.'</button></li>';

                                            }

                                            $datapl.='<li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><span class="mt-auto" id="productSellPrice_'.$row->_id.'" style="width: 100%;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858; font-size: 10px;"><input type="text" style="margin-top: 3px; float: left; text-align: right; width: 40%; outline: 0; border: 0;text-decoration: line-through;" value="&#8377; 1000" readonly /><input type="text" id="productDiscountprice_'.$row->_id.'" name="productDiscountprice" style="border: 0; outline: 0; float: right; text-align: left; width: 55%; background-color: #fff; height: auto; font-weight: bold; font-size: 12px; font-family: Rubik, sans-serif; color: #585858;" value="&#8377;'.$row->productSellPrice.'  (200gms)" readonly /></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><input type="number" id="quantity_'.$row->_id.'" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 8px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><input  type="submit" class="btn btn-primary cartbtn" name="addtocartbtn" id="'.$row->_id.'" style="margin-top: -7px; background-color: #e31837; font-family: Rubik, sans-serif; font-size: 14px; text-shadow: none; padding: 9px 10px 5px 10px; font-weight: 500; transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s; border: none; height: 40px; text-transform: uppercase; border-bottom: 3px rgba(0,0,0,0.1) solid; margin-left: 1px; color : #ffffff;" value="ADD TO CART" /></li></ul></center></div>';

                                          } 
                                        }
                                        echo $datapl;         

                                   } catch (MongoDB\Driver\Exception\Exception $e) {
                                   
                                   }
                                   
                                exit;
                                ?>    
                             </div>
                          </div>
                       </div>
                    </center>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
</div>
  <!-- End related products Slider --> 
  
  <!-- Related Products Slider End --> 
  </body>
</html>