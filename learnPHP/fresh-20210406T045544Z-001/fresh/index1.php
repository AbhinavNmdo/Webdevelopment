<?php
session_start();
error_reporting(E_ALL);
require_once ('Mongo_config.php');
global $manager;
global $Mongo_database;
$_SESSION['user_name'];
$_SESSION['user_name_phone'];
$_SESSION['user_postal_code'];
$_SESSION['user_name_whatsappmessagesId'];
$_SESSION['wpnumb'];
$_SESSION['pincode'];
if (empty($_SESSION['user_name']) === true || empty($_SESSION['wpnumb']) === true)
{
    echo '<script type="text/javascript">window.location.assign("login.php")</script>';
}
function fileExists($filePath)
{
    return is_file($filePath) && file_exists($filePath);
}
?>
<?php
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
      <title>thedailyfreshstore | Shop Now</title>
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
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/styles.css">
      <link rel="stylesheet" href="assets/css/Team-Grid.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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
      <!-- JavaScript -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

      <!-- CSS -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <!-- Default theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <!-- Semantic UI theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <!-- Bootstrap theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

      <!-- 
          RTL version
      -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
      <!-- Default theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
      <!-- Semantic UI theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
      <!-- Bootstrap theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

      <style type="text/css">

        @media only screen and (max-width: 1250px) {
          .seosearch, .seobutton {
              display: none;
          }
        }
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

         .alertify-notifier .ajs-message.ajs-success {
            border: 2px solid #e31837;
            background-color: #e31837;
            border-radius: 10px;
            color: #ffffff;
            font-family: 'Rubik', sans-serif;
            font-weight: 500;
            font-size: 14px;
         }

      </style>
   </head>
   <body class="shopping-cart-page">
<div id="dialog" title="Basic dialog" style="display: none;">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
      <div id="page">

         <!-- Header start -->
         <?php include 'headersandnavbars.php'; ?>
         <!-- Header end -->
         <!-- Slider -->
         <div id="thm-slideshow" class="thm-slideshow">
            <div class="container">
               <div class="row slideshow_renders">
                  <div class="col-md-9">
                     <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                           <ul>
                              <?php
$query = new MongoDB\Driver\Query([]);
$rows = $manager->executeQuery($Mongo_database . ".offerCollections", $query);
foreach ($rows as $row)
{
    $banner_render = objectToArray($row);
    $data = "<li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='" . $banner_render['bannerimage'] . "'>
                                                <img src='" . $banner_render['bannerimage'] . "' alt='slide-img' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' />
                                                <div class='info'>
                                                   <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'><span>" . ucwords($banner_render['offertitle']) . "</span> </div>
                                                   <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'><span>" . ucwords($banner_render['offertype']) . "</span> </div>
                                                   <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1450' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>" . ucwords($banner_render['offerdescription']) . "</div>
                                                   <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'><a href='" . ucwords($banner_render['offerlink']) . "' class='buy-btn'>Shop Now</a> </div>
                                                </div>
                                             </li>";
    echo $data;
}
?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!--  call slide show here -->
                  <div class="col-md-3 hot-deal">
                     <ul class="products-grid">
                        <li class="right-space two-height item">
                           <div class="item-inner">
                              <div class="item-img">
                                 <?php
