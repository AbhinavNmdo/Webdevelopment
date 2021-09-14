<?php 
   session_start();
   error_reporting(E_ALL);
   
   require_once('Mongo_config.php');
   
   global $manager;
   global $Mongo_database;
   
   $_SESSION['user_name'];
   $_SESSION['user_name_phone'];
   $_SESSION['user_postal_code'];
   $_SESSION['user_name_whatsappmessagesId'];
   $_SESSION['wpnumb'];
   
   if(empty($_SESSION['user_name']) === true || empty($_SESSION['wpnumb']) === true){
   
      echo '<script type="text/javascript">window.location.assign("login.php")</script>';
   
   }
   
   ?>
<?php 
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
      <title>thedailyfreshstore | Oops! page not found.</title>
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
    
         <!-- Header start -->
         <?php include 'headersandnavbars.php'; ?>
         <!-- Header end -->
        
        <div id="page2" style="margin: auto; text-align: center; font-weight: 500; font-size: 22px;letter-spacing: 1px; font-family: 'Rubik', sans-serif;">
        <div style="text-align:center"><img src="images/outofstock.jpg" style="margin: 10px; width: 10%;" alt="thedailyfreshstore"><h3>Sorry! These products are unavailable for a short period of time</h3></div>
        </div>
    
      </div>
    
      <!-- JavaScript --> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/revslider.js"></script> 
      <script src="js/common.js"></script> 
      <script src="js/owl.carousel.min.js"></script> 
      <script src="js/jquery.mobile-menu.min.js"></script> 
      <script src="js/countdown.js"></script> 
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
         $(document).on('click', '.cartbtn', function(){
         var numb = <?php echo $_SESSION['wpnumb']; ?>;
         var product_id = $(this).attr("id");
         var product_name = $('#productName_'+product_id+'').val();
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
            // load_cart_data();
            alert("Item has been Added into Cart ");
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
         
         
         
         $(document).on('click', '.cartbtnsingle', function(){
         var numb = <?php echo $_SESSION['wpnumb']; ?>;
         // id="'.$hot_render["_id"]["oid"].'_PN_'.$hot_render["productDescription"].'_PRICE_'.$hot_render["productSellPrice"].'"
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
         // load_cart_data();
         alert("Item has been Added into Cart ");
         load_minicart();
         // document.location.reload();
         // $("html, body").animate({ scrollTop: 0 }, "fast");
         }
         });
         });
         
      </script>
   </body>
</html>