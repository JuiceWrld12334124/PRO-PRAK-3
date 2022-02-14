<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

echo $username;

$query = "select * from user where username='$username' and password='$password'";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);

if ($count > 0){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:/index.php");
} else {
    header("location:/index.php?success=login_fail" );
}

?>