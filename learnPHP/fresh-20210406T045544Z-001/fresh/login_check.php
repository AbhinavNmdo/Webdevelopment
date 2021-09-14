<?php require_once('Mongo_config.php'); ?><!DOCTYPE html>
<html>
<head>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php 

error_reporting(0);
session_start();

$resend_otps = 'FALSE';

global $manager;
global $Mongo_database;

$xx = "LOGIN";

$_SESSION['flag_login'] = "I";

$wpnumber = isset($_REQUEST['number'])?$_REQUEST['number']:"";
$abc = isset($_REQUEST['key'])?$_REQUEST['key']:"";
$def = isset($_REQUEST['ps'])?$_REQUEST['ps']:"";

$_SESSION['wpnumb'] = $wpnumber;

// $order_Num = isset($_REQUEST['order_Num'])?$_REQUEST['order_Num']:"";

//  move to login if user opens this link directly

if (empty($wpnumber)) {
	
	header("Location: login.php");

}

$filter = ['phone' => $wpnumber];
$limit = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $limit); 

$rows = $manager->executeQuery($Mongo_database.".customers", $query);

if (empty($rows->toArray())) { ?>

	<!-- Register First -->

	<div class="mainfield">
	<input type="text" id="fullnamefield" name="fullnamefield" class="fadeIn second fullnamefield" style="font-family: 'Rubik', sans-serif; font-weight: 400; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #fff; border-radius: 30px;" placeholder="Full name">
	<br>
	<input type="number" id="user_pincode" name="user_pincode" class="fadeIn second user_pincode" style="text-align: center; font-family: 'Rubik', sans-serif; font-weight: 400;  font-size: 16px; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #fff; border-radius: 30px;" placeholder="Pincode">
	<br>
	<button type="button" name="registerbtn" id="registerbtn" class="fadeIn registerbtn" style="background-color: #59B210; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #59B210; border-radius: 20px;"><svg fill="#fff" xmlns="https://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z"/></svg></button>
	
	<input type="hidden" id="id_lat" name="id_lat" >
	<input type="hidden" id="id_numbers" name="id_numbers" value="<?php echo $wpnumber; ?>" >
	<input type="hidden" id="id_long" name="id_long" >
	<input type="hidden" id="id_country" name="id_country" >
	<input type="hidden" id="id_state" name="id_state" >
	<input type="hidden" id="id_city" name="id_city" >
	<input type="hidden" id="id_locality" name="id_locality" >
	<input type="hidden" id="id_subloc" name="id_subloc" >
	<input type="hidden" id="id_neigh" name="id_neigh" >
	<input type="hidden" id="id_premises" name="id_premises" >

	</div>
	

<?php

$xx = "REGISTER";

}else{ 

    $_SESSION['flag_login'] = "II";

	$filter = ['phone' => $wpnumber];
	$limit = ['limit' => 1];

	$query = new MongoDB\Driver\Query($filter, $limit);

	$cursor = $manager->executeQuery($Mongo_database.'.managedcart', $query);

	foreach ($cursor as $document)
	{
	  $_SESSION['user_name'] = $document->firstName;
	  $_SESSION['user_name_phone'] = $document->phone;
	  $_SESSION['user_postal_code'] = $document->postcode;
	  $_SESSION['user_name_whatsappmessagesId'] = $document->whatsappmessagesId;
	  $_SESSION['wpnumb'] = $wpnumber;
	  $_SESSION['order_num'] = $document->orderNum;
	  $_SESSION['pincode'] = $document->postcode;
	}

    ?>

	<!-- Login -->

	<div class="mainfield">
	<input type="text" id="otpnumber" name="otpnumber" class="fadeIn second otpnumber" style="font-family: 'Rubik', sans-serif; font-weight: 400; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #fff; border-radius: 30px;" placeholder="OTP">
	<br>
	<button type="button" name="otpbtn" id="otpbtn" class="fadeIn otpbtn" style="background-color: #59B210; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #59B210; border-radius: 20px;"><svg fill="#fff" xmlns="https://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z"/></svg></button>
	<br>
		<button type="button" class="resend_otp" name="resend_otp" style="outline: 0; border: 0; background-color: white; color: blue; font-size: 10px; float: right; margin-right: 25px;">Resend otp</a>
	</div>

<?php

}


?>
</body>

<script type="text/javascript">

var xx = <?php echo "'".$xx."'"; ?>;

