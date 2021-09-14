<?php require_once('Mongo_config.php'); ?>
<?php 

$wpnumber = isset($_REQUEST['numb'])?$_REQUEST['numb']:"";

global $manager;
global $Mongo_database;

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
      <div class="mainfield">
        <input type="text" id="otpnumber" name="otpnumber" class="fadeIn second otpnumber" style="font-family: 'Rubik', sans-serif; font-weight: 400; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #fff; border-radius: 30px;" placeholder="OTP" value="<?php echo $wpnumber; ?>">
        <br>
        <button type="button" name="otpbtn" id="otpbtn" class="fadeIn" style="background-color: #59B210; margin-bottom: 15px; margin-top: 15px; width: 80%; border: 2px solid #59B210; border-radius: 20px;"><svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z"/></svg></button>
      </div>
</body>
</html>