<?php
session_start();
if (isset($_SESSION['username'])){
    echo "Welcome " . $_SESSION['username'] . " And your password is " . $_SESSION['password'];
}
else{
    echo "Login to continue";
}

?>