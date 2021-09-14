<?php require_once('Mongo_config.php'); ?><?php 

session_start();
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

$_SESSION['wpnumb'];
$_SESSION['tokenid'] = $_SESSION['token-id_s'];

// Store the cipher method 
$ciphering = "AES-128-CTR"; 

// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121'; 
  
// Store the decryption key 
$decryption_key = "DailyFreshTeam"; 

// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 

// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($_SESSION['tokenid'], $ciphering,  
        $decryption_key, $options, $decryption_iv); 


$query = new MongoDB\Driver\Query(['_id'=>new MongoDB\BSON\ObjectID($decryption)]); 
$rows = $manager->executeQuery($Mongo_database.".managedcart", $query);
$row_count = 0;

foreach ($rows as $row) {
   
   $managed_render = objectToArray($row);
   
   if($managed_render['status'] == "ToBeReviewed" || $managed_render['status'] == "Reviewed"){

      $totalAmount = $managed_render['totalAmount'];
      $cart = $managed_render['cart'];
      $orderNum = $managed_render['orderNum'];   

      $firstName = $managed_render['firstName'];
      $postcode = $managed_render['postcode'];
   	
   }

}	
	
	// echo $totalAmount."<br>";
	// echo count($cart)."<br>";
	// echo $orderNum;

	$created = date("Y-m-d::H:i:s");
	$insRec = new MongoDB\Driver\BulkWrite;
	
	$insRec->update(['_id'=>new MongoDB\BSON\ObjectID($decryption)],['$set' =>[
	'status'=>'Ordered',
	'deliveryCharges'=>0,
	'lastModifiedDate'=>$created,
	'orderType'=>'COD',
	]], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

	$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);
