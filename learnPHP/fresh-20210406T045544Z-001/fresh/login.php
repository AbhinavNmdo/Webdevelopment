<?php require_once('Mongo_config.php'); ?><?php           

error_reporting(0);

session_start();

global $manager;
global $Mongo_database;

?>
<!DOCTYPE html>
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
      <title>thedailyfreshstore | Joinus</title>

      <!-- Mobile Specific -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

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
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
      <!--===============================================================================================-->
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i,900" rel="stylesheet">
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" type="text/css" href="css/loginform.css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
      <style type="text/css">

    input{font-family: Rubik, sans-serif;}

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }

    button[type="button"]{
      outline:none;
    }
    button[type="button"]::-moz-focus-inner {
      border: 0;
    }

  </style>

</head>
<div  style="background-repeat: no-repeat; background-size: cover; width: 100%; height: 100%; background-image: url(images/b2.jpg); background-color: #ffffff; font-family: 'Poppins', sans-serif;height: auto;">

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first" style="margin-top: 10px;">
      <svg xmlns="https://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" id="icon" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
    </div>

    <!-- Login Form -->
    <div id="formidl">
      <div class="mainfield">
        <input type="text" id="whatsappnumber"  name="whatsappnumber" class="fadeIn second whatsappnumber" style="font-family: 'Rubik', sans-serif; font-weight: 400; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #fff; border-radius: 30px;" placeholder="WhatsApp number">
        <br>
        <button type="button" name="wpbtn" id="wpbtn" class="fadeIn wpbtn" style="background-color: #59B210; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #59B210; border-radius: 20px;"><svg fill="#fff" xmlns="https://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z"/></svg></button>
      </div>
    </div>
  </div>
</div>

      <footer>
         <div class="newsletter-block">
            <div class="container">
               <div class="newsletter-wrap">
                  <h3 style="font-size: 24px; font-family: 'Pacifico', cursive; font-weight: 500; color: #FFFFFF; ">One stop destination for all your daily needs.</h3>
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
<script type="text/javascript">

// Call Login Page
$('.whatsappnumber').keypress(function (e) {
   var key = e.which;
   if(key == 13)  // the enter key code
   {

      var numb = $('#whatsappnumber').val();
      var number = '91'+numb;
      var key = 'apikey';
      var ps = '3d08cbbd784d42dfc208d7fc07a3e54c';

      var action = "add";
      if(numb.length > 9){

         $.ajax({
            url:"login_check.php",
            method:"POST",
            data:{number:number, key:key, ps:ps, action:action},
            success:function(data)
            {
               $('#formidl').html(data);
            }
         });

      }else{
        
        alert("Please enter a valid number.")

      }

   }
});  

$(document).on('click', '.wpbtn', function(){
   var numb = $('#whatsappnumber').val();
   var number = '91'+numb;
   var key = 'apikey';
   var ps = '3d08cbbd784d42dfc208d7fc07a3e54c';

   var action = "add";
   if(numb.length > 9){

      $.ajax({
         url:"login_check.php",
         method:"POST",
         data:{number:number, key:key, ps:ps, action:action},
         success:function(data)
         {
            $('#formidl').html(data);
         }
      });

   }else{
      
      alert("Please enter a valid number.")

   }
});



// Registration 

$(document).on('click', '.registerbtn', function(){
      var lat = $('#id_lat').val();
      var long = $('#id_long').val();
      var numb = $('#id_numbers').val();
      var number = numb;
      var fullname = $('#fullnamefield').val();
      var pincode = $('#user_pincode').val();
      var country = $("#id_country").val();
      var state = $("#id_state").val();
      var city = $("#id_city").val();
      var locality = $("#id_locality").val();
      var sublocality = $("#id_subloc").val();
      var neigh = $("#id_neigh").val();
      var premises = $("#id_premises").val();

      var action = "add";
      if(pincode.length > 5 & fullname.length > 5){

          if(pincode == '470001' || pincode == '470002' || pincode == '470003' || pincode == '412308' || pincode == "411028"){
              
              $.ajax({
                  url:"register.php",
                  method:"POST",
                  data:{lat:lat, long:long, number:number, fullname:fullname, pincode:pincode, country:country, state:state, city:city, locality:locality, sublocality:sublocality, neigh:neigh, premises:premises, action:action},
                  success:function(data)
                  {
                      $('#formidl').html(data);
                  }
              });


          }else{
            alert("Sorry! Currently not available in your pincode.")
          }

      }else{
        
        alert("Please enter all details.")

      }
   });

</script>

</body>
</html>
    <!-- Remind Passowrd -->
<!--     <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->