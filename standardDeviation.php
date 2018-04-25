<?php
session_start();
include_once("config.php");

session_unset();

// Select standard deviation score from scores table.
$sql = "SELECT TRUNCATE(STD(score),2) FROM scores";
$result = mysqli_query($conn, $sql);

// Create a session variable, sd, to store the standard deviation.
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION ["sd"] = $row["STD(score)"];
} else {
    session_unset();    // Remove all session variables.
}

header('Location:scores.php');    // Go back to original page.
?>
