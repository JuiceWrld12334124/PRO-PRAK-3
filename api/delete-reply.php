<?php
include './config.php';
$id = $_POST['id'];

$sql = "DELETE FROM post WHERE post.id = $id;";

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
?>