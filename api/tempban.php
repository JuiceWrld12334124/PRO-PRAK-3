<?php
 include './config.php';
 
$id = $_POST['username'];
$sql = "UPDATE user SET bannedUntil = DATE_ADD(NOW(), INTERVAL 1 DAY) WHERE username = '$id'";

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
 
?>