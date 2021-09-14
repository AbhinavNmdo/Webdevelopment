<?php require_once('Mongo_config.php'); ?><!DOCTYPE html>
<html>
<head>
	<title></title>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php 
session_start();
error_reporting(0);

global $manager;
global $Mongo_database;

$wpnumber = isset($_REQUEST['number'])?$_REQUEST['number']:"";

$lat = isset($_REQUEST['lat'])?$_REQUEST['lat']:"";
$long = isset($_REQUEST['long'])?$_REQUEST['long']:"";
$wpnumber = isset($_REQUEST['number'])?$_REQUEST['number']:"";
$fn = isset($_REQUEST['fullname'])?$_REQUEST['fullname']:"";
$zipcode = isset($_REQUEST['pincode'])?$_REQUEST['pincode']:"";
$countries = isset($_REQUEST['country'])?$_REQUEST['country']:"";
$states = isset($_REQUEST['state'])?$_REQUEST['state']:"";
$cities = isset($_REQUEST['city'])?$_REQUEST['city']:"";
$local = isset($_REQUEST['locality'])?$_REQUEST['locality']:"";
$sublocal = isset($_REQUEST['sublocality'])?$_REQUEST['sublocality']:"";
$neighbor = isset($_REQUEST['neigh'])?$_REQUEST['neigh']:"";
$premise = isset($_REQUEST['premises'])?$_REQUEST['premises']:"";
$action = isset($_REQUEST['action'])?$_REQUEST['action']:"";

$obj = array();


// Temporary order number 
$_SESSION['tmpOrderNum'] = rand(111, 999);

//  Creating user accounts adding data inside customers table

if(strpos($fn, ' ')){

	$firstName = explode(' ', $fn)[0];
	$lastName = explode(' ', $fn)[1];

}else{
  
	$firstName = $fn;
	$lastName = '';

}
  $subsciptionNo = rand(111111, 999999);
  $lat = $lat;
  $long = $long;
  $address = "";
  $postcode = $zipcode;
  $state = $states;
  $country = $countries;
  $city = $cities;
  $locality = $local;
  $neighborhood = $neighbor;
  $sublocality = $sublocal;
  $subpremise = $premise;
  $postCodeServing = '1';
  $phone = $wpnumber;
  $currentRequestContext = "Customer.Account.Options";
  $currentOrderNumber = '';
  $currentVendorType = '';
  $currentVendorInfo = '';
  $accountBalance = '0';
  $referral = '';
  $helpToggle = 'true';
  $created = date("Y-m-d - H:i:s:m");
  $language = 'en';


  $insRec = new MongoDB\Driver\BulkWrite;
  $insRec->insert([
    'firstName' =>$firstName, 
    'lastName'=>$lastName, 
    'subsciptionNo'=>$subsciptionNo, 
    'lat'=>$lat, 
    'long'=>$long, 
    'address'=>$address, 
    'postcode'=>$postcode, 
    'state'=>$state, 
    'country'=>$country, 
    'city'=>$city, 
    'locality'=>$locality, 
    'neighborhood'=>$neighborhood, 
    'sublocality'=>$sublocality, 
    'subpremise'=>$subpremise, 
    'postCodeServing'=>$postCodeServing, 
    'phone'=>$phone, 
    'currentRequestContext'=>$currentRequestContext, 
    'currentOrderNumber'=>$currentOrderNumber, 
    'currentVendorType'=>$currentVendorType, 
    'currentVendorInfo'=>$currentVendorInfo, 
    'accountBalance'=>$accountBalance, 
    'referral'=>$referral, 
    'helpToggle'=>$helpToggle, 
    'created'=>$created, 
    'language'=>$language,
  ]);
  
  $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

  $result = $manager->executeBulkWrite($Mongo_database.'.customers', $insRec, $writeConcern);


  // adding temporary otp inside GenerateTempCart table

  $insRec = new MongoDB\Driver\BulkWrite;
  $insRec->insert([
  'phone' => $wpnumber,
  'tmpOrderNum' => $_SESSION['tmpOrderNum'],
  'lastThree' => substr($wpnumber, -3),
  'status' => 'NotConsumed',
  ]);
  
  $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

  $result = $manager->executeBulkWrite($Mongo_database.'.generateTempCart', $insRec, $writeConcern);

