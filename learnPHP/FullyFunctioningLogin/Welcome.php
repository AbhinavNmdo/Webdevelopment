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
    <title>Welcome <?php echo $_SESSION['email'] ?></title>
</head>
<body>
<?php
    require 'views/_navbar.php';
    
    ?>

    <div class="container">
    <div class="alert alert-success my-4" role="alert">
        <h4 class="alert-heading">Well done! <?php echo $_SESSION['email'] ?></h4>
        <p>Login Successfull</p>
    </div>
    </div>
</body>
</html>