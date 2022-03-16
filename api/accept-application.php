<?php
include './config.php';

$username = $_POST['username'];
var_dump($username);
$sql = "UPDATE user SET accepted = '1' WHERE username = '$username';";

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}

?>