global $manager;
global $Mongo_database;
$query = new MongoDB\Driver\Query(['ProductCategory' => 'COSMETICS']);
$rows = $manager->executeQuery($Mongo_database . ".products", $query);
$row_count = 0;
foreach ($rows as $row)
{
    $hot_render = objectToArray($row);
    if (fileExists($row->productImage))
    {
        if ($row_count < 1)
        {
            $cpin = 'C' . $_SESSION['pincode'];
            $apin = 'A' . $_SESSION['pincode'];
            if ($row->$cpin === 'TRUE')
            {
                if ($row->$apin !== 'null')
                {
                    $data = '<div class="item-img-info">
                                    <a title="' . $hot_render["productTitle"] . '" class="product-image" style="width: 150px; height: 230px; margin: auto;"> <img src="' . $hot_render["productImage"] . '" alt="' . $hot_render["productTitle"] . '"> </a>
                                    <div class="hot-label hot-top-left" id="' . $hot_render["_id"]["oid"] . '">Hot</div>
                                    <div class="item-info">
                                       <div class="info-inner">
                                                <div class="item-title"> <a  title="' . $hot_render["productTitle"] . '"> ' . $hot_render["productTitle"] . ' </a> </div>
                                                <div class="item-content">
                                                   <div class="rating">
                                                      <div class="ratings">
                                                         <div class="rating-box">
                                                            <div class="rating" style="width:80%"></div>
                                                         </div>
                                                         <p class="rating-links"> <a >1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                      </div>
                                                   </div>
                                                   <div class="item-price">
                                                      <div class="price-box"> <span class="regular-price"> <span class="price">&#8377; ' . $hot_render['A' . $_SESSION['pincode']] . '</span> </span> </div>
                                                   </div>
                                                   <div class="action">
                                                      <button id="' . $hot_render["_id"]["oid"] . '_PN_' . $hot_render["productTitle"] . '_PRICE_' . $hot_render['A' . $_SESSION['pincode']] . '" data-original-title="Add to Cart" title="" type="button" class="button btn-cart cartbtnsingle"><span>Add to Cart</span> </button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          </div>';
                    echo $data;
                }
                else
                {
                    $data = '<div class="item-img-info">
                                          <a title="' . $hot_render["productTitle"] . '" class="product-image" style="width: 150px; height: 230px; margin: auto;"> <img src="' . $hot_render["productImage"] . '" alt="' . $hot_render["productTitle"] . '"> </a>
                                          <div class="hot-label hot-top-left" id="' . $hot_render["_id"]["oid"] . '">Hot</div>
                                          <div class="item-info">
                                             <div class="info-inner">
                                                      <div class="item-title"> <a  title="' . $hot_render["productTitle"] . '"> ' . $hot_render["productTitle"] . ' </a> </div>
                                                      <div class="item-content">
                                                         <div class="rating">
                                                            <div class="ratings">
                                                               <div class="rating-box">
                                                                  <div class="rating" style="width:80%"></div>
                                                               </div>
                                                               <p class="rating-links"> <a >1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                            </div>
                                                         </div>
                                                         <div class="item-price">
                                                            <div class="price-box"> <span class="regular-price"> <span class="price">&#8377; ' . $hot_render["productSellPrice"] . '</span> </span> </div>
                                                         </div>
                                                         <div class="action">
                                                            <button id="' . $hot_render["_id"]["oid"] . '_PN_' . $hot_render["productTitle"] . '_PRICE_' . $hot_render["productSellPrice"] . '" data-original-title="Add to Cart" title="" type="button" class="button btn-cart cartbtnsingle"><span>Add to Cart</span> </button>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                </div>';
                    echo $data;
                }
            }
            // else {
            //     $data = "sorry not available on your pincode";
            //     echo $data;
            // }
            
        }
        $row_count = $row_count + 1;
        break;
    }
}
?>
                              </div>
                           </div>
                  </div>
                  </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- end Slider -->
      <div class="content-page">

         <div class="container">
            <!-- featured category fashion -->
            <div class="category-product">
               <div class="navbar nav-menu">
                  <div class="navbar-collapse">
                     <ul class="nav navbar-nav">
                        <li>
                           <h2 style="padding: 15px 20px 15px 20px; float: left; background-color: green; color: white;font-weight: 500; font-size: 22px;letter-spacing: 1px; font-family: 'Rubik', sans-serif; text-transform:uppercase; color:#fff; background-color: #59B210;">NEW PRODUCTS</h2>
                        </li>
                     </ul>
                  </div>
                  <!-- /.navbar-collapse --> 
               </div>
               <div class="product-bestseller">
                  <div class="product-bestseller-content">
                     <div class="product-bestseller-list">
                        <div class="tab-container">
                           <!-- tab product -->
                           <div class="tab-panel active" id="tab-1">
                              <div class="category-products">
                                 <ul class="row products-grid" id="shows">
                                    <!-- <div class="container" id="pcontainer"> -->
                                       <!-- <div class="row people" id="shows" style="margin-left: -30px;">                                     -->

                                    <?php
