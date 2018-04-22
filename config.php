<?php
//session_start();
//shorn6


/*localhost test config*/
/*$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "site16db";*/
 
$hostname = "mysql.yaacotu.com";
$username = "studcollab";
$password = "collabor8";
$dbname = "siteghdb";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
?>
