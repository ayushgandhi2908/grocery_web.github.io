<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "food_planet";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

if(!$conn){
    echo "Error Found". mysqli_error();
}

?>