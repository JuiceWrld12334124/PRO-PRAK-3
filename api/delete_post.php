<?php
include './config.php';
$id = $_POST['id_parent'];

$sql = "DELETE FROM post WHERE id_parent = $id;";

if(mysqli_query($db, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $db. " . mysqli_error($db);
}
?>