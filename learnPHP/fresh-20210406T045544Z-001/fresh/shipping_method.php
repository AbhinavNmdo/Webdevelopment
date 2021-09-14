<?php require_once('Mongo_config.php'); 
error_reporting(0);

global $manager;
global $Mongo_database;


?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php session_start();
if (empty($_SESSION['user_details']) !== false) {
 	$_SESSION['user_details'];
} 
?>
<div class="col-main">
<div class="page-title">
<h1>Checkout</h1>
</div>
<ol class="one-page-checkout" id="checkoutSteps">
<li id="opc-billing" class="section allow active">
  <div class="step-title"> <span class="number">1</span>
    <h3>SHIPPING METHOD</h3>
    <!--<a href="#">Edit</a> --> 
  </div>
  <div id="checkout-step-billing" class="step a-item" style="">
    <form id="co-billing-form" action="">
      <fieldset class="group-select">
        <ul>
          <li id="billing-new-address-form">
            <fieldset>
              <input type="hidden" name="billing[address_id]" value="4269" id="billing_address_id">
              <ul>
                <li>
                  <div class="customer-name">
                    <div class="input-box name-firstname">
                      <label for="billing_firstname"> First Name <span class="required">*</span> </label>
                      <br>
                      <input type="text" id="billing_firstname" name="billing[firstname]" value="<?php echo $_SESSION['user_details'][0]; ?>" title="First Name" class="input-text required-entry">
                    </div>
                    <div class="input-box name-lastname">
                      <label for="billing_lastname"> Last Name <span class="required">*</span> </label>
                      <br>
                      <input type="text" id="billing_lastname" name="billing[lastname]" value="<?php echo $_SESSION['user_details'][1]; ?>" title="Last Name" class="input-text required-entry">
                    </div>
                  </div>
                </li>
                <li>
                </li>
                <li>
                  <label for="billing_street1">Address <span class="required">*</span></label>
                  <br>
                  <textarea type="text" style="height: 10%;" title="Street Address" name="billing[street][]" id="billing_street1  street1" class="input-text required-entry"><?php echo $_SESSION['user_details'][2]; ?></textarea>
                </li>
                <li>
                  <div class="input-box">
                    <label for="billing_city">City <span class="required">*</span></label>
                    <br>
                    <input type="text" title="City" name="billing[city]" value="<?php echo $_SESSION['user_details'][3]; ?>" class="input-text required-entry" id="billing_city">
                  </div>
                  <div id="" class="input-box">
                    <label for="billing_region">State/Province <span class="required">*</span></label>
                    <br>
                    <select defaultvalue="1" id="billing_region_id" name="billing[region_id]" title="State/Province" class="validate-select" style="">
                      <option value="">Please select region, state or province</option>
                      <option value="AP" <?php if($_SESSION['user_details'][4]=="AP") echo 'selected="selected"'; ?>title="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="AR" <?php if($_SESSION['user_details'][4]=="AR") echo 'selected="selected"'; ?> title="Arunachal Pradesh">Arunachal Pradesh</option>
                      <option value="AS" <?php if($_SESSION['user_details'][4]=="AS") echo 'selected="selected"'; ?> title="Assam">Assam</option>
                      <option value="BR" <?php if($_SESSION['user_details'][4]=="BR") echo 'selected="selected"'; ?> title="Bihar">Bihar</option>
                      <option value="CG" <?php if($_SESSION['user_details'][4]=="CG") echo 'selected="selected"'; ?> title="Chhattisgarh">Chhattisgarh</option>
                      <option value="GA" <?php if($_SESSION['user_details'][4]=="GA") echo 'selected="selected"'; ?> title="Goa">Goa</option>
                      <option value="GJ" <?php if($_SESSION['user_details'][4]=="GJ") echo 'selected="selected"'; ?> title="Gujarat">Gujarat</option>
                      <option value="HR" <?php if($_SESSION['user_details'][4]=="HR") echo 'selected="selected"'; ?> title="Haryana">Haryana</option>
                      <option value="HP" <?php if($_SESSION['user_details'][4]=="HP") echo 'selected="selected"'; ?> title="Himachal Pradesh">Himachal Pradesh</option>
                      <option value="JH" <?php if($_SESSION['user_details'][4]=="JH") echo 'selected="selected"'; ?> title="Jharkhand">Jharkhand</option>
                      <option value="KA" <?php if($_SESSION['user_details'][4]=="KA") echo 'selected="selected"'; ?> title="Karnataka">Karnataka</option>
                      <option value="KL" <?php if($_SESSION['user_details'][4]=="KL") echo 'selected="selected"'; ?> title="Kerala">Kerala</option>
                      <option value="MP" <?php if($_SESSION['user_details'][4]=="MP") echo 'selected="selected"'; ?> title="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="MH" <?php if($_SESSION['user_details'][4]=="MH") echo 'selected="selected"'; ?> title="Maharashtra">Maharashtra</option>
                      <option value="MN" <?php if($_SESSION['user_details'][4]=="MN") echo 'selected="selected"'; ?> title="Manipur">Manipur</option>
                      <option value="ML" <?php if($_SESSION['user_details'][4]=="ML") echo 'selected="selected"'; ?>title="Meghalaya">Meghalaya</option>
                      <option value="MZ" <?php if($_SESSION['user_details'][4]=="MZ") echo 'selected="selected"'; ?> title="Mizoram">Mizoram</option>
                      <option value="NL" <?php if($_SESSION['user_details'][4]=="NL") echo 'selected="selected"'; ?> title="Nagaland">Nagaland</option>
                      <option value="OD" <?php if($_SESSION['user_details'][4]=="OD") echo 'selected="selected"'; ?> title="Odisha">Odisha</option>
                      <option value="PB" <?php if($_SESSION['user_details'][4]=="PB") echo 'selected="selected"'; ?> title="Punjab">Punjab</option>
                      <option value="RJ" <?php if($_SESSION['user_details'][4]=="RJ") echo 'selected="selected"'; ?> title="Rajasthan">Rajasthan</option>
                      <option value="SK" <?php if($_SESSION['user_details'][4]=="SK") echo 'selected="selected"'; ?> title="Sikkim">Sikkim</option>
                      <option value="TN" <?php if($_SESSION['user_details'][4]=="TN") echo 'selected="selected"'; ?> title="Tamil Nadu">Tamil Nadu</option>
                      <option value="TS" <?php if($_SESSION['user_details'][4]=="TS") echo 'selected="selected"'; ?> title="Telangana">Telangana</option>
                      <option value="TR" <?php if($_SESSION['user_details'][4]=="TR") echo 'selected="selected"'; ?> title="Tripura">Tripura</option>
                      <option value="UP" <?php if($_SESSION['user_details'][4]=="UP") echo 'selected="selected"'; ?> title="Uttar Pradesh">Uttar Pradesh</option>
                      <option value="UK" <?php if($_SESSION['user_details'][4]=="UK") echo 'selected="selected"'; ?> title="Uttarakhand">Uttarakhand</option>
                      <option value="WB" <?php if($_SESSION['user_details'][4]=="WB") echo 'selected="selected"'; ?> title="West Bengal">West Bengal</option>

                    </select>
              
                    <input type="text" id="billing_region" name="billing[region]" value="Alabama" title="State/Province" class="input-text required-entry" style="display: none;">
                  </div>
                </li>
                <li>
                  <div class="input-box">
                    <label for="billing_postcode">Zip/Postal Code <span class="required">*</span></label>
                    <br>
                    <input type="text" title="Zip/Postal Code" name="billing[postcode]" id="billing_postcode" value="<?php echo $_SESSION['user_details'][5]; ?>" class="input-text validate-zip-international required-entry">
                  </div>
                  <div class="input-box">
                    <label for="billing_country_id">Country <span class="required">*</span></label>
                    <br>
                    <select name="billing[country_id]" id="billing_country_id" class="validate-select" title="Country">
                       <option value="">Please select country</option>
                      <option value="India" <?php if($_SESSION['user_details'][6]=="India") echo 'selected="selected"'; ?>>India</option>

                    </select>
                  </div>
                </li>
                <li>
                  <div class="input-box">
                    <label for="billing_telephone">Telephone <span class="required">*</span></label>
                    <br>
                    <input type="text" name="billing[telephone]" value="<?php echo $_SESSION['user_details'][7]; ?>" title="Telephone" class="input-text required-entry" id="billing_telephone">
                  </div>
                </li>
              </ul>
            </fieldset>
          </li>
        </ul>
        <p class="require"><em class="required">* </em>Required Fields</p>
        <button type="button" class="button continue continue_to_pay"><span>Continue</span></button>
      </fieldset>
    </form>
  </div>
</li>
</ol>
</div>

</body>
</html>