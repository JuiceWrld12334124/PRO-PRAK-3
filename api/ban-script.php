<?php
 include './config.php';
 
$id = $_POST['username'];
$sql = "UPDATE user SET isbanned = '1' WHERE username = '$id';";

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
 
?>