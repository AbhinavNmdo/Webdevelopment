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

        if (strtoupper($_SESSION['PID']) === strtoupper('pomes') && !empty($user_pincode)) {

            $cache = "./cache/file.pomescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('drupes') && !empty($user_pincode)) {

            $cache = "./cache/file.drupescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('berries') && !empty($user_pincode)) {

            $cache = "./cache/file.berriescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('melons') && !empty($user_pincode)) {

            $cache = "./cache/file.melonscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('citrus') && !empty($user_pincode)) {

            $cache = "./cache/file.citruscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('tropical') && !empty($user_pincode)) {

            $cache = "./cache/file.tropicalcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('stone-fruit') && !empty($user_pincode)) {

            $cache = "./cache/file.stonefruitcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('brassica') && !empty($user_pincode)) {

            $cache = "./cache/file.brassicacache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('fruit-vegetables') && !empty($user_pincode)) {

            $cache = "./cache/file.fruit-vegetablescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('gourds-squashes') && !empty($user_pincode)) {

            $cache = "./cache/file.gourds-squashescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('greens') && !empty($user_pincode)) {

            $cache = "./cache/file.greenscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('fungus') && !empty($user_pincode)) {

            $cache = "./cache/file.funguscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('roots-tubers') && !empty($user_pincode)) {

            $cache = "./cache/file.roots-tuberscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('pods-seeds') && !empty($user_pincode)) {

            $cache = "./cache/file.pods-seedscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('stems') && !empty($user_pincode)) {

            $cache = "./cache/file.stemscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('almonds') && !empty($user_pincode)) {

            $cache = "./cache/file.almondscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('cashew') && !empty($user_pincode)) {

            $cache = "./cache/file.cashewcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('nuts') && !empty($user_pincode)) {

            $cache = "./cache/file.nutscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('vegetable-oils') && !empty($user_pincode)) {

            $cache = "./cache/file.vegetable-oilscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('sunflower-oils') && !empty($user_pincode)) {

            $cache = "./cache/file.sunflower-oilscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('ghee') && !empty($user_pincode)) {

            $cache = "./cache/file.gheecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('other-refined') && !empty($user_pincode)) {

            $cache = "./cache/file.other-refinedcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('wheat-flours') && !empty($user_pincode)) {

            $cache = "./cache/file.wheat-flourscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('maida-flours') && !empty($user_pincode)) {

            $cache = "./cache/file.maida-flourscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('other-flours') && !empty($user_pincode)) {

            $cache = "./cache/file.other-flourscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('beans') && !empty($user_pincode)) {

            $cache = "./cache/file.beanscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('dals') && !empty($user_pincode)) {

            $cache = "./cache/file.dalscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('other-pulses') && !empty($user_pincode)) {

            $cache = "./cache/file.other-pulsescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('rice') && !empty($user_pincode)) {

            $cache = "./cache/file.ricecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('basmati-rice') && !empty($user_pincode)) {

            $cache = "./cache/file.basmati-ricecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('brown-rice') && !empty($user_pincode)) {

            $cache = "./cache/file.brown-ricecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('salt') && !empty($user_pincode)) {

            $cache = "./cache/file.saltcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('sugar') && !empty($user_pincode)) {

            $cache = "./cache/file.sugarcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('salt-sugar-others') && !empty($user_pincode)) {

            $cache = "./cache/file.salt-sugar-otherscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('indian-spices') && !empty($user_pincode)) {

            $cache = "./cache/file.indian-spicescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('other-spices') && !empty($user_pincode)) {

            $cache = "./cache/file.other-spicescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('peanuts') && !empty($user_pincode)) {

            $cache = "./cache/file.peanutscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('other-peanuts') && !empty($user_pincode)) {

            $cache = "./cache/file.other-peanutscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('leaf-dust') && !empty($user_pincode)) {

            $cache = "./cache/file.leaf-dustcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('tea-bags') && !empty($user_pincode)) {

            $cache = "./cache/file.tea-bagscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('exotic-flavoured-tea') && !empty($user_pincode)) {

            $cache = "./cache/file.exotic-flavoured-teacache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('green-tea') && !empty($user_pincode)) {

            $cache = "./cache/file.green-teacache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('cold-drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.cold-drinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('non-alcoholic-drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.non-alcoholic-drinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('soda-cocktails') && !empty($user_pincode)) {

            $cache = "./cache/file.soda-cocktailscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('soft-drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.soft-drinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('sports-energy-drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.sports-energy-drinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('packaged') && !empty($user_pincode)) {

            $cache = "./cache/file.packagedcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Flavoured-drink') && !empty($user_pincode)) {

            $cache = "./cache/file.Flavoured-drinkcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('instant-coffee') && !empty($user_pincode)) {

            $cache = "./cache/file.instant-coffeecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('ground-coffee') && !empty($user_pincode)) {

            $cache = "./cache/file.ground-coffeecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('juices') && !empty($user_pincode)) {

            $cache = "./cache/file.juicescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('syrups-concentrates') && !empty($user_pincode)) {

            $cache = "./cache/file.syrups-concentratescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('children-drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.children-drinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('glucose-drinks') && !empty($user_pincode)) {

            $cache = "./cache/file.glucose-drinkscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('diapers') && !empty($user_pincode)) {

            $cache = "./cache/file.diaperscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('baby-wipes') && !empty($user_pincode)) {

            $cache = "./cache/file.baby-wipescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('nappies-rash-cream') && !empty($user_pincode)) {

            $cache = "./cache/file.nappies-rash-creamcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('baby-foods') && !empty($user_pincode)) {

            $cache = "./cache/file.baby-foodscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('baby-accessories') && !empty($user_pincode)) {

            $cache = "./cache/file.baby-accessoriescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('attars') && !empty($user_pincode)) {

            $cache = "./cache/file.attarscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('mens-deodrants-perfumes') && !empty($user_pincode)) {

            $cache = "./cache/file.mens-deodrants-perfumescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('womens-deodrants-perfumes') && !empty($user_pincode)) {

            $cache = "./cache/file.womens-deodrants-perfumescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('hair-colors') && !empty($user_pincode)) {

            $cache = "./cache/file.hair-colorscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('hair-oil') && !empty($user_pincode)) {

            $cache = "./cache/file.hair-oilcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('shampoo-serum-conditioners') && !empty($user_pincode)) {

            $cache = "./cache/file.shampoo-serum-conditionerscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('gel-wax-others') && !empty($user_pincode)) {

            $cache = "./cache/file.gel-wax-otherscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('shaving-needs') && !empty($user_pincode)) {

            $cache = "./cache/file.shaving-needscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('antiseptic-bandages') && !empty($user_pincode)) {

            $cache = "./cache/file.antiseptic-bandagescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('ayurveda') && !empty($user_pincode)) {

            $cache = "./cache/file.ayurvedacache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('sexual-wellness') && !empty($user_pincode)) {

            $cache = "./cache/file.sexual-wellnesscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('suppliments-protiens') && !empty($user_pincode)) {

            $cache = "./cache/file.suppliments-protienscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('floss-tongue-cleaner') && !empty($user_pincode)) {

            $cache = "./cache/file.floss-tongue-cleanercache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('mouth-wash') && !empty($user_pincode)) {

            $cache = "./cache/file.mouth-washcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('tooth-cleaner') && !empty($user_pincode)) {

            $cache = "./cache/file.tooth-cleanercache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('tooth-paste') && !empty($user_pincode)) {

            $cache = "./cache/file.tooth-pastecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('hair-removal') && !empty($user_pincode)) {

            $cache = "./cache/file.hair-removalcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('sanitary-needs') && !empty($user_pincode)) {

            $cache = "./cache/file.sanitary-needscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('bathing-bars-soap') && !empty($user_pincode)) {

            $cache = "./cache/file.bathing-bars-soapcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('body-scrubs') && !empty($user_pincode)) {

            $cache = "./cache/file.body-scrubscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('shower-gels') && !empty($user_pincode)) {

            $cache = "./cache/file.shower-gelscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('handwash-sanitizers') && !empty($user_pincode)) {

            $cache = "./cache/file.handwash-sanitizerscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('antiseptic') && !empty($user_pincode)) {

            $cache = "./cache/file.antisepticcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('body-care-soaps') && !empty($user_pincode)) {

            $cache = "./cache/file.body-care-soapscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('eye-care') && !empty($user_pincode)) {

            $cache = "./cache/file.eye-carecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('face-care') && !empty($user_pincode)) {

            $cache = "./cache/file.face-carecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('lip-care') && !empty($user_pincode)) {

            $cache = "./cache/file.lip-carecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('brown-wheat-multigrain-bread') && !empty($user_pincode)) {

            $cache = "./cache/file.brown-wheat-multigrain-breadcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('milk-white-sandwich-bread') && !empty($user_pincode)) {

            $cache = "./cache/file.milk-white-sandwich-breadcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('buns-pavs-pizza') && !empty($user_pincode)) {

            $cache = "./cache/file.buns-pavs-pizzacache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('khari-cream-rolls') && !empty($user_pincode)) {

            $cache = "./cache/file.khari-cream-rollscache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('bakery-biscuits-cookies') && !empty($user_pincode)) {

            $cache = "./cache/file.bakery-biscuits-cookiescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('premium-cookies') && !empty($user_pincode)) {

            $cache = "./cache/file.premium-cookiescache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Rusk') && !empty($user_pincode)) {

            $cache = "./cache/file.Ruskcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('buttermilk-lassi') && !empty($user_pincode)) {

            $cache = "./cache/file.buttermilk-lassicache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Flavoured-milk') && !empty($user_pincode)) {

            $cache = "./cache/file.Flavoured-milkcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('Milk') && !empty($user_pincode)) {

            $cache = "./cache/file.Milkcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('butter-margarine') && !empty($user_pincode)) {

            $cache = "./cache/file.butter-margarinecache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('cheese') && !empty($user_pincode)) {

            $cache = "./cache/file.cheese" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('curd') && !empty($user_pincode)) {

            $cache = "./cache/file.curdcache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('paneer') && !empty($user_pincode)) {

            $cache = "./cache/file.paneercache" . $user_pincode . ".php";
        } elseif (strtoupper($_SESSION['PID']) === strtoupper('yogurt-shrikhand') && !empty($user_pincode)) {

            $cache = "./cache/file.yogurt-shrikhandcache" . $user_pincode . ".php";
        }

        if (file_exists($cache)) {

            // echo "cache file found<br/>";
            include $cache;
        } else {

            // echo "cache does not exist<br/>";

            // echo "cache does not exist<br/>";
            // function GetData(){
            $query = new MongoDB\Driver\Query(['productSubCategories' => strtoupper($_SESSION['PID'])]);

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