global $manager;
global $Mongo_database;
$query = new MongoDB\Driver\Query(['ProductCategory' => 'SKIN-CARE']);
$rows = $manager->executeQuery($Mongo_database . ".products", $query);
$row_counts = 0;
foreach ($rows as $row)
{
    $hot_render = objectToArray($row);
    if (fileExists($row->productImage) && $hot_render['productSellPrice'] > 0 && $hot_render['productSellPrice'] !== "NaN")
    {
        if ($row_counts < 4)
        {
            if (fileExists($row->productImage))
            {
                $cpin = 'C' . $_SESSION['pincode'];
                $apin = 'A' . $_SESSION['pincode'];
                if ($row->$cpin === 'TRUE')
                {
                    if ($row->$apin !== 'null')
                    {

                        $data = '<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                   <div class="item-inner">
                                      <div class="item-img">
                                         <div class="item-img-info" id="' . $hot_render["_id"]["oid"] . '">
                                            <a class="product-image" title="' . $hot_render["productTitle"] . '"  style="width: auto; margin: 18.5; margin-bottom: 10px; height: auto;"> <img style="width: 100%; object-fit: contain; margin: 18.5; margin-bottom: 10px; height: 270px;" alt="' . $hot_render["productTitle"] . '" src="' . $hot_render["productImage"] . '"> </a>
                                         </div>
                                      </div>
                                      <div class="item-info">
                                         <div class="info-inner">
                                            <div class="item-title"> <a title="' . $hot_render["productTitle"] . '" > ' . $hot_render["productTitle"] . ' </a> </div>
                                            <div class="item-content">
                                               <div class="rating">
                                                  <div class="ratings">
                                                     <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                     </div>
                                                     <p class="rating-links"> <a>1 Review(s)</a> <span class="separator">|</span> <a>Add Review</a> </p>
                                                  </div>
                                               </div>
                                               <div class="item-price">
                                                  <div class="price-box"> <span class="regular-price"> <span class="price">&#8377; ' . $hot_render[$apin] . '</span> </span> </div>
                                               </div>
                                               <div class="action">
                                                  <button id="' . $hot_render["_id"]["oid"] . '_PN_' . $hot_render["productTitle"] . '_PRICE_' . $hot_render[$apin] . '" class="button btn-cart cartbtnsingle" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span> </button>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </li>';
                        echo $data;

                    }
                    else
                    {
                        $data = '<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
         <div class="item-inner">
            <div class="item-img">
               <div class="item-img-info" id="' . $hot_render["_id"]["oid"] . '">
                  <a class="product-image" title="' . $hot_render["productTitle"] . '"  style="width: auto; margin: 18.5; margin-bottom: 10px; height: auto;"> <img style="width: 100%; object-fit: contain; margin: 18.5; margin-bottom: 10px; height: 270px;" alt="' . $hot_render["productTitle"] . '" src="' . $hot_render["productImage"] . '"> </a>
               </div>
            </div>
            <div class="item-info">
               <div class="info-inner">
                  <div class="item-title"> <a title="' . $hot_render["productTitle"] . '" > ' . $hot_render["productTitle"] . ' </a> </div>
                  <div class="item-content">
                     <div class="rating">
                        <div class="ratings">
                           <div class="rating-box">
                              <div style="width:80%" class="rating"></div>
                           </div>
                           <p class="rating-links"> <a>1 Review(s)</a> <span class="separator">|</span> <a>Add Review</a> </p>
                        </div>
                     </div>
                     <div class="item-price">
                        <div class="price-box"> <span class="regular-price"> <span class="price">&#8377; ' . $hot_render["productSellPrice"] . '</span> </span> </div>
                     </div>
                     <div class="action">
                        <button id="' . $hot_render["_id"]["oid"] . '_PN_' . $hot_render["productTitle"] . '_PRICE_' . $hot_render["productSellPrice"] . '" class="button btn-cart cartbtnsingle" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span> </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </li>';
                        echo $data;
                    }
                }

            }
        }
        $row_counts = $row_counts + 1;
    }
}
?>
<!--                                        </div>
                                    </div> -->
                                 </ul>
                              </div>
                           </div>
                           <!-- tab product -->
                           <div class="tab-panel" id="tab-2">
                              <div class="category-products">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- featured Slider -->
      <section class="featured-pro">
         <div class="container">
            <div class="slider-items-products">
               <div class="featured-block">
                  <div id="featured-slider" class="product-flexslider hidden-buttons">
                     <div class="home-block-inner">
                        <div class="block-title">
                           <h2>Featured</h2>
                        </div>
                        <?php
                            $query = new MongoDB\Driver\Query([]);
                            $rows = $manager->executeQuery($Mongo_database . ".products", $query);
                            $row_count = 0;
                            foreach ($rows as $row)
                            {
                                $hot_render = objectToArray($row);
                                if ($hot_render['productSellPrice'] > 300 && $hot_render['productSellPrice'] < 2100)
                                {
                                    if ($row_count < 1)
                                    {

                                        $cpin = 'C' . $_SESSION['pincode'];
                                        $apin = 'A' . $_SESSION['pincode'];
                                            if ($row->$cpin === 'TRUE')
                                            {
                                                if ($row->$apin !== 'null')
                                                {
                                                    $data = '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: auto; margin: auto; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: auto;"><img style="width: 100%; object-fit: contain; margin: 18.5; margin-bottom: 10px; height: 270px;" alt="' . $hot_render["productTitle"] . '" src="' . $hot_render["productImage"] . '"><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><a id="' . $row->_id . '" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Rubik, sans-serif; color: #515151; font-size: 14px;">' . $row->productTitle . '</a></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><span class="mt-auto" id="productSellPrice_' . $row->_id . '" style="width: 100%;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858; font-size: 12px;"><input type="text" id="productDiscountprice_' . $row->_id . '" name="productDiscountprice" style="border: 0; outline: 0; text-align: center; width: 55%; background-color: #fff; height: auto; font-weight: bold; font-size: 15px; font-family: Rubik, sans-serif; color: #585858;" value="&#8377; ' . $row->$apin . '  (' . $row->productUnit . ')" readonly /></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><input type="number" id="quantity_' . $row->_id . '" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><input  type="submit" class="btn btn-primary cartbtn" name="addtocartbtn" id="' . $row->_id . '" style="margin-top: -7px; background-color: #e31837; font-family: Rubik, sans-serif; font-size: 14px; text-shadow: none; padding: 9px 10px 5px 10px; font-weight: 500; transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s; border: none; height: 40px; text-transform: uppercase; border-bottom: 3px rgba(0,0,0,0.1) solid; margin-left: 1px; color : #ffffff;" value="ADD TO CART" /></li></ul></center></div>';
                                                    echo $data;
                                                
                                                }else{
                                                    
                                                    $data = '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: auto; margin: auto; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: auto;"><img style="width: 90%; object-fit: contain; margin: 18.5; margin-bottom: 10px; height: 270px;" alt="' . $hot_render["productTitle"] . '" src="' . $hot_render["productImage"] . '"><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><a id="' . $row->_id . '" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Rubik, sans-serif; color: #515151; font-size: 14px;">' . $row->productTitle . '</a></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><span class="mt-auto" id="productSellPrice_' . $row->_id . '" style="width: 100%;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858; font-size: 12px;"><input type="text" id="productDiscountprice_' . $row->_id . '" name="productDiscountprice" style="border: 0; outline: 0; text-align: center; width: 55%; background-color: #fff; height: auto; font-weight: bold; font-size: 15px; font-family: Rubik, sans-serif; color: #585858;" value="&#8377; ' . $row->productSellPrice . '  (' . $row->productUnit . ')" readonly /></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><input type="number" id="quantity_' . $row->_id . '" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><input  type="submit" class="btn btn-primary cartbtn" name="addtocartbtn" id="' . $row->_id . '" style="margin-top: -7px; background-color: #e31837; font-family: Rubik, sans-serif; font-size: 14px; text-shadow: none; padding: 9px 10px 5px 10px; font-weight: 500; transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s; border: none; height: 40px; text-transform: uppercase; border-bottom: 3px rgba(0,0,0,0.1) solid; margin-left: 1px; color : #ffffff;" value="ADD TO CART" /></li></ul></center></div>';
                                                    echo $data;

                                                }
                                            }
                                    }
                                    $row_count = $row_count + 1;
                                    break;
                                }
                            }
