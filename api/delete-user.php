<?php
include './config.php';
$username = $_POST["username"];

$sql = "DELETE FROM `user` WHERE username = '$username'";
var_dump($sql);

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
?>