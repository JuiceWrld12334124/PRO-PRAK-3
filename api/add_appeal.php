<?php
include 'config.php';
session_start();

$username = $_SESSION['username'];
$message = $_POST['message'];

$row = mysqli_num_rows(mysqli_query($db, "select * from appeals")) + 1;
$query = "insert into appeals(id, username, message, isbanned) values('$row', '$username', '$message', '1')";

$is_success = "post_fail";
if ($db->query($query) === TRUE) {
    $is_success = "post_success";
}

$is_success = "";
header("location: /website-noacces/permban-reaction.php");

?>