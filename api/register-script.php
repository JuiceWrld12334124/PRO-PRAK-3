<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

echo $username;


$query = "insert into user(username, password) values('$username', '$password')";
$is_success = "register_fail";
if ($db->query($query) === TRUE){
    $is_success = "register_success"; 
}

header("location:../index.php?success=" . $is_success );

?>