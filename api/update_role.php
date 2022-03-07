<?php
include './config.php';
$oldRole = $_POST["oldrole"];
$newRole = $_POST["new_Role"];
$username = $_POST["username"];

$sql = "UPDATE user SET userRole='$newRole' WHERE userRole='$oldRole' AND username='$username';";

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
    header("location: /website-dashboard/admin-dashboard.php");
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
?>