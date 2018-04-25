<?php
session_start();
include_once("config.php");

session_unset();

// Select lowest score from scores table.
$sql = "SELECT * FROM scores WHERE score=(select STDEV(score) from scores)";
$result = mysqli_query($conn, $sql);

// Create a session variable, ls, to store the lowest score.
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION ["sd"] = $row["score"];   // Set hs session variable to low score in db.
} else {
    session_unset();    // Remove all session variables.
}

header('Location:scores.php');    // Go back to original page.
?>