?>

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
      <title>thedailyfreshstore | COD</title>
      <!-- Mobile Specific -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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
         #image-view {
         height: 250px;
         margin: 0px;
         background-size: contain;
         background-position: top center;
         background-repeat: no-repeat;
         width: 250px;
         }
         #image-view:before {
         position: absolute;
         left: 0;
         bottom: 0;
         height: 1px;
         width: 50%;
         border-bottom: 1px solid magenta;
         }
         #pcontainer{
         position: all;
         }
      </style>
   </head>
   <body class="shopping-cart-page">
      <!-- Header -->
      <header>
         <div class="header-container">
            <div class="header-top">
               <div class="container">
                  <div class="row">
                     <!-- Header Language -->
                     <div class="col-xs-12 col-sm-6">
                        <!-- End Header Currency -->
                        <div class="welcome-msg"><i class="fa fa-envelope"></i> info@thedailyfreshstore.com | +91 966 592 3802</div>
                     </div>
                     <div class="col-xs-6 hidden-xs">
                        <!-- Header Top Links -->
                        <div class="toplinks">
                           <div class="links">
                              <div class="check"><a title="Checkout"><span class="hidden-xs" style="font-size: 14px;"><?php echo $_SESSION['user_name']; ?></span></a> </div>
                              <div class="check"><a title="Checkout" href="checkout.php"><span class="hidden-xs">Checkout</span></a> </div>
                              <div class="check"><a title="Checkout" href="checkout.php"><span class="hidden-xs">Logout</span></a> </div>
                           </div>
                        </div>
                        <!-- End Header Top Links --> 
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-row" style="">
               <div class="col">
                  <a title="thedailyfreshstore" href="index.php"><img src="images/log.png" style="margin-left: 1%; margin-top: -5%;width: 20%;" alt="thedailyfreshstore"></a>
                  <!-- <div style="color: white; float: right; width: 50%; margin-top: 2%;"><input type="text"style="border: 2px solid white; border-radius: 20px; width: 60%; color: white;" placeholder="Search entire store here..." value="Search entire store here..." maxlength="25" name="search" id="search"><button class="btn-lg" style="height: 40px; margin-top: 25px; margin-left: -50px; background-color: transparent; color: white;" type="button"><span class="glyphicon glyphicon-search"></span></button></div> -->
               </div>
               <!--                   <div class="col float-right">
                  <input style="border: 2px solid white; border-radius: 20px; margin-top: 25px; width: 100%; color: #fff;" type="text" placeholder="Search entire store here..." maxlength="25" name="search" id="search"><button class="btn-lg" style="height: 40px; margin-top: 25px; margin-left: -50px; background-color: transparent; color: white;" type="button"><span class="glyphicon glyphicon-search"></span></button>
                  </div> -->
            </div>
         </div>
      </header>
         <nav>
            <div class="container" style="width: 100%;">
               <div class="mm-toggle-wrap">
                  <div class="mm-toggle"><i style="font-size:24px;" class="fa">&#xf039;</i><span class="mm-label">Menu</span></div>
               </div>
               <div class="nav-inner">
                  <!-- BEGIN NAV -->
                  <ul id="nav" class="hidden-xs">
                     <li class="level0 parent drop-menu" id="nav-home"><a href="index.php" class="level-top"><i class="fa fa-home"></i><span class="hidden">Home</span></a></li>

                     <li class="mega-menu">
                        <a class="level-top"><span>Fruits & Vegetables</span></a>
                        <div class="level0-wrapper dropdown-6col">
                           <div class="container">
                              <div class="level0-wrapper2">
                                 <div class="nav-block nav-block-center">
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <div class="level3 nav-6-1 parent item" style="padding-top: 20px; padding-bottom: 20px; background-color: white; width: 100%;"><a href="grid.php?get_product=Fruits"><span>FRUITS</span></a></div>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=Pomes"><span>Pomes</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=pomes" id="imgfruit"><img src="images/f1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=Drupes"><span>Drupes</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=drupes" id="imgfruit"><img src="images/f2.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=Berries"><span>Berries</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="subgrid.php?get_product=berries" id="imgfruit"><img src="images/f3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=Melons"><span>Melons</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=melons" id="imgfruit"><img src="images/f4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=Citrus"><span>Citrus</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=citrus" id="imgfruit"><img src="images/f5.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=Tropical"><span>Tropical</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=tropical" id="imgfruit"><img src="images/f6.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=Stone-Fruit"><span>Stone Fruit</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=Stone-Fruit" id="imgfruit"><img src="images/sf.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <!--vegetables--> 
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <div class="level3 nav-6-1 parent item" style="padding-top: 20px; padding-bottom: 20px; background-color: white; width: 100%;"><a href="grid.php?get_product=Vegetables"><span>VEGETABLES</span></a></div>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=brassica"><span>Brassica</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=brassica" id="imgfruit"><img src="images/v1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=fruit-vegetables"><span>Fruit Vegetables</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=fruit-vegetables" id="imgfruit"><img src="images/v2.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=gourds-squashes"><span>Gourds & Squashes</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="subgrid.php?get_product=gourds-squashes" id="imgfruit"><img src="images/v3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=greens"><span>Greens</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=greens" id="imgfruit"><img src="images/v4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=fungus"><span>Fungus</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=fungus" id="imgfruit"><img src="images/v5.jpeg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=roots-tubers"><span>Roots & Tubers</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=roots-tubers" id="imgfruit"><img src="images/v6.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=pods-seeds"><span>Pods & Seeds</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=pods-seeds" id="imgfruit"><img src="images/v7.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="subgrid.php?get_product=stems"><span>Stems</span></a>
                                          <ul style="width: auto; height: auto;">
                                             <li class="push_img" > <a href="subgrid.php?get_product=stems" id="imgfruit"><img src="images/v8.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                                 <!--nav-block nav-block-center--> 
                                 <!--nav-block nav-block-center-->
                              </div>
                              <!--level0-wrapper2--> 
                           </div>
                           <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                     </li>
                     <!-- Grocery and Staples -->
                     <li class="mega-menu">
                        <a class="level-top"><span>Grocery</span></a>
                        <div class="level0-wrapper dropdown-6col">
                           <div class="container">
                              <div class="level0-wrapper2">
                                 <div class="nav-block nav-block-center">
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Dry-Fruits"><span>Dry Fruits</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=almonds"><span>Almonds</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=cashew"><span>Cashew</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=nuts"><span>Nuts</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=dry-fruits" ><img src="images/grocery1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Edible-Oils-Ghee"><span>Edible Oils & Ghee</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=vegetable-oils"><span>Vegetable Oils</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Sunflower-oils"><span>Sunflower Oils</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=ghee"><span>Ghee</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=other-refined"><span>Others</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Edible-Oils-Ghee" id="groceryimg" ><img src="images/grocery2.png" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Flours"><span>Flours</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Wheat-flours"><span>Wheat Flours</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=maida-flours"><span>Maida Flours</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=other-flours"><span>Other Flours</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Flours" id="groceryimg" ><img src="images/grocery3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Pulses"><span>Pulses</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=beans"><span>Beans</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=dals"><span>Dals</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=other-pulses"><span>Others</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Pulses" id="groceryimg" ><img src="images/grocery4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Rice-Variants"><span>Rice Variants</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=rice"><span>Rice</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Basmati-rice"><span>Basmati Rice</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Brown-rice"><span>Brown Rice</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Rice-Variants" id="groceryimg" ><img src="images/grocery5.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Salt-Sugar"><span>Salt & Sugar</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=salt"><span>Salt</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=sugar"><span>Sugar</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=salt-sugar-others"><span>Other</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Salt-Sugar" id="groceryimg" ><img src="images/grocery6.png" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Spices"><span>Spices</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Indian-spices"><span>Indian Spices</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=other-spices"><span>Other</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a><span></span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Spices" id="groceryimg" ><img src="images/grocery7.gif" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Peanuts-Others"><span>Peanuts & Others</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=peanuts"><span>Peanuts</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=other-peanuts"><span>Others</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a><span></span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Peanuts-Others" id="groceryimg" ><img src="images/pns.png" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>

                                    </ul>
                                    <!--level0--> 
                                 </div>
                                 <!--nav-block nav-block-center--> 
                                 <!--nav-block nav-block-center-->
                              </div>
                              <!--level0-wrapper2--> 
                           </div>
                           <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                     </li>

                     <li class="mega-menu">
                        <a class="level-top"><span>Household</span></a>
                        <div class="level0-wrapper dropdown-6col">
                           <div class="container">
                              <div class="level0-wrapper2">
                                 <div class="nav-block nav-block-center">
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Air-Freshner"><span>Air Freshner</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Air-Freshner" id="groceryimg" ><img src="images/household1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Cleaning-Accessories"><span>Cleaning Accessories</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Cleaning-Accessories" id="groceryimg" ><img src="images/household2.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Detergents-Bars"><span>Detergent & Bars</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Detergents-Bars" id="groceryimg" ><img src="images/household3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Dish-Washing"><span>Dish Washing</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Dish-Washing" id="groceryimg" ><img src="images/household4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Pet-Care"><span>Pet Care</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Pet-Care" id="groceryimg" ><img src="images/household5.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Puja-Items"><span>Puja Items</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Puja-Items" id="groceryimg" ><img src="images/household6.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Shoe-Care"><span>Shoe Care</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Shoe-Care" id="groceryimg" ><img src="images/household7.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Toilet-Floor-Other-Cleaners"><span>Toilet, Floor & Other Cleaners</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Toilet-Floor-Other-Cleaners" id="groceryimg" ><img src="images/household8.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Repellents"><span>Repellents</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Repellents" id="groceryimg" ><img src="images/household9.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <!--level0--> 
                                 </div>
                                 <!--nav-block nav-block-center--> 
                                 <!--nav-block nav-block-center-->
                              </div>
                              <!--level0-wrapper2--> 
                           </div>
                           <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                     </li>
                     <!-- beverages -->
                     <!-- Grocery and Staples -->
                     <li class="mega-menu">
                        <a class="level-top"><span>Beverages</span></a>
                        <div class="level0-wrapper dropdown-6col">
                           <div class="container">
                              <div class="level0-wrapper2">
                                 <div class="nav-block nav-block-center">
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Tea-coffee"><span>Tea</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=leaf-dust"><span>Leaf & Dust</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=tea-bags"><span>Tea Bags</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=exotic-flavoured-tea"><span>Exotic & Flavoured Tea</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=green-tea"><span>Green Tea</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Tea-coffee" id="groceryimg" ><img src="images/beverages1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Energy-Soft-Drinks"><span>Energy & Soft Drinks</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=cold-drinks"><span>Cold Drinks</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=non-alcoholic-drinks"><span>Non Alcoholic Drinks</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=soda-cocktails"><span>Soda & Cocktails</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=soft-drinks"><span>Soft Drinks</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=sports-energy-drinks"><span>Sports & Energy Drinks</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Energy-Soft-Drinks" id="groceryimg" ><img src="images/beverages2.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Water"><span>Water</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=packaged"><span>Packaged </span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Flavoured-drink"><span>Flavoured Drink</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Water" id="groceryimg" ><img src="images/beverages3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Coffee"><span>Coffee</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Instant-coffee"><span>Instant Coffee</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Ground-coffee"><span>Ground Coffee</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Coffee" id="groceryimg" ><img src="images/beverages4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Fruit-Drinks-Juices"><span>Fruit Juices & Drinks</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=juices"><span>Juices</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=syrups-concentrates"><span>Syrups & Concentrates</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Fruit-Drinks-Juices" id="groceryimg" ><img src="images/beverages5.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Energy-Health-Drinks"><span>Health Drink & Supplements</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Children-drinks"><span>Children Drinks</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Glucose-drinks"><span>Glucose Drinks</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Energy-Health-Drinks" id="groceryimg" ><img src="images/beverages6.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <!--level0--> 
                                 </div>
                                 <!--nav-block nav-block-center--> 
                                 <!--nav-block nav-block-center-->
                              </div>
                              <!--level0-wrapper2--> 
                           </div>
                           <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                     </li>
                     <!-- personal care -->
                     <!-- Grocery and Staples -->
                     <li class="mega-menu">
                        <a class="level-top"><span>PERSONAL CARE</span></a>
                        <div class="level0-wrapper dropdown-6col">
                           <div class="container">
                              <div class="level0-wrapper2">
                                 <div class="nav-block nav-block-center">
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Baby-Care"><span>Baby Care</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Diapers"><span>Diapers</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Baby-wipes"><span>Baby Wipes</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Nappies-rash-cream"><span>Nappies & Rash Cream</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Baby-foods"><span>Baby Foods</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Baby-Accessories"><span>Baby Accessories</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Baby-Care" id="groceryimg" ><img src="images/care1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Cosmetics"><span>Cosmetics</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Cosmetics" id="groceryimg" ><img src="images/care2.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Deo-Perfumes"><span>Deo & Perfumes</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Attars"><span>Attars</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Mens-Deodrants-Perfumes"><span>Men's Deodrants & Perfumes</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=womens-Deodrants-Perfumes"><span>Women's Deodrants & Perfumes</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Deo-Perfumes" id="groceryimg" ><img src="images/care3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Hair-Care"><span>Hair Care</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=hair-colors"><span>Hair Colors</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=hair-oil"><span>Hair Oil</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=shampoo-serum-conditioners"><span>Shampoo Serum & Conditioners</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=gel-wax-others"><span>Gel, Wax & Others</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=shaving-needs"><span>Shaving Needs</span></a></li>
                                             <li class="push_img"> <a href="grid.php?get_product=Hair-Care" id="groceryimg" ><img src="images/care4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Health-Care"><span>Health Care</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=antiseptic-bandages"><span>Antiseptic & Bandages</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Ayurveda"><span>Ayurveda</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Sexual-wellness"><span>Sexual Wellness</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=suppliments-protiens"><span>Suppliments & Protiens</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Health-Care" id="groceryimg" ><img src="images/care5.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Oral-Care"><span>Oral Care</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=floss-tongue-cleaner"><span>Floss & Tongue Cleaner</span></a></li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=mouth-wash"><span>Mouth Wash</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=tooth-cleaner"><span>Tooth Cleaner</span></a></li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=tooth-paste"><span>Tooth Paste</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Oral-Care" id="groceryimg" ><img src="images/care6.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Personal-Hygenics"><span>Personal Hygenics</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=hair-removal"><span>Hair Removal</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=sanitary-needs"><span>Sanitary Needs</span></a></li>
                                             <li class="push_img"> <a href="grid.php?get_product=Personal-Hygenics" id="groceryimg" ><img src="images/care77.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Bath-Handwash"><span>Bath & Handwash</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=bathing-bars-soap"><span>Bathing Bars & Soap</span></a></li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=body-scrubs"><span>Body Scrubs</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=shower-gels"><span>Shower Gels</span></a></li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=handwash-sanitizers"><span>Handwash & Sanitizers</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Bath-Handwash" id="groceryimg" ><img src="images/care8.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Skin-Care"><span>Skin Care</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Antiseptics"><span>Antiseptics</span></a></li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=body-care-soaps"><span>Body Care & Soaps</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=eye-care"><span>Eye Care</span></a></li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=face-care"><span>Face Care</span></a></li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=lip-care"><span>Lip Care</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Skin-Care" id="groceryimg" ><img src="images/care9.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                        <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Personal-Care-Others"><span>Others</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Personal-Care-Others" id="groceryimg" ><img src="images/balms.png" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <!--level0--> 
                                 </div>
                                 <!--nav-block nav-block-center--> 
                                 <!--nav-block nav-block-center-->
                              </div>
                              <!--level0-wrapper2--> 
                           </div>
                           <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                     </li>
                     <!-- Dairy and Bread -->
                     <!-- Grocery and Staples -->
                     <li class="mega-menu">
                        <a class="level-top"><span>Dairy</span></a>
                        <div class="level0-wrapper dropdown-6col">
                           <div class="container">
                              <div class="level0-wrapper2">
                                 <div class="nav-block nav-block-center">
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Bread-Bakery"><span>Bread & Bakery</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=brown-wheat-multigrain-bread"><span>Brown, Wheat & Multigrain Bread</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=milk-white-sandwich-bread"><span>Milk White Sandwich Bread</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=buns-pavs-pizza"><span>Buns, Pavs & Pizza Base</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Bread-Bakery" id="groceryimg" ><img src="images/dairy1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Khari-Cookies"><span>Khari & Cookies</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=khari-cream-rolls"><span>Khari & Cream Rolls</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=bakery-biscuits-cookies"><span>Bakery Biscuits & Cookies</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=premium-cookies"><span>Premium Cookies</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Rusk"><span>Rusk</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Khari-Cookies" id="groceryimg" ><img src="images/dairy3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Milk"><span>Milk</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=buttermilk-lassi"><span>Buttermilk & Lassi</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Flavoured-milk"><span>Flavoured Milk</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=Milk"><span>Milk</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Milk" id="groceryimg" ><img src="images/dairy2.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Butter-Cheese-Yogurt"><span>Butter, Cheese & Yogurt</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=butter-margarine"><span>Butter & Margarine</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=cheese"><span>Cheese</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=curs"><span>Curd</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=paneer"><span>Paneer</span></a> </li>
                                             <li class="level2 nav-6-1-1"> <a href="subgrid.php?get_product=yogurt-shrikhand"><span>Yogurt & Shrikhand</span></a> </li>
                                             <li class="push_img"> <a href="grid.php?get_product=Butter-Cheese-Yogurt" id="groceryimg" ><img src="images/dairy4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <!--level0--> 
                                 </div>
                                 <!--nav-block nav-block-center--> 
                                 <!--nav-block nav-block-center-->
                              </div>
                              <!--level0-wrapper2--> 
                           </div>
                           <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                     </li>
                     <!-- brand foods -->

                     <li class="mega-menu">
                        <a class="level-top"><span>Branded Foods</span></a>
                        <div class="level0-wrapper dropdown-6col">
                           <div class="container">
                              <div class="level0-wrapper2">
                                 <div class="nav-block nav-block-center">
                                    <!--mega menu-->
                                    <ul class="level0">
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=BreakFast-Cereals"><span>Breakfast Cereals</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=BreakFast-Cereals" id="groceryimg" ><img src="images/bf1.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Chocolates-Sweets"><span>Chocolates & Sweets</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Chocolates-Sweets" id="groceryimg" ><img src="images/bf2.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Indian-Sweets"><span>Indian Sweets</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Indian-Sweets" id="groceryimg" ><img src="images/bf3.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Jams-Spreads"><span>Jams & Spreads</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Jams-Spreads" id="groceryimg" ><img src="images/bf4.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Namkeen"><span>Namkeen</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Namkeen" id="groceryimg" ><img src="images/bf5.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Biscuits"><span>Biscuits</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Biscuits" id="groceryimg" ><img src="images/bis.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Noodles-Macroni-Pasta"><span>Noodles Macroni & Pasta</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Noodles-Macroni-Pasta" id="groceryimg" ><img src="images/bf6.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Pickles"><span>Pickles</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Pickles" id="groceryimg" ><img src="images/bf7.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Sauces-Ketchup"><span>Sauces & Ketchup</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Sauces-Ketchup" id="groceryimg" ><img src="images/bf8.jpeg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                       <li class="level3 nav-6-1 parent item" style="width: auto;">
                                          <a href="grid.php?get_product=Veg-Snacks"><span>Veg Snacks</span></a>
                                          <ul class="level1" style="width: auto; height: auto;">
                                             <li class="push_img"> <a href="grid.php?get_product=Veg-Snacks" id="groceryimg" ><img src="images/bf9.jpg" style="box-shadow: 0 2px 15px -7px #666; width: 150px; height: 100px; box-shadow: 0 2px 15px -7px #666; border: 2px solid white; border-radius: 5px;" alt=""> </a> </li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <!--level0--> 
                                 </div>
                                 <!--nav-block nav-block-center--> 
                                 <!--nav-block nav-block-center-->
                              </div>
                              <!--level0-wrapper2--> 
                           </div>
                           <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                     </li>
                  </ul>
                  <!--nav--> 
                  <!-- main content -->
                  <div class="top-cart-contain pull-right">
                     <!-- Top Cart -->
                     <div class="mini-cart">

                        <!-- call the cart functions here -->

                        <!-- end cart here -->

                     </div>
                     <!-- Top Cart -->
                     <div id="ajaxconfig_info" style="display:none"> <a></a>
                        <input value="" type="hidden">
                        <input id="enable_module" value="1" type="hidden">
                        <input class="effect_to_cart" value="1" type="hidden">
                        <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <!-- end nav --> 
      </header>

      <!-- View Cart Main Section Starts here -->
      <section class="main-container col1-layout">
         <div class="main container">
            <div class="col-main">
               <div class="cart wow bounceInUp animated">
                  <div class="page-title" style="text-align: center;">
                  	<?php if(count($cart) != 0) { ?>
                     <h2>Order placed</h2>
                  	<h4>Total price of <?php echo count($cart); ?> item is : <?php echo $totalAmount; ?></h4>
					<h4>Your order id is : <?php echo $orderNum; ?></h4>
					<br><br>
				<?php }else{ ?>
					 <h2>Order already placed</h2>
				<?php } ?>					
                  </div>
               			<table>
               				<thead>
               					<tbody>
									<tfoot>
										<tr class="first last">
											<td class="a-right last" colspan="50"><button onclick="setLocation('index.php')" class="button btn-continue" title="Continue Shopping" type="button"><span>Continue Shopping</span></button>
										</td>
										</tr>
									</tfoot>
               					</tbody>
               				</thead>
               			</table>
                  <!-- BEGIN CART COLLATERALS -->
                  <div class="cart-collaterals row">
                     <div class="col-sm-4">
                     </div>
                     <div class="col-sm-4">
                     </div>
               
                  </div>
                  <!--cart-collaterals-->

               </div>
               <!-- Modal -->
            
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- View Cart Main Section endsup here -->
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
      <!-- featured category fashion -->
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
      </footer>      </div>
      <!-- End Footer --> 
      <!-- mobile menu -->
      <div id="mobile-menu">
         <ul>
            <li>
               <div class="mm-search">
                  <form id="search1" name="search">
                     <div class="input-group">
                        <div class="input-group-btn">
                           <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                        </div>
                        <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
                     </div>
                  </form>
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

	<?php 

	$obj = array();

	$phone = $_SESSION['wpnumb'];
	$orderText = "backend";
	$totalAmount = 0;
	$cart = $obj;
	$vendor = $obj;
	$orderNum = rand(111, 999);
	$whatsappmessagesId = "manual";
	$orderProductCount = 0;
	$status = "ToBeReviewed";
	$orderComment = "";
	$shippingAddress = "";
	$orderDate = "";
	$deliveryCharges = 0;
	$lastModifiedDate = date("Y-m-d - H:i:s:m");
	$deliveryTime = "";
	$canShareReceipt = "true";

	$insRec = new MongoDB\Driver\BulkWrite;
	$insRec->insert([
	'firstName' => $firstName,
	'phone' => $phone,
	'orderText' => $orderText,
	'postcode' => $postcode,
	'totalAmount' => $totalAmount,
	'cart' => $cart,
	'vendor' => $vendor,
	'orderNum' => $orderNum,
	'whatsappmessagesId' => $whatsappmessagesId,
	'orderProductCount' => $orderProductCount,
	'status' => $status,
	'orderComment' => $orderComment,
	'shippingAddress' => $shippingAddress,
	'orderDate' => $orderDate,
	'deliveryCharges' => $deliveryCharges,
	'lastModifiedDate' => $lastModifiedDate,
	'deliveryTime' => $deliveryTime,
	'canShareReceipt' => $canShareReceipt,
	'orderTransactionID' => '',
	'orderType' => '',
	]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

	$result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);


	$insRec = new MongoDB\Driver\BulkWrite;

	$insRec->update(['phone'=>$phone],['$set' =>[
	'tmpOrderNum'=>$orderNum,
	]], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

	$result = $manager->executeBulkWrite($Mongo_database.'.generateTempCart', $insRec, $writeConcern);


	?>

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
<script>
   var dthen1 = new Date("12/25/17 11:59:00 PM");
    start = "08/04/15 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if (CountStepper > 0)
    ddiff = new Date((dnow1) - (dthen1));
    else
    ddiff = new Date((dthen1) - (dnow1));
    gsecs1 = Math.floor(ddiff.valueOf() / 1000);
    
    var iid1 = "countbox_1";
    CountBack_slider(gsecs1, "countbox_1", 1);
</script>
<!-- calling another file contains products -->
<script>
   $(document).ready(function(){
   
   load_product();
     
   function load_product()
   {
     $.ajax({
       url:"gridshow.php",
       method:"POST",
       success:function(data)
       {
         $('#shows').html(data);
       }
     });
   }
   });
   
   // add to cart
   
   $(document).on('click', '.cartbtn', function(){
       var numb = <?php echo $_SESSION['wpnumb']; ?>;
       var product_id = $(this).attr("id");
       var product_name = $('#productName_'+product_id+'').val();
       var product_price = $('#productDiscountprice_'+product_id+'').val();
       var product_quantity = $('#quantity_'+product_id).val();
       var action = "add";
       if(product_quantity > 0)
       {
          $.ajax({
             url:"ajax_addtocart.php",
             method:"POST",
             data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
             success:function(data)
             {
                // load_cart_data();
                alert("Item has been Added into Cart " + numb);
                load_minicart();
                // document.location.reload();
                // $("html, body").animate({ scrollTop: 0 }, "fast");
             }
          });
       }
       else
       {
          alert("Please Enter Number of Quantity");
       }
    });
   
   // Fetching Product Details page using ajax
   
   $(document).on('click', '.productTitle', function(){
       var product_id = $(this).attr("id");
   
       $.ajax({
          url:"product_detail.php",
          method:"POST",
          data:{product_id:product_id},
          success:function(data){
             $('#page').html(data);
              $("html, body").animate({ scrollTop: 150 }, "fast");
              // return false;
          }
       });
    });
   
   load_minicart();
   
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
   
   var globalProdId = '';
   // btn-remove1
   function reply_click(clicked_id)
   {
    globalProdId = clicked_id;
   }
   
   
   $(document).on('click', '.btn-remove1', function(){
    $.ajax({
       url:"ajax_removefromcart.php",
       method:"POST",
       data:{globalProdId:globalProdId},
       success:function(data)
       {
      
         load_minicart();
         load_viewcart();
         load_subtotalPanels(); 

       }
    });
   });
   
</script> 

<script type="text/javascript">

load_viewcart();

// cart_list_form

function load_viewcart(){

$.ajax({
   url:"load_shoppingcart.php",
   method:"POST",
   success:function(data)
   {
      $('.cart_list_form').html(data);
      $("html, body").animate({ scrollTop: 0 }, "extreme");
   }
});
}

load_subtotalPanels();
// sub_total_panel

function load_subtotalPanels(){

$.ajax({
   url:"load_subtotalPanel.php",
   method:"POST",
   success:function(data)
   {
      $('.sub_total_panel').html(data);
   }
});
}


var globalProdId = '';

// btn-remove1

function reply_click(clicked_id)
{
globalProdId = clicked_id;
}


$(document).on('click', '.remove_item_from_list', function(){
$.ajax({
   url:"ajax_removefromcart.php",
   method:"POST",
   data:{globalProdId:globalProdId},
   success:function(data)
   {
      // load_cart_data();
      alert("Item has been Removed from your cart " + globalProdId);
      load_viewcart();
      load_subtotalPanels();
      load_minicart()

   }
});
});

$(document).on('click', '#empty_cart_button', function(){

var result = confirm("Do you want to remove all items?");

if (result) {

   $.ajax({
      url:"clear_cart.php",
      method:"POST",
      success:function(data)
      {
         load_viewcart();
         load_subtotalPanels();
         load_minicart()

      }
   });
}
});

function setLocation($url){

window.location.assign($url);

}

// btn_update_cart

var globalUpdateProdId = '';

// btn-remove1

function reply_clicks(clicked_id)
{
globalUpdateProdId = clicked_id;
}


$(document).on('click', '.btn_update_cart', function(){

var number_input_quantity = $('#QTY_'+globalUpdateProdId).val();
var number_input_product_price = $('#Price_'+globalUpdateProdId).val();
var number_input_hidden_quantity = $('#QTYS_'+globalUpdateProdId).val();

$.ajax({
url:"ajax_updatecart.php",
method:"POST",
data:{globalUpdateProdId:globalUpdateProdId, number_input_quantity:number_input_quantity, number_input_product_price:number_input_product_price, number_input_hidden_quantity:number_input_hidden_quantity},
success:function(data)
{
   load_viewcart();
   load_subtotalPanels();
   load_minicart();
}
});

});

</script>

</body>
</html>