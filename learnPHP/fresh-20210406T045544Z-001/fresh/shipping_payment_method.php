<?php require_once('Mongo_config.php');  

session_start();

error_reporting(0);

global $manager;
global $Mongo_database;


if (empty($_SESSION['user_details']) !== false) {
  $_SESSION['user_details'];
}

$amount = isset($_REQUEST['amount'])?$_REQUEST['amount']:"";
$user_details = isset($_REQUEST['user_details'])?$_REQUEST['user_details']:"";


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
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  background-color: #59B210;
  font-size: 24px;
  font-weight: 500;
  letter-spacing: 1px;
  color: #ffffff;
  text-align: center;
  position: relative;
  text-transform: uppercase;
  font-family: 'Rubik', sans-serif;
margin-top:0px;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #212121;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #212121;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;

}
form{
  width: 60%;
  padding: 5%;
  margin:auto;
  box-shadow: 0 0 15px -7px #666;
  border: 2px solid #fff;
  border-radius: 10px;
}
.tablinks{
    background-color: #59B210;
  font-size: 24px;
  font-weight: 500;
  letter-spacing: 1px;
  color: #ffffff;
  text-align: center;
  position: relative;
  text-transform: uppercase;
  font-family: 'Rubik', sans-serif;
margin-top:0px;
}
.tablinks:active{
  background-color: #212121;
  color: #ffffff;

}

.formdiv{
  width: 60%;
  padding: 5%;
  margin:auto;
  box-shadow: 0 0 15px -7px #666;
  border: 2px solid #fff;
  border-radius: 10px;
}
</style>
</head>
<body>

<div class="card-header" 
  style="
      background-color: #59B210;
      font-size: 24px;
      font-weight: 500;
      letter-spacing: 1px;
      color: #ffffff;
      padding-top: 10px;
      padding-bottom: 10px;
      text-align: center;
      position: relative;
      text-transform: uppercase;
      font-family: 'Rubik', sans-serif;
    margin-top:0px;">
    PAYMENTS
  </div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'cod')">CASH ON DELIVERY</button>
  <button class="tablinks" onclick="openCity(event, 'upi')">CARD/UPI</button>
</div>

<?php 

$query = new MongoDB\Driver\Query(['phone'=>$_SESSION['user_details'][7]]); 
$rows = $manager->executeQuery($Mongo_database.".managedcart", $query);
$row_count = 0;

foreach ($rows as $row) {
   
   $user_render = objectToArray($row);
   
   if($user_render['status'] == "ToBeReviewed" || $user_render['status'] == "Reviewed"){

      $_SESSION['get_oid'] = $user_render['_id']['oid'];   
   
   }
}

?>

<?php 

// Store the cipher method 
$ciphering = "AES-128-CTR"; 
  
// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
  
// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121'; 
  
// Store the encryption key 
$encryption_key = "DailyFreshTeam"; 
  
// Use openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($_SESSION['get_oid'], $ciphering, 
            $encryption_key, $options, $encryption_iv); 

$mid = $encryption;

$_SESSION['token-id_s'] = $mid;
?>

