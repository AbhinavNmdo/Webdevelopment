<?php
session_start();
error_reporting(E_ALL);
$_SESSION['pincode'];

$user_pincode = 'C' . $_SESSION['pincode'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Grid.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<style type="text/css">
    .productTitle:hover {
        color: #e31837;
    }
</style>

<body>

    <?php

    function fileExists($filePath)
    {
        return is_file($filePath) && file_exists($filePath);
    }

    global $manager;
    global $Mongo_database;

    $start = microtime(true);
    $data = '';
    require_once('Mongo_config.php');
    try {

        // echo strtoupper($_SESSION['PID'])."<br>";
        // echo strtoupper('Fruits');
        if (strtoupper($_SESSION['PID']) === strtoupper('Fruits') && !empty($user_pincode)) {

            $cache = "./cache/file.fruitscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Vegetables') && !empty($user_pincode)) {

            $cache = "./cache/file.Vegetablescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Dry-Fruits') && !empty($user_pincode)) {

            $cache = "./cache/file.DryFruitscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Edible-Oils-Ghee') && !empty($user_pincode)) {

            $cache = "./cache/file.EdibleOilsGheecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Flours') && !empty($user_pincode)) {

            $cache = "./cache/file.Flourscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Pulses') && !empty($user_pincode)) {

            $cache = "./cache/file.Pulsescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Rice-Variants') && !empty($user_pincode)) {

            $cache = "./cache/file.RiceVariantscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Salt-Sugar') && !empty($user_pincode)) {

            $cache = "./cache/file.SaltSugarcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Spices') && !empty($user_pincode)) {

            $cache = "./cache/file.Spicescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Peanuts-Others') && !empty($user_pincode)) {

            $cache = "./cache/file.PeanutsOtherscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Air-Freshner') && !empty($user_pincode)) {

            $cache = "./cache/file.AirFreshnercache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Cleaning-Accessories') && !empty($user_pincode)) {

            $cache = "./cache/file.CleaningAccessoriescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Detergent-Bars') && !empty($user_pincode)) {

            $cache = "./cache/file.DetergentBarscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Dish-Washing') && !empty($user_pincode)) {

            $cache = "./cache/file.DishWashingcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Pet-Care') && !empty($user_pincode)) {

            $cache = "./cache/file.PetCarecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Puja-Items') && !empty($user_pincode)) {

            $cache = "./cache/file.PujaItemscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Shoe-Care') && !empty($user_pincode)) {

            $cache = "./cache/file.ShoeCarecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Toilet-Floor-Other-Cleaners') && !empty($user_pincode)) {

            $cache = "./cache/file.ToiletFloorOtherCleanerscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Repellents') && !empty($user_pincode)) {

            $cache = "./cache/file.Repellentscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Tea') && !empty($user_pincode)) {

            $cache = "./cache/file.Teacache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Energy-Soft-Drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.EnergySoftDrinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Water') && !empty($user_pincode)) {

            $cache = "./cache/file.Watercache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Coffee') && !empty($user_pincode)) {

            $cache = "./cache/file.Coffeecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Fruit-Juices-Drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.FruitJuicesDrinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Health-Drink-Supplements') && !empty($user_pincode)) {

            $cache = "./cache/file.HealthDrinkSupplementscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Baby-Care') && !empty($user_pincode)) {

            $cache = "./cache/file.BabyCarecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Cosmetics') && !empty($user_pincode)) {

            $cache = "./cache/file.Cosmeticscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Deo-Perfumes') && !empty($user_pincode)) {

            $cache = "./cache/file.DeoPerfumescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Hair-Care') && !empty($user_pincode)) {

            $cache = "./cache/file.HairCarecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Health-Care') && !empty($user_pincode)) {

            $cache = "./cache/file.HealthCarecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Oral-Care') && !empty($user_pincode)) {

            $cache = "./cache/file.OralCarecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Personal-Hygenics') && !empty($user_pincode)) {

            $cache = "./cache/file.PersonalHygenicscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Bath-Handwash') && !empty($user_pincode)) {

            $cache = "./cache/file.BathHandwashcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Skin-Care') && !empty($user_pincode)) {

            $cache = "./cache/file.SkinCarecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Personal-Care-Others') && !empty($user_pincode)) {

            $cache = "./cache/file.PersonalCareOtherscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Bread-Bakery') && !empty($user_pincode)) {

            $cache = "./cache/file.BreadBakerycache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Khari-Cookies') && !empty($user_pincode)) {

            $cache = "./cache/file.KhariCookiescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Milk') && !empty($user_pincode)) {

            $cache = "./cache/file.Milkcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Butter-Cheese-Yogurt') && !empty($user_pincode)) {

            $cache = "./cache/file.ButterCheeseYogurtcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Break-Fast-Cereals') && !empty($user_pincode)) {

            $cache = "./cache/file.BreakFastCerealscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Chocolates-Sweets') && !empty($user_pincode)) {

            $cache = "./cache/file.ChocolateSweetscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Indian-Sweets') && !empty($user_pincode)) {

            $cache = "./cache/file.IndianSweetscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Jams-Spreads') && !empty($user_pincode)) {

            $cache = "./cache/file.JamsSpreadscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Namkeen') && !empty($user_pincode)) {

            $cache = "./cache/file.Namkeencache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Biscuits') && !empty($user_pincode)) {

            $cache = "./cache/file.Biscuitscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Noodles-Macroni-Pasta') && !empty($user_pincode)) {

            $cache = "./cache/file.NoodlesMacroniPastacache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Pickles') && !empty($user_pincode)) {

            $cache = "./cache/file.Picklescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Sauces-Ketchup') && !empty($user_pincode)) {

            $cache = "./cache/file.SaucesKetchupcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Veg-Snacks') && !empty($user_pincode)) {

            $cache = "./cache/file.VegSnackscache" . $user_pincode . ".php";
        }

        if (file_exists($cache)) {

            // echo "cache file found<br/>";
            include $cache;
        } else {

            // echo "cache does not exist<br/>";
            // function GetData(){
            $query = new MongoDB\Driver\Query(['ProductCategory' => strtoupper($_SESSION['PID'])]);

            $rows = $manager->executeQuery($Mongo_database . ".products", $query);

            foreach ($rows as $row) {

                if (fileExists($row->productImage)) {

                    $cpin = 'C' . $_SESSION['pincode'];
                    $apin = 'A' . $_SESSION['pincode'];
                    if ($row->$cpin === 'TRUE') {
                        if ($row->$apin !== 'null') {

                            // if ($row->productSellPrice > 0){
                            $data .= '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: 270px; margin: 18.5; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: 420px;"><div class="float-none visible" id="image-view" style="background-repeat: no-repeat; width: 100%; background-size: contain; background-image: url(' . "'" . $row->productImage . "'" . ');"></div><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><button id="' . $row->_id . '" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Roboto, sans-serif; color: #515151; font-size: 14px; font-weight: 500; ">' . $row->productTitle . '</button></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><span class="mt-auto" id="productSellPrice_' . $row->_id . '" style="width: 100%;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858; font-size: 12px;"><input type="text" style="margin-top: 5px; float: left; text-align: right; width: 40%; outline: 0; border: 0;text-decoration: line-through;" value="&#8377; ' . $row->OutsidePrice . '" readonly /><input type="text" id="productDiscountprice_' . $row->_id . '" name="productDiscountprice" style="border: 0; outline: 0; float: right; text-align: left; width: 55%; background-color: #fff; height: auto; font-weight: bold; font-size: 15px; font-family: Rubik, sans-serif; color: #585858;" value="&#8377; ' . $row->$apin . '  (' . $row->productUnit . ')" readonly /></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><input type="number" id="quantity_' . $row->_id . '" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><input  type="submit" class="btn btn-primary cartbtn" name="addtocartbtn" id="' . $row->_id . '" style="margin-top: -7px; background-color: #e31837; font-family: Rubik, sans-serif; font-size: 14px; text-shadow: none; padding: 9px 10px 5px 10px; font-weight: 500; transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s; border: none; height: 40px; text-transform: uppercase; border-bottom: 3px rgba(0,0,0,0.1) solid; margin-left: 1px; color : #ffffff;" value="ADD TO CART" /></li></ul></center></div>';
                            // }
                        } else {


                            // if ($row->productSellPrice > 0){
                            $data .= '<div class="d-block box" id="main-product-content" style="box-shadow: 0 2px 15px -5px #666;  width: 270px; margin: 18.5; margin-bottom: 10px;  /*background-color: #c91e1e;*/height: 420px;"><div class="float-none visible" id="image-view" style="background-repeat: no-repeat; width: 100%; background-size: contain; background-image: url(' . "'" . $row->productImage . "'" . ');"></div><center><ul class="list-group list-group-flush"><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858;"><button id="' . $row->_id . '" name="productTitle" class="productTitle" style="outline: 0; border: 0; text-decoration: none; text-align: center; width: 100%;background-color: #fff; word-wrap: break-word; height: auto; font-family: Roboto, sans-serif; color: #515151; font-size: 14px; font-weight: 500; ">' . $row->productTitle . '</button></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><span class="mt-auto" id="productSellPrice_' . $row->_id . '" style="width: 100%;background-color: #fff;height: auto; font-family: Rubik, sans-serif; color: #585858; font-size: 12px;"><input type="text" style="margin-top: 5px; float: left; text-align: right; width: 40%; outline: 0; border: 0;text-decoration: line-through;" value="&#8377; ' . $row->OutsidePrice . '" readonly /><input type="text" id="productDiscountprice_' . $row->_id . '" name="productDiscountprice" style="border: 0; outline: 0; float: right; text-align: left; width: 55%; background-color: #fff; height: auto; font-weight: bold; font-size: 15px; font-family: Rubik, sans-serif; color: #585858;" value="&#8377; ' . $row->productSellPrice . '  (' . $row->productUnit . ')" readonly /></li><li class="list-group-item" style="border: 0; outline: 0; width: auto;background-color: #fff;height: auto;font-family: Rubik, sans-serif;color: #585858;"><input type="number" id="quantity_' . $row->_id . '" step="1" placeholder="QTY" value="1" name="QTY" title="Quantity" max="10" min="1" style="width: 40px; height: 40px; margin: 0px; overflow: visible; margin-right: 13px; margin-top: -2px; color: #111111; background-color: #FAFAFA; border: 2px solid #FAFAFA; border-radius: 5px; font-family: Rubik, sans-serif; font-size: 16px; text-shadow: none;" /><input  type="submit" class="btn btn-primary cartbtn" name="addtocartbtn" id="' . $row->_id . '" style="margin-top: -7px; background-color: #e31837; font-family: Rubik, sans-serif; font-size: 14px; text-shadow: none; padding: 9px 10px 5px 10px; font-weight: 500; transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s; border: none; height: 40px; text-transform: uppercase; border-bottom: 3px rgba(0,0,0,0.1) solid; margin-left: 1px; color : #ffffff;" value="ADD TO CART" /></li></ul></center></div>';
                        }
                    }
                }
            }

            echo $data;

            $handler = fopen($cache, 'w');
            fwrite($handler, $data);
            fclose($handler);
        }

        $end = microtime(true);
        $time = round(($end - $start), 4);
    } catch (MongoDB\Driver\Exception\Exception $e) {

        $filename = basename(__FILE__);

        echo "The $filename script has experienced an error.\n";
        echo "It failed with the following exception:\n";

        echo "Exception:", $e->getMessage(), "\n";
        echo "In file:", $e->getFile(), "\n";
        echo "On line:", $e->getLine(), "\n";
    }

    ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>

</html>