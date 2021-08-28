<?php
// Making connection to the Database
    $servername = "localhost";
    $username = "root";
    $passwordOfServer = "";

    // Connecting to Database
    $conn = mysqli_connect($servername, $username, $passwordOfServer);

    if (!$conn) {
      die("Sorry, Cant connect" . mysqli_connect_error());
    }
    else{
      echo "Connected";
    }

?>