<?php
session_start();
include_once("config.php");

session_unset();


//use MEDIAN() ???
//MEDIAN() is an Oracle function, will it work with Mysql????
$sql = "SELECT * FROM scores WHERE score=(select MEDIAN(score) from scores)";
$result = mysqli_query($conn, $sql);  

// Create a session variable, md, to store the median score
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION ["md"] = $row["score"];
} else {
    session_unset();    // remove all session variables
}
    
header('Location:scores.php');    // go back to original page
?>