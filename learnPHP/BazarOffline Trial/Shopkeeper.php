<?php
session_start();
$ids = $_GET['shopids'];
?>
<?php
require "views/_dbconnect.php";
// $method = $_SERVER['REQUEST_METHOD'];
if (isset($_POST['add'])) {
    // $ids = $_GET['shopids'];
    $sql12 = "SELECT * FROM `shopkeeper` WHERE `shop_id` = $ids";
    $result12 = mysqli_query($conn, $sql12);
    while ($row = mysqli_fetch_assoc($result12)) {
        $shopzip = $row['shop_zip'];
        $itemname = $_POST['itemname'];
        $itemdesc = $_POST['itemdesc'];
        $sql = "INSERT INTO `items`(`item_name`, `item_desc`, `itemshop_id`, `item_zip`) VALUES ('$itemname','$itemdesc','$ids','$shopzip')";
        $result = mysqli_query($conn, $sql);
    }
}
?>
<?php
    if (isset($_POST['upload'])){
        $target = basename($_FILES['profile']['name']);
        $img_tmp = $_FILES['profile']['tmp_name'];
        $img = $_FILES['profile']['name'];
        $sql = "UPDATE `shopkeeper` SET `shop_image`='$img' WHERE `shop_id` = '$ids'";
        $result = mysqli_query($conn, $sql);
        if (move_uploaded_file($img_tmp, $target)){
            echo 'Success';
        }
        else{
            echo 'Failed';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopkeeper</title>
    <style>
    .responsive
    {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    #form
    {
        width: 300px;
    }
    .res
    {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 100px;
    }
    </style>
</head>

<body>
    <?php
    require "views/_dbconnect.php";
    require "views/_navbar.php";
    ?>

    <!-- Profile for Shopkeepers -->
    <div class="container">
        <?php
        // $get = $_GET['shopids'];
        $sql = "SELECT * FROM `shopkeeper` WHERE `shop_id` = $ids";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $shopname = $row['shop_name'];
            $shopaddress = $row['shop_address'];
            $shopzip = $row['shop_zip'];
            $profile = $row['shop_image'];
            echo '<div class="container responsive">
            <div class="col-lg-4 m-4 responsive">
            <!-- <svg class="bd-placeholder-img rounded-circle responsive" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->
            <img class="bd-placeholder-img rounded-circle responsive" src=" ' .$profile. ' " alt="" width="200px" height="200px">
            <h2 style="margin-top: 15px;">' . $shopname . '</h2>
            <p>' . $shopaddress . '</p>
            <p>'.$shopzip.'</p>
            <hr>
          </div>
            </div>';
        }
        ?>
    </div>

    <!-- Security for shopkeepers -->
    <?php
    // $user = $_GET['shopids'];
    $sql = "SELECT * FROM `shopkeeper` WHERE `shop_id` = '$ids'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $active = $row['shop_username'];
        if ($_SESSION['username'] != $active) {
            header("location: Logout.php");
            header("location: Login.php");
        }
    }
    ?>


    <!-- Displaying items -->
    <div class="container">
        <div class="row">
            <?php
            // $getid = $_GET['shopids'];
            $sql = "SELECT * FROM `items` WHERE `itemshop_id` = $ids";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $itemname = $row['item_name'];
                $itemdesc = $row['item_desc'];
                $itemid = $row['item_id'];
                echo '<div class="col-md-4">
                    <div class="row-md-4 m-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/1600x900/?market" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $itemname . '</h5>
                            <p class="card-text">' . substr($itemdesc, 0, 100) . '...</p>
                        </div>
                    </div>
                </div>
                </div>';
            }
            ?>
        </div>
    </div>


    <!-- Insert Item form -->
    <div class="container" id="form">
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="itemname" aria-describedby="emailHelp" name="itemname">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="textarea" class="form-control" id="desc" name="itemdesc">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Upload Profile -->
    <hr>
    <h2 style="margin-top: 20px;" align="center">Wanna Update your Profile</h2>
    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
        <div class="res">
                <div class="mb-3">
                    <label for="profile">Update Your Profile</label>
                    <input type="file" name="profile" id="profile">
                </div>
                <div class="mb-3">
                    <input type="submit" name="upload" id="upload">
                </div>
        </div>
    </form>




            <!-- We have to add delete item option and edit item option  -->





    <!-- Footer -->
    <div class="container">
        <?php
            require "views/_footer.php"
        ?>
    </div>
</body>

</html>