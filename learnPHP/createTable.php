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

// Creating Database using mysqli
// $create = "CREATE DATABASE ahbay12";
// $result = mysqli_query($conn, $create);

// if ($result) {
//     echo "Created Successfully";
// }
// else{
//     echo "Unsuccessful " . mysqli_error($conn);
// }

// Creating Tabel in Database using mysqli
$table = "CREATE TABLE `phptrip` ( `sno` INT(6) NOT NULL AUTO_INCREMENT , `name` VARCHAR(12) NOT NULL , `dest` VARCHAR(6) NOT NULL , PRIMARY KEY (`sno`))";
$result1 = mysqli_query($conn, $table);

if($result1){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($conn);
}
?>