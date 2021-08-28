<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "agentregistration";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}


$sql = "SELECT * FROM `agent` WHERE `email`='asdf@asdf'";
$result = mysqli_query($conn, $sql);

// Usage of WHERE Clause to fetch data from the database
$num = mysqli_num_rows($result);
echo $num . " records found in the DataBase<br>";
$no=1;
if($num> 0){  
    while($row = mysqli_fetch_assoc($result)){ 
        echo $no .  ". Hello ". $row['name'] ." your email ". $row['email'];
        echo "<br>";
        $no = $no +1;
    }
}

// Usage of WHERE Clause to Update Data
$sql = "UPDATE `agent` SET `email` = 'asdfaasdfsadfsdf@asdfasdfasdfsadf' WHERE `zip` = '789654'";
$result = mysqli_query($conn, $sql);
echo var_dump($result);
$aff = mysqli_affected_rows($conn);
echo "<br>Number of affected rows: $aff <br>";
if($result){
    echo "We updated the record successfully";
}
else{
    echo "We could not update the record successfully";
}
?>