if (xx == 'REGISTER') {

  //(xx);

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 

	function showPosition(position) {
	  var latlag = "latlng=" + position.coords.latitude + "," + position.coords.longitude;
	  var findloc = "https://maps.googleapis.com/maps/api/geocode/json?"+latlag+"&key=AIzaSyCn4gxK-xrWGcCu6aIXvL5mz1EnthMEwUc";
	  // //(findloc);
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	   if (this.readyState == 4 && this.status == 200) {
	    getResponse(this.responseText);
	   }
	   };
	  xhttp.open("GET", findloc, true);
	  xhttp.send();

	  document.getElementById("id_lat").value = position.coords.latitude;
	  document.getElementById("id_long").value = position.coords.longitude;

	  var s1 = document.getElementById("id_lat");
	  s1.value = position.coords.latitude;
	  var s2 = document.getElementById("id_long");
	  s2.value = position.coords.longitude;

	}

	  function getResponse(crd){
	  
	  var addressObj = {
	            postal_code:'',
	            state:'',
	            country:'',
	            city:'',
	            locality:'',
	            neighborhood:'',
	            sublocality:'',
	            subpremise:''
	        };

	  var jsonData = JSON.parse(crd);
	  jsonData.results[0].address_components.forEach((item) =>
	        {
	        for(var i=0;i<item.types.length;i++)
	        {
	            switch(item.types[i]) {
	                case 'postal_code':
	                    addressObj.postal_code = item.short_name;
	                    break;
	                case 'administrative_area_level_2':
	                    addressObj.city = item.short_name;
	                    break;
	                case 'administrative_area_level_1':
	                    addressObj.state = item.short_name;
	                    break;
	                case 'locality':
	                    addressObj.locality = item.short_name;
	                    break;
	                case 'sublocality':
	                    addressObj.sublocality = item.short_name;
	                    break;
	                case 'neighborhood':
	                    addressObj.neighborhood = item.short_name;
	                    break;
	                case 'subpremise':
	                    addressObj.subpremise = item.short_name;
	                    break;
	                case 'country':
	                    addressObj.country = item.long_name;
	                    break;
	            }
	        }});
	  
	  //("v is false");
	  
	  var addressObj = addressObj;
	  var addressGoogle = jsonData.results[0].formatted_address;

	  var pin = document.getElementById("user_pincode");
	  pin.value = addressObj.postal_code;
	  var s3 = document.getElementById("id_country");
	  s3.value = addressObj.country;
	  var s4 = document.getElementById("id_state");
	  s4.value = addressObj.state;
	  var s5 = document.getElementById("id_city");
	  s5.value = addressObj.city;
	  var s6 = document.getElementById("id_locality");
	  s6.value = addressObj.locality;
	  var s7 = document.getElementById("id_subloc");
	  s7.value = addressObj.sublocality;
	  var s8 = document.getElementById("id_neigh");
	  s8.value = addressObj.neighborhood;
	  var s9 = document.getElementById("id_premises");
	  s9.value = addressObj.subpremise;

	} 


// xx = 0;

}
</script>


<script type="text/javascript">

var flag = <?php echo "'".$_SESSION['flag_login'].'_True'."'"; ?>;

if(flag == "II_True" || flag === "II_True"){

	RAPIDAPI_API_URL = 'https://api.gupshup.io/sm/api/v1/msg';
	var msg = 'Your OTP for login is ' + <?php echo $_SESSION['order_num']; ?> + '.';

	var xhtt = new XMLHttpRequest();
	xhtt.open("POST", RAPIDAPI_API_URL, true);
	params = 'channel=whatsapp&source=919665923802&destination=' + <?php echo $wpnumber; ?> + '&message=%7B%22type%22:%22text%22,%22text%22:%22' + msg + '%22%7D&src.name=GreenLentils';
	//(params);
	console.log(params);
	xhtt.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhtt.setRequestHeader(<?php echo "'".$abc."'" ?>, <?php echo "'".$def."'" ?>);
	xhtt.send(params);

}	
</script>

<!-- Resend OTP -->

<script type="text/javascript">
// Let us match the otp values from database
$(document).on('click', '.resend_otp', function(){
      
	var otps =  <?php echo "'".$resend_otps."'"; ?>;

	RAPIDAPI_API_URL = 'https://api.gupshup.io/sm/api/v1/msg';
	var msg = 'Your OTP for login is ' + <?php echo $_SESSION['order_num']; ?> + '.';

	var xhtt = new XMLHttpRequest();
	xhtt.open("POST", RAPIDAPI_API_URL, true);
	params = 'channel=whatsapp&source=919665923802&destination=' + <?php echo $wpnumber; ?> + '&message=%7B%22type%22:%22text%22,%22text%22:%22' + msg + '%22%7D&src.name=GreenLentils';
	//(params);
	console.log(params);
	xhtt.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhtt.setRequestHeader(<?php echo "'".$abc."'" ?>, <?php echo "'".$def."'" ?>);
	xhtt.send(params);


});


</script>


<script type="text/javascript">

$('.otpnumber').keypress(function (e) {
   var key = e.which;
   if(key == 13)  // the enter key code
   {

	var otp_user_input = $('#otpnumber').val();
	console.log(otp_user_input);
	var action = "add";
	$.ajax({
	
		url:"check_otp.php",
		method:"POST",
		data:{otp_user_input:otp_user_input, action:action},
		success:function(data)
		{
		   console.log(data);
		   if(data == "MATCHES" || data === "MATCHES"){
		   		window.location.assign("index.php");
		   }else{
		   		alert("Please enter a valid OTP!");
		   }
		}
	
	});

   }
});  

// Let us match the otp values from database
$(document).on('click', '.otpbtn', function(){
      
	var otp_user_input = $('#otpnumber').val();
	console.log(otp_user_input);
	var action = "add";
	$.ajax({
	
		url:"check_otp.php",
		method:"POST",
		data:{otp_user_input:otp_user_input, action:action},
		success:function(data)
		{
		   console.log(data);
		   if(data == "MATCHES" || data === "MATCHES"){
		   		window.location.assign("index.php");
		   }else{
		   		alert("Please enter a valid OTP!");
		   }
		}
	
	});

   });


</script>

</html>