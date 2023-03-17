<?php

$server = "localhost";
$name = "root";
$pass = "";
$dbname = "grocery_shop";

$conn = mysqli_connect($server, $name, $pass, $dbname);
if(!$conn){
    echo "Not Connected";
}
?>