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
    <title>Categories</title>
</head>

<body>
    <?php
        require "views/_navbar.php";
        require "views/_dbconnect.php";   
    ?>


    <div class="container my-4">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `categories` WHERE `cat_id` = $id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $cat = $row['cat_name'];
                $desc = $row['cat_desc'];
                echo '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Welcome to ' . $cat . ' world!</h4>
                <p>' . $desc . '</p>
            </div>';
            }
        ?>
    </div>
</body>

</html>