<?php 

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "login-task";

$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

