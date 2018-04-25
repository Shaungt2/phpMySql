<?php
session_start();
include_once("config.php");

session_unset();

// Select standard deviation score from scores table.
//$sql = "SELECT * FROM scores WHERE score=(select STD(score) from scores)";
$sql = "SELECT STD(score) FROM scores";
$result = mysqli_query($conn, $sql);

// Create a session variable, sd, to store the lowest score.
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION ["sd"] = $row["score"];   // Set hs session variable to low score in db.
} else {
    session_unset();    // Remove all session variables.
}
echo "is this working";
header('Location:scores.php');    // Go back to original page.
?>