$firstName = $firstName;
$phone = $wpnumber;
$orderText = "backend";
$postcode = $zipcode;
$totalAmount = 0;
$cart = $obj;
$vendor = $obj;
$orderNum = $_SESSION['tmpOrderNum'];
$whatsappmessagesId = "manual";
$orderProductCount = 0;
$status = "ToBeReviewed";
$orderComment = "";
$shippingAddress = "";
$orderDate = "";
$deliveryCharges = 0;
$lastModifiedDate = date("Y-m-d  H:i:s:m");
$deliveryTime = "";
$canShareReceipt = "true";

$_SESSION['dfirstName'] = $firstName;
$_SESSION['dphone'] = $wpnumber;
$_SESSION['dorderText'] = "backend";
$_SESSION['dpostcode'] = $zipcode;
$_SESSION['dorderNum'] = $_SESSION['tmpOrderNum'];

// website Reviewed
// wp ToBeReviewed
// Ordered


// $insRec = new MongoDB\Driver\BulkWrite;
// $insRec->insert([
// 'firstName' => $firstName,
// 'phone' => $phone,
// 'orderText' => $orderText,
// 'postcode' => $postcode,
// 'totalAmount' => $totalAmount,
// 'cart' => $cart,
// 'vendor' => $vendor,
// 'orderNum' => $orderNum,
// 'whatsappmessagesId' => $whatsappmessagesId,
// 'orderProductCount' => $orderProductCount,
// 'status' => $status,
// 'orderComment' => $orderComment,
// 'shippingAddress' => $shippingAddress,
// 'orderDate' => $orderDate,
// 'deliveryCharges' => $deliveryCharges,
// 'lastModifiedDate' => $lastModifiedDate,
// 'deliveryTime' => $deliveryTime,
// 'canShareReceipt' => $canShareReceipt,
// 'orderTransactionID' => '',
// 'orderType' => '',
// ]);

// $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

// $result = $manager->executeBulkWrite($Mongo_database.'.managedcart', $insRec, $writeConcern);

// $filter = ['phone' => $wpnumber];
// $limit = ['limit' => 1];

// $query = new MongoDB\Driver\Query($filter, $limit);

// $cursor = $manager->executeQuery($Mongo_database.'.managedcart', $query);

// foreach ($cursor as $document)
// {
//   $_SESSION['user_name'] = $document->firstName;
//   $_SESSION['user_name_phone'] = $document->phone;
//   $_SESSION['user_postal_code'] = $document->postcode;
//   $_SESSION['user_name_whatsappmessagesId'] = $document->whatsappmessagesId;
//   $_SESSION['wpnumb'] = $wpnumber;
//   $_SESSION['order_num'] = $document->orderNum;
// }


?>

<!-- Lets load a login page once user get registered -->

<div class="mainfield" id="otppage">
<input type="text" id="otpnumber" name="otpnumber" class="fadeIn second otpnumber" style="font-family: 'Rubik', sans-serif; font-weight: 400; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #fff; border-radius: 30px;" placeholder="OTP">
<br>
<button type="button" name="otpbtn" id="otpbtn" class="fadeIn otpbtn" style="background-color: #59B210; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #59B210; border-radius: 20px;"><svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z"/></svg></button>
</div>

<script type="text/javascript">
// console.log = function(){};
Subscribeme();

// Lets create a function to send otp 

function SendNEWOTP(){
	
	RAPIDAPI_API_URL = 'https://api.gupshup.io/sm/api/v1/msg';
	var msg = 'Your OTP for login is ' + <?php echo $_SESSION['tmpOrderNum']; ?> + '.';

	var xhtt = new XMLHttpRequest();
	xhtt.open("POST", RAPIDAPI_API_URL, true);
	params = 'channel=whatsapp&source=919665923802&destination=' + <?php echo $wpnumber; ?> + '&message=%7B%22type%22:%22text%22,%22text%22:%22' + msg + '%22%7D&src.name=GreenLentils';
	//(params);
	console.log(params);
	xhtt.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhtt.setRequestHeader('apikey', '3d08cbbd784d42dfc208d7fc07a3e54c');
	xhtt.send(params);

	// SendOtpToLoginPage();
	// SendOtpToLoginCheckPage();

}


// Lets subscribe user to get whatsapp verification code and messages regarding order details 

function Subscribeme(){
  RAPIDAPI_API_URL = 'https://api.gupshup.io/sm/api/v1/app/opt/in/GreenLentils';
  var xhtt = new XMLHttpRequest();
  xhtt.open("POST", RAPIDAPI_API_URL, true);
  params = 'user='+<?php echo $wpnumber; ?>;
  console.log(params);
  xhtt.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhtt.setRequestHeader('apikey', '3d08cbbd784d42dfc208d7fc07a3e54c');
  xhtt.send(params);
  
  SendNEWOTP();

}


</script>

</body>
</html>