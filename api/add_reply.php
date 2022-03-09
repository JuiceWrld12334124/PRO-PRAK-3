<?php
include 'config.php';
session_start();

$username = $_SESSION['username'];
$reply = $_POST['reply'];
$id_post = $_GET['id'];

$query = "insert into post(username, message, id_parent) values('$username', '$reply', '$id_post')";


$is_success = "reply_fail";
if ($db->query($query) === TRUE){
    $is_success = "reply_success";
}

$is_success = "";
header("location:/website - posts/Posts-Page.php?success=" . $is_success );


?>