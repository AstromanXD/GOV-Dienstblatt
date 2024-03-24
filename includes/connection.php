<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "gov";

$connection = new mysqli($servername, $username, $password, $database);

if (!$connection) {
    die('Connection Error' . mysqli_error());
}




