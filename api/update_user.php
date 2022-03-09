<?php
include './config.php';
$oldUsername = $_POST["old_username"];
$newUsername = $_POST["new_username"];

$sql = "UPDATE user SET username='$newUsername' WHERE username='$oldUsername'";
if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
    header("location: /website-dashboard/admin-dashboard.php");
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
?>