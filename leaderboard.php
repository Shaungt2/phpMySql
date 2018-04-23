<?php
session_start();
include_once("config.php");
session_unset();
// Arrange the scores from highest to lowest, leaderboard.
$sql = "SELECT studID, score FROM scores JOIN (SELECT distinct score score6 FROM scores ORDER BY score DESC LIMIT 5, 1) x ON score >= score6 ORDER by score DESC";
$result = mysqli_query($conn, $sql);  
// Create a session variable, lb, to display the leaderboard.
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION ["lb"] = $row["score"];   // Set lb session variable to leaderboard in db.
} else {
    session_unset();    // Remove all session variables.
}
    
header('Location:scores.php');    // Go back to original page.
?>
