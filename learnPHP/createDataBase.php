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
  echo "<br>";
}

// Creating Database using mysqli
$create = "CREATE DATABASE ahbay12";
$result = mysqli_query($conn, $create);

if ($result) {
    echo "Created Successfully";
}
else{
    echo "Unsuccessful " . mysqli_error($conn);
}

?>