?>
                     </div>
                     <div class="slider-items slider-width-col4 products-grid block-content">
                        <!-- Item -->
                        <?php
$query = new MongoDB\Driver\Query(['ProductCategory' => 'DRY-FRUITS']);
$rows = $manager->executeQuery($Mongo_database . ".products", $query);
$row_counts = 0;
foreach ($rows as $row)
{
    $hot_render = objectToArray($row);
    if (fileExists($row->productImage) && $hot_render['productSellPrice'] > 200)
    {
        if ($row_counts < 7)
        {   
            $cpin = 'C' . $_SESSION['pincode'];
            $apin = 'A' . $_SESSION['pincode'];
                if ($row->$cpin === 'TRUE')
                {
                    if ($row->$apin !== 'null')
                    {
                        $data = '<div class="item">
                        <div class="item-inner">
                        <div class="item-img">
                           <div class="item-img-info">
                              <a class="product-image" title="' . $hot_render["productTitle"] . '" > <img style="width: 80%;"alt="' . $hot_render["productTitle"] . '" src="' . $hot_render["productImage"] . '"> </a>
                              <div class="new-label new-top-right">new</div>
                           </div>
                        </div>
                        <div class="item-info">
                           <div class="info-inner">
                              <div class="item-title"> <a title="' . $hot_render["productTitle"] . '" > ' . $hot_render["productTitle"] . ' </a> </div>
                              <div class="rating">
                                 <div class="ratings">
                                    <div class="rating-box">
                                       <div style="width:80%" class="rating"></div>
                                    </div>
                                    <p class="rating-links"> <a>1 Review(s)</a> <span class="separator">|</span> <a >Add Review</a> </p>
                                 </div>
                              </div>
                              <div class="item-content">
                                 <div class="item-price">
                                    <div class="price-box"> <span class="regular-price"> <span class="price">&#8377; ' . $hot_render[$apin] . '</span> </span> </div>
                                 </div>
                                 <div class="action">
                                    <button id="' . $hot_render["_id"]["oid"] . '_PN_' . $hot_render["productTitle"] . '_PRICE_' . $hot_render[$apin] . '" class="button btn-cart cartbtnsingle" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span> </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        </div>
                        </div>';
                        echo $data;
                    }else{

                        $data = '<div class="item">
                        <div class="item-inner">
                        <div class="item-img">
                           <div class="item-img-info">
                              <a class="product-image" title="' . $hot_render["productTitle"] . '" > <img style="width: 80%;"alt="' . $hot_render["productTitle"] . '" src="' . $hot_render["productImage"] . '"> </a>
                              <div class="new-label new-top-right">new</div>
                           </div>
                        </div>
                        <div class="item-info">
                           <div class="info-inner">
                              <div class="item-title"> <a title="' . $hot_render["productTitle"] . '" > ' . $hot_render["productTitle"] . ' </a> </div>
                              <div class="rating">
                                 <div class="ratings">
                                    <div class="rating-box">
                                       <div style="width:80%" class="rating"></div>
                                    </div>
                                    <p class="rating-links"> <a>1 Review(s)</a> <span class="separator">|</span> <a >Add Review</a> </p>
                                 </div>
                              </div>
                              <div class="item-content">
                                 <div class="item-price">
                                    <div class="price-box"> <span class="regular-price"> <span class="price">&#8377; ' . $hot_render["productSellPrice"] . '</span> </span> </div>
                                 </div>
                                 <div class="action">
                                    <button id="' . $hot_render["_id"]["oid"] . '_PN_' . $hot_render["productTitle"] . '_PRICE_' . $hot_render["productSellPrice"] . '" class="button btn-cart cartbtnsingle" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span> </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        </div>
                        </div>';
                        echo $data;

                    }
                }
        }
        $row_counts = $row_counts + 1;
    }
}
?>                          
                        <!-- End Item --> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End featured Slider -->
      <!-- our features -->
      <div class="our-features-box">
         <div class="container">
            <ul>
               <li>
                  <div class="feature-box free-shipping">
                     <div class="icon-truck"></div>
                     <div class="content">FREE SHIPPING on order over 150</div>
                  </div>
               </li>
               <li>
                  <div class="feature-box need-help">
                     <div class="icon-support"></div>
                     <div class="content">Need Help +91 966 592 3802</div>
                  </div>
               </li>
               <li>
                  <div class="feature-box money-back">
                     <div class="icon-money"></div>
                     <div class="content">Money Back Guarantee</div>
                  </div>
               </li>
               <li class="last">
                  <div class="feature-box return-policy">
                     <div class="icon-return"></div>
                     <div class="content">10 days return Service</div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
      <!-- Brand Logo -->
      <div class="brand-logo">
         <div class="container">
            <div class="slider-items-products">
               <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col6">
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/amul.svg" alt="Amul"> </a> </div>
                     <!-- End Item --> 
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/dettol.svg" alt="Dettol"> </a> </div>
                     <!-- End Item --> 
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/pepsi.svg" alt="Pepsi"> </a> </div>
                     <!-- End Item --> 
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/loreal.svg" alt="Loreal"> </a> </div>
                     <!-- End Item --> 
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/patanjali.svg" alt="Patanjali"> </a> </div>
                     <!-- End Item --> 
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/himalya.svg" alt="himalaya"> </a> </div>
                     <!-- End Item --> 
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/nestle.svg" alt="Nestle"> </a> </div>
                     <!-- End Item --> 
                     <!-- Item -->
                     <div class="item"> <a href="#"><img style="width: 130px; height: 100px;" src="images/dabur.svg" alt="Dabur"> </a> </div>
                     <!-- End Item --> 
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer -->
      <footer>
         <div class="newsletter-block">
            <div class="container">
               <div class="newsletter-wrap">
                  <h2 style="font-family: 'Pacifico', cursive; font-weight: 500; color: #FFFFFF; ">One stop destination for all your daily needs.</h2>
                  <!-- <form id="newsletter-validate-detail" method="post"> -->
                  <!--                      <div id="container_form_news">
                     <div id="container_form_news2">
                        <button class="button subscribe" onclick="Joinus()" title="Subscribe" type="submit" id="subscribebtn" style="margin-left: 10px;"><span>Subscribe</span> </button>
                     </div>
                     </div>
                     -->                     <!-- </form> -->
               </div>
            </div>
         </div>
         <div class="footer-inner">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-8">
                     <div class="footer-column pull-left">
                        <h4>My Account</h4>
                        <ul class="links">
                           <!-- <li class="first"><a title="Login" href="profile_page.php">Account</a> </li> -->
                           <!-- <li><a title="About us" href="about_us.php">About us</a> </li> -->
                           <li><a title="Wishlist" href="shopping_cart.php">View Cart</a> </li>
                           <li><a title="Checkout" href="checkout.php">Checkout</a> </li>
                           <!-- <li><a title="FAQs" href="faq.php">FAQs</a> </li> -->
                           <!-- <li class="last"><a title="Contact Us" href="contact_us.php">Contact Us</a> </li> -->
                        </ul>
                     </div>
                     <div class="footer-column pull-left">
                        <h4>My Details</h4>
                        <ul class="links">
                           <li class="first"><a title="Your Account" href="profile_page.php">Your Account</a> </li>
                           <!-- <li><a title="Information" href="#">Information</a> </li> -->
                           <li><a title="Addresses" href="profile_page.php">Addresses</a> </li>
                           <!-- <li><a title="Addresses" href="#">Discount</a> </li> -->
                           <!-- <li><a title="Orders History" href="#">Orders History</a> </li> -->
                           <!-- <li class="last"><a title=" Additional Information" href="#">Additional Information</a> </li> -->
                        </ul>
                     </div>
                  </div>
                  <div class="col-xs-12 col-lg-4">
                     <div class="footer-column-last">
                        <div class="social">
                           <h4>Follow Us</h4>
                           <ul class="link">
                              <li class="fb pull-left"> <a href="https://www.facebook.com/thedailyfreshstore/"></a> </li>
                           </ul>
                        </div>
                        <div class="payment-accept">
                           <h4>Payment Option</h4>
                           <div><img src="images/payment-1.png" alt="payment1"> <img src="images/payment-2.png" alt="payment2"> <img src="images/payment-3.png" alt="payment3"> <img src="images/payment-4.png" alt="payment4"> </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-middle">
            <div class="container">
               <div class="row" style="margin: 0px;">
                  <address>
                     <div style="text-align:center"> <a href="index.php"><img src="images/log.png" style="margin: 0; width: 20%;" alt="thedailyfreshstore"> </a> </div>
                     <i class="fa fa-map-marker"></i> Sagar, Madhya Pradesh <i class="fa fa-mobile"></i><span> +91 966 592 3802</span> <i class="fa fa-envelope"></i><span> info@thedailyfreshstore.com</span>
                  </address>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-sm-5 col-xs-12 coppyright">© 2020 Brilliant Infotech. All Rights Reserved.</div>
               </div>
            </div>
         </div>
      </footer>
      </div>
      <!-- End Footer --> 
      <!-- mobile menu -->
      <div id="mobile-menu">
         <ul>
            <li>
               <div class="mm-search">
                  <div class="input-group">
                     <div class="input-group-btn">
                        <a class="btn btn-default mobilesearchbtn" type="submit" style="background-color: #e31837; color: #FFF; padding: auto; "><i class="fa fa-search"></i> </a>
                     </div>
                     <input type="text" class="form-control mobilesearchtext" placeholder="Search ..." name="srch-term" id="srch-term" style="width: 80%;">
                  </div>
               </div>
            </li>
            <li>
               <!-- =(H3&"."&I3&"@"&D3) -->
               <a> <span>Fruits & Vegetables</span> </a>
               <ul>
                  <li><a href="grid.php?get_product=Fruits"><span>Fruits</span></a> </li>
                  <li><a href="grid.php?get_product=Vegetables"> <span>vegetables</span> </a> </li>
               </ul>
            </li>
            <li>
               <a> <span>Grocery</span> </a>
               <ul>
                  <li><a href="grid.php?get_product=Dry-Fruits"><span>Dry Fruits</span></a> </li>
                  <li><a href="grid.php?get_product=Edible-Oils-Ghee"><span>Edible Oils & Ghee</span></a> </li>
                  <li><a href="grid.php?get_product=Flours"><span>Flours</span></a> </li>
                  <li><a href="grid.php?get_product=Pulses"><span>Pulses</span></a> </li>
                  <li><a href="grid.php?get_product=Rice-Variants"><span>Rice Variants</span></a> </li>
                  <li><a href="grid.php?get_product=Salt-Sugar"><span>Salt & Sugar</span></a> </li>
                  <li><a href="grid.php?get_product=Spices"><span>Spices</span></a> </li>
                  <li><a href="grid.php?get_product=Peanuts-Others"><span>Peanuts & Others</span></a> </li>
               </ul>
            </li>
            <!-- Household -->
            <li >
               <a> <span>Household</span> </a>
               <ul>
                  <li><a href="grid.php?get_product=Air-Freshner"><span>Air Freshner</span></a></li>
                  <li><a href="grid.php?get_product=Cleaning-Accessories"><span>Cleaning Accessories</span></a></li>
                  <li><a href="grid.php?get_product=Detergents-Bars"><span>Detergent & Bars</span></a></li>
                  <li><a href="grid.php?get_product=Dish-Washing"><span>Dish Washing</span></a></li>
                  <li><a href="grid.php?get_product=Pet-Care"><span>Pet Care</span></a></li>
                  <li><a href="grid.php?get_product=Puja-Items"><span>Puja Items</span></a></li>
                  <li><a href="grid.php?get_product=Shoe-Care"><span>Shoe Care</span></a></li>
                  <li><a href="grid.php?get_product=Toilet-Floor-Other-Cleaners"><span>Toilet, Floor & Other Cleaners</span></a></li>
                  <li><a href="grid.php?get_product=Repellents"><span>Repellents</span></a></li>
               </ul>
            </li>
            <!-- beverages -->
            <li >
               <a> <span>Beverages</span> </a>
               <ul>
                  <li><a href="grid.php?get_product=Tea-coffee"><span>Tea</span></a></li>
                  <li><a href="grid.php?get_product=Energy-Soft-Drinks"><span>Energy & Soft Drinks</span></a></li>
                  <li><a href="grid.php?get_product=Water"><span>Water</span></a></li>
                  <li><a href="grid.php?get_product=Coffee"><span>Coffee</span></a></li>
                  <li><a href="grid.php?get_product=Fruit-Drinks-Juices"><span>Fruit Juices & Drinks</span></a></li>
                  <li><a href="grid.php?get_product=Energy-Health-Drinks"><span>Health Drink & Supplements</span></a></li>
               </ul>
            </li>
            <!-- personal care -->
            <li >
               <a href="grid.php?get_product=PersonalCare"> <span>Personal Care</span> </a>
               <ul >
                  <li><a href="grid.php?get_product=Baby-Care"><span>Baby Care</span></a></li>
                  <li><a href="grid.php?get_product=Cosmetics"><span>Cosmetics</span></a></li>
                  <li><a href="grid.php?get_product=Deo-Perfumes"><span>Deo & Perfumes</span></a></li>
                  <li><a href="grid.php?get_product=Hair-Care"><span>Hair Care</span></a></li>
                  <li><a href="grid.php?get_product=Health-Care"><span>Health Care</span></a></li>
                  <li><a href="grid.php?get_product=Oral-Care"><span>Oral Care</span></a></li>
                  <li><a href="grid.php?get_product=Personal-Hygenics"><span>Personal Hygenics</span></a></li>
                  <li><a href="grid.php?get_product=Bath-Handwash"><span>Bath & Handwash</span></a></li>
                  <li><a href="grid.php?get_product=Skin-Care"><span>Skin Care</span></a></li>
                  <li><a href="grid.php?get_product=Personal-Care-Others"><span>Others</span></a></li>
               </ul>
            </li>
            <!-- Dairy and Bread -->
            <li>
               <a href="grid.php?get_product=Dairy"> <span>Dairy & Bread</span> </a>
               <ul>
                  <li><a href="grid.php?get_product=Bread-Bakery"><span>Bread & Bakery</span></a></li>
                  <li><a href="grid.php?get_product=Khari-Cookies"><span>Khari & Cookies</span></a></li>
                  <li><a href="grid.php?get_product=Milk"><span>Milk</span></a></li>
                  <li><a href="grid.php?get_product=Butter-Cheese-Yogurt"><span>Butter, Cheese & Yogurt</span></a></li>
               </ul>
            </li>
            <!-- brand foods -->
            <li>
               <a href="grid.php?get_product=BrandedFoods"> <span>Branded Foods</span> </a>
               <ul>
                  <li><a href="grid.php?get_product=Chocolates-Sweets"><span>Chocolates & Sweets</span></a></li>
                  <li><a href="grid.php?get_product=Indian-Sweets"><span>Indian Sweets</span></a></li>
                  <li><a href="grid.php?get_product=Jams-Spreads"><span>Jams & Spreads</span></a></li>
                  <li><a href="grid.php?get_product=Namkeen"><span>Namkeen</span></a></li>
                  <li><a href="grid.php?get_product=Biscuits"><span>Biscuits</span></a></li>
                  <li><a href="grid.php?get_product=Noodles-Macroni-Pasta"><span>Noodles Macroni & Pasta</span></a></li>
                  <li><a href="grid.php?get_product=Pickles"><span>Pickles</span></a></li>
                  <li><a href="grid.php?get_product=Sauces-Ketchup"><span>Sauces & Ketchup</span></a></li>
                  <li><a href="grid.php?get_product=Veg-Snacks"><span>Veg Snacks</span></a></li>
               </ul>
            </li>
         </ul>

         <!--nav--> 
      </div>
      </div>
      <!-- JavaScript --> 
      <script type="text/javascript">
         function Joinus() {
           var myWindow = window.open("https://localhost/fresh/joinus.php", "Joinus", "width=400,height=600,location=no,menubar=no,resizeable=no,resizable=no,scrollbars=no,status=no,toolbar=no");
         }
         
      </script>
      <!-- JavaScript --> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/revslider.js"></script> 
      <script src="js/common.js"></script> 
      <script src="js/owl.carousel.min.js"></script> 
      <script src="js/jquery.mobile-menu.min.js"></script> 
      <script src="js/countdown.js"></script> 
      <script>
         jQuery(document).ready(function() {
          jQuery('#rev_slider_4').show().revolution({
          dottedOverlay: 'none',
          delay: 5000,
          startwidth: 915,
          startheight: 440,
          hideThumbs: 200,
          thumbWidth: 200,
          thumbHeight: 50,
          thumbAmount: 2,
          navigationType: 'thumb',
          navigationArrows: 'solo',
          navigationStyle: 'round',
          touchenabled: 'on',
          onHoverStop: 'on',
          swipe_velocity: 0.7,
          swipe_min_touches: 1,
          swipe_max_touches: 1,
          drag_block_vertical: false,
          spinner: 'spinner0',
          keyboardNavigation: 'off',
          navigationHAlign: 'center',
          navigationVAlign: 'bottom',
          navigationHOffset: 0,
          navigationVOffset: 20,
          soloArrowLeftHalign: 'left',
          soloArrowLeftValign: 'center',
          soloArrowLeftHOffset: 20,
          soloArrowLeftVOffset: 0,
          soloArrowRightHalign: 'right',
          soloArrowRightValign: 'center',
          soloArrowRightHOffset: 20,
          soloArrowRightVOffset: 0,
          shadow: 0,
          fullWidth: 'on',
          fullScreen: 'off',
          stopLoop: 'off',
          stopAfterLoops: -1,
          stopAtSlide: -1,
          shuffle: 'off',
          autoHeight: 'off',
          forceFullWidth: 'on',
          fullScreenAlignForce: 'off',
          minFullScreenHeight: 0,
          hideNavDelayOnMobile: 1500,
          hideThumbsOnMobile: 'off',
          hideBulletsOnMobile: 'off',
          hideArrowsOnMobile: 'off',
          hideThumbsUnderResolution: 0,
          hideSliderAtLimit: 0,
          hideCaptionAtLimit: 0,
          hideAllCaptionAtLilmit: 0,
          startWithSlide: 0,
          fullScreenOffsetContainer: ''
         });
         });
      </script> 
      <!-- Hot Deals Timer 1--> 
      <script type="text/javascript">
         // add to cart
         function load_minicart(){
         $.ajax({
         url:"loadcart.php",
         method:"POST",
         success:function(data)
         {
         $('.mini-cart').html(data);
         }
         });
         }

         // $(document).ready(function(){

         // load_product();
          
         // function load_product()
         // {
         //  $.ajax({
         //    url:"searchgridshow.php",
         //    method:"POST",
         //    success:function(data)
         //    {
         //      $('#shows').html(data);
         //    }
         //  });
         // }
         // });

         $(document).on('click', '.cartbtn', function(){
         var numb = <?php echo $_SESSION['wpnumb']; ?>;
         var product_id = $(this).attr("id");
         var product_name = $('#productTitle_'+product_id+'').val();
         var product_price = $('#productDiscountprice_'+product_id+'').val();
         var pq = $('#quantity_'+product_id+'').val();
         var product_quantity = parseInt(pq);
         var action = "add";
         if(product_quantity > 0)
         {
         $.ajax({
         url:"ajax_addtocart.php",
         method:"POST",
         data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
         success:function(data)
         {
            alertify.set('notifier','position', 'bottom-left');
            alertify.success('Added to cart!', 1);

            load_minicart();
         }
         });
         }
         else
         {
            alertify.set('notifier','position', 'top-center');
            alertify.warning('Please enter number of quantity!', 1);
         }
         });
         
         
         
         $(document).on('click', '.cartbtnsingle', function(){
         var numb = <?php echo $_SESSION['wpnumb']; ?>;
         var pid = $(this).attr("id");
         
         var product_id = pid.split('_PN_')[0];
         
         var pn = pid.split('_PN_')[1];
         
         var prodname = pn.split('_PRICE_')[0];
         
         var product_name = prodname;
         
         var pp = pid.split('_PRICE_')[1];
         
         var product_price = parseInt(pp);
         
         var product_quantity = '1';
         
         var action = "add";
         
         $.ajax({
         url:"ajax_addtocart.php",
         method:"POST",
         data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
         success:function(data)
         {

            alertify.set('notifier','position', 'bottom-left');
            alertify.success('Added to cart!', 1);

            load_minicart();
         }
         });
         });
         

         $(document).on('click', '.cartbtnpd', function(){
         var numb = <?php echo $_SESSION['wpnumb']; ?>;
         var pid = $(this).attr("id");
         
         var product_id = pid.split('_PN_')[0];
         
         var pn = pid.split('_PN_')[1];
         
         var prodname = pn.split('_PRICE_')[0];
         
         var product_name = prodname;
         
         var pp = pid.split('_PRICE_')[1];
         
         var product_price = parseInt(pp);
         
         var product_quantity = '1';
         
         var action = "add";
         
         $.ajax({
         url:"ajax_addtocart.php",
         method:"POST",
         data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
         success:function(data)
         {

            alertify.set('notifier','position', 'bottom-left');
            alertify.success('Added to cart!', 1);

            load_minicart();
         }
         });
         });

         
         $(document).on('click', '.btn-remove1', function(){
            $.ajax({
               url:"ajax_removefromcart.php",
               method:"POST",
               data:{globalProdId:globalProdId},
               success:function(data)
               {
                  load_minicart();
               }
            });
         });

         
         // Fetching Product Details page using ajax

        $(document).on('click', '.productTitle', function(){
            var product_id = $(this).attr("id");

            $.ajax({
               url:"product_detail.php",
               method:"POST",
               data:{product_id:product_id},
               success:function(data){
                  $('.content-page div').html('');
                  $('.featured-pro div').html('');
                  $('#page').html(data);
                 document.body.scrollTop = 0; // For Safari
                 document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                   // return false;
               }
            });
         });


        $(document).on('click', '.seobutton', function(){
            
            var searchseo = $('.seosearch').val();

            $(".thm-slideshow").remove();
            $("#shows").html('');
            $(".featured-block").remove();
            $(".navbar-nav").remove();
            $.ajax({
               url:"searchgridshow.php",
               method:"POST",
               data:{searchseo:searchseo},
               success:function(data){
                  $('#shows').html(data);
               }
            });
         });

         $(".seosearch").on('keyup', function (e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
               
               var searchseo = $('.seosearch').val();

               $(".thm-slideshow").remove();
               $("#shows").html('');
               $(".featured-block").remove();
               $(".navbar-nav").remove();
               $.ajax({
                  url:"searchgridshow.php",
                  method:"POST",
                  data:{searchseo:searchseo},
                  success:function(data){
                     $('#shows').html(data);
                  }
               });

            }
         });

  $(document).on('click', '.mobilesearchbtn', function(){
      
      var searchseo = $('.mobilesearchtext').val();

      $(".thm-slideshow").remove();
      $("#shows").html('');
      $(".featured-block").remove();
      $(".navbar-nav").remove();
      $.ajax({
         url:"searchgridshow.php",
         method:"POST",
         data:{searchseo:searchseo},
         success:function(data){
            $('#shows').html(data);
         }
      });
   });

   $(".mobilesearchtext").on('keyup', function (e) {
      if (e.key === 'Enter' || e.keyCode === 13) {
         
         var searchseo = $('.mobilesearchtext').val();

         $(".thm-slideshow").remove();
         $("#shows").html('');
         $(".featured-block").remove();
         $(".navbar-nav").remove();
         $.ajax({
            url:"searchgridshow.php",
            method:"POST",
            data:{searchseo:searchseo},
            success:function(data){
               $('#shows').html(data);
            }
         });

      }
   });


      </script>

   </body>
</html>