<!--  cod tab -->
<div id="cod" class="tabcontent">
   <br><br>
   <form action="payondelivery.php" method="POST" >
      <!-- <div class="formdiv"> -->
      <div class="input-group mb-3" style="height: 35px; margin-bottom: 10px;"><span class="input-group-text" id="basic-addon3" style="background: transparent; border: 0;"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></span><input type="text" class="form-control" placeholder="Full Name" id="fullname_l" readonly value="<?php echo $_SESSION['user_details'][0]. ' ' . $_SESSION['user_details'][1]; ?>" aria-describedby="basic-addon3" style="height: auto; border: 2px solid white; font-size: 14px; color: black; border-radius: 10px; box-shadow: 0 0 15px -7px #999;"></div>

      <div class="input-group mb-3" style="height: 35px; margin-bottom: 10px;"><span class="input-group-text" id="basic-addon3" style="background: transparent; border: 0;"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-telephone-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg></span><input type="number" class="form-control" placeholder="Phone" id="phoneno_l" readonly value="<?php echo $_SESSION['user_details'][7]; ?>" aria-describedby="basic-addon3" style="height: auto; border: 2px solid white; font-size: 14px; color: black; border-radius: 10px; box-shadow: 0 0 15px -7px #999;"></div>

      <div class="input-group mb-3" style="height: 35px; margin-bottom: 10px;"><span class="input-group-text" id="basic-addon3" style="background: transparent; border: 0;"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-cash-stack" viewBox="0 0 16 16"><path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/></svg></span><input type="number" class="form-control" id="amount_l" placeholder="Amount" value="<?php echo $amount ?>" readonly aria-describedby="basic-addon3" style="height: auto; font-size: 14px; color: black; border: 2px solid white; border-radius: 10px; box-shadow: 0 0 15px -7px #999;"></div>

      <button type="submit" name="placeorder" class="placeorder" id="placeorder" style="
      width: 100%;
      height: auto;
      padding: 10px;
      font-size: 16px;
      font-weight: 500;
      letter-spacing: 1px;
      background-color: #e31837;
      color: #FFFFFF;
      text-transform: uppercase;
      border: 2px solid #e31837;
      font-family: 'Rubik', sans-serif;
      margin-top:0px; margin-top: 10px; margin-bottom: 10px;">PLACE ORDER</button>

   </form>
   <!-- </div> -->
</div>

<?php 

$_SESSION['tokenid'] = $mid; 

?>
<!-- upi tab -->
<div id="upi" class="tabcontent">
   <br><br>
   <form action="pay.php" method="POST">
      
      <div class="input-group mb-3" style="height: 35px; margin-bottom: 10px;"><span class="input-group-text" id="basic-addon3" style="background: transparent; border: 0;"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></span><input type="text" class="form-control" placeholder="Full Name" id="fullname_ll" readonly value="<?php echo $_SESSION['user_details'][0]. ' ' . $_SESSION['user_details'][1]; ?>" aria-describedby="basic-addon3" style="height: auto; border: 2px solid white; font-size: 14px; color: black; border-radius: 10px; box-shadow: 0 0 15px -7px #999;"></div>

      <div class="input-group mb-3" style="height: 35px; margin-bottom: 10px;"><span class="input-group-text" id="basic-addon3" style="background: transparent; border: 0;"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-telephone-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg></span><input type="number" class="form-control" placeholder="Phone" id="phoneno_ll" readonly value="<?php echo $_SESSION['user_details'][7]; ?>" aria-describedby="basic-addon3" style="height: auto; border: 2px solid white; font-size: 14px; color: black; border-radius: 10px; box-shadow: 0 0 15px -7px #999;"></div>

      <div class="input-group mb-3" style="height: 35px; margin-bottom: 10px;"><span class="input-group-text" id="basic-addon3" style="background: transparent; border: 0;"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-cash-stack" viewBox="0 0 16 16"><path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/></svg></span><input type="number" class="form-control" id="amount_ll" placeholder="Amount" value="<?php echo $amount ?>" readonly aria-describedby="basic-addon3" style="height: auto; font-size: 14px; color: black; border: 2px solid white; border-radius: 10px; box-shadow: 0 0 15px -7px #999;"></div>

      <button type="submit" name="payorder" id="payorder" style="
      width: 100%;
      height: auto;
      padding: 10px;
      font-size: 16px;
      font-weight: 500;
      letter-spacing: 1px;
      background-color: #e31837;
      color: #FFFFFF;
      text-transform: uppercase;
      border: 2px solid #e31837;
      font-family: 'Rubik', sans-serif;
      margin-top:0px; margin-top: 10px; margin-bottom: 10px;">PAY NOW</button>
   </form>
</div>


<script>

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
} 
</script>

</body>
</html> 
