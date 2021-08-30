<?php
    session_start();

    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
        header("location: Login.php");
        exit;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
</head>
<body>
    <?php
        require "views/_dbconnect.php";
        require "views/_navbar.php"; 
    ?>
    <?php
        $id = $_GET['itemid'];
        $sql = "SELECT * FROM `shops` WHERE `shop_id` = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $shopname = $row['shop_name'];
            $shopaddress = $row['shop_address'];
            echo $shopname;
        }
    
    ?>


    <?php
        $id = $_GET['itemid'];
        $sql = "SELECT * FROM `items` WHERE `shopim_id`=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $itemid = $row['item_id'];
            $itemname = $row['item_name'];
            $itemdesc = $row['item_desc'];
            echo '<div class="card mb-3 m-4" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="https://source.unsplash.com/600x600/?shops,jewelery" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">' . $itemname . '</h5>
                  <p class="card-text">' . $itemdesc . '</p>
                </div>
              </div>
            </div>
          </div>';

        }
    
    ?>
</body>
</html>