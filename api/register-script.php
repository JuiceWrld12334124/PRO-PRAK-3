<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = "insert into user(username, password, accepted) values('$username', '$password', 0)";
$is_success = "register_fail";
if ($db->query($query) === TRUE){
    $is_success = "register_success"; 
}

header("location:../index.php?success=" . $is_success );

?>