<?php

//DB Connection Parameters

$dbServer = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "cineplex";

//Connect

$conn = mysqli_connect($dbServer, $dbuser, $dbpass, $database);

if (!$conn) {
    die("Connection Faild : " . mysqli_connect_error());
}

?>