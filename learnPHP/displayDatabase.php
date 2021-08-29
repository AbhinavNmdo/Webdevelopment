<?php
$servername = "localhost";
$username = "root";
$passwordOfServer = "";
$database = "agentregistration";

// Connecting to Database
$conn = mysqli_connect($servername, $username, $passwordOfServer, $database);

if (!$conn) {
  die("Sorry, Cant connect" . mysqli_connect_error());
}
else{
  echo "Connected";
  echo "<br>";
}

$sql = "SELECT * FROM `Agent`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
echo $num;

while ($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);
    echo "Hello " . ('name') .  ". your email ". ['email'] ." your address ". ['address1'];
    echo "<br>";
}



?>