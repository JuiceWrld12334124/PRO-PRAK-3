<?php
include './config.php';

$username = $_POST['username'];
$sql = "UPDATE user SET isbanned = '0' WHERE username = '$username';";

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
?>