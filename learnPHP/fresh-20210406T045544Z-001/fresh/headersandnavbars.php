<?php 
session_start();
error_reporting(0);

require_once('Mongo_config.php');

global $manager;
global $Mongo_database;


$_SESSION['user_name'];
$_SESSION['user_name_phone'];
$_SESSION['user_postal_code'];
$_SESSION['user_name_whatsappmessagesId'];
$_SESSION['wpnumb'];
$_SESSION['user_name_orderNum'];

if(empty($_SESSION['user_name']) === true || empty($_SESSION['wpnumb']) === true){

   echo '<script type="text/javascript">window.location.assign("login.php")</script>';

}


?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
      <link rel="stylesheet" type="text/css" href="css/utilss.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

      <style type="text/css">
         @media only screen and (max-width: 1250px) {
            .seosearch, .seobutton {
               display: none;
            }
         }

         .alertify-notifier .ajs-message.ajs-warning {
            background-color: #FFCC00;
            border: 2px solid #FFCC00;
            border-radius: 10px;
            color: #ffffff;
            font-family: 'Rubik', sans-serif;
            font-weight: 500;
            font-size: 14px;
         }

input:placeholder{
   color: white;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
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
                                 <div class="check"><a title="Profile" href="profile_page.php"><span class="hidden-xs" style="font-size: 14px;"><?php echo $_SESSION['user_name']; ?></span></a> </div>
                                 <div class="check"><a title="Order History" href="order_history.php"><span class="hidden-xs" style="font-size: 14px;">Order History</span></a> </div>
                                 <div class="check"><a title="Checkout" href="checkout.php"><span class="hidden-xs">Checkout</span></a> </div>
                                 <div class="check"><a title="Logout" href="index.php?logout=true" ><span class="hidden-xs" name="logoutme">Logout</span></a> </div>

                              </div>
                           </div>
                           <!-- End Header Top Links --> 
                        </div>
                     </div>
                  </div>
               </div>
<?php

function Logout() {
   
// adding inactive status if logged out.

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

echo '<script type="text/javascript">window.location.assign("login.php")</script>';

   
}

if (isset($_GET['logout'])) {
   Logout();   
}

?>
               <div class="form-row" style="">
                  <div class="col">
                     <a title="thedailyfreshstore" href="index.php"><img src="images/log.png" style="margin-left: 1%; margin-top: -5%;width: 20%;" alt="thedailyfreshstore"></a>
                     <div style="color: white; float: right; width: 50%; margin-top: 2%;"><input type="text" class="seosearch" style="border: 2px solid white; border-radius: 20px; width: 60%; color: white;" placeholder="Search entire store here..." maxlength="25" name="search" id="search"><button class="btn-lg seobutton" style="height: 40px; margin-top: 25px; margin-left: -50px; background-color: transparent; color: white;" type="button"><span class="glyphicon glyphicon-search"></span></button></div>
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

<script type="text/javascript">
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
         alertify.set('notifier','position', 'top-center');
         alertify.warning('Item has been removed!', 1);
      }
   });
});


</script>
</body>
</html>