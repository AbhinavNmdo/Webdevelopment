<?php
// Making connection to the Database
$servername = "localhost";
$username = "root";
$password= "";
$database = "ahbay12";

// Connecting to Database
$conn = mysqli_connect($servername, $username, $password, $database);

// Die statnment if not connected
if (!$conn) {
  die("Sorry, Cant connect" . mysqli_connect_error());
}
else{
  echo "Connected";
  echo "<br>";
}

// Inserting data to the Database
$name = "Ashu";
$destination = "Benglore";

$sql = "INSERT INTO `phptrip` (`name`, `dest`) VALUES ('$name', '$destination')";
$result1 = mysqli_query($conn, $sql);

if($result1){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($conn);
}
?>