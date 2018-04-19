<?php
session_start();
include_once("config.php");

session_unset();

// Select average score from scores table.
$sql = "SELECT AVG(score) FROM scores";
$result = mysqli_query($conn, $sql);  

// Create a session variable, as, to store the highest score.
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // whole number per requirements, fetched average is first array element
    $formatAvg = number_format(array_values($row)[0]); 
    $_SESSION ["as"] = $formatAvg; // Set as session variable to average score in db.
} else {
    session_unset();    // Remove all session variables.
}
    
header('Location:scores.php');    // Go back to original page.
?>
