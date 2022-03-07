<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = " SELECT * FROM user WHERE username='$username' and password='$password' ";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$banned_query = "SELECT 1 FROM user WHERE bannedUntil > NOW() AND username ='$username'; ";
$banned_result = mysqli_query($db, $banned_query);
$count_banned = mysqli_num_rows($banned_result);
$banrow = mysqli_fetch_row($banned_result);



if ($count > 0){
    if ($row['userRole'] === 'admin') 
    { 
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['userrole'] = "admin";
        header("location:/index.php" );
    }
    elseif($row['userRole'] == "moderator")
    {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['moderator'] = "moderator";
        header("location:/index.php" );
    }
    elseif ($row['userRole'] != 'admin')
    {
        session_start();
        if ($row["isbanned"] == "1")
        {
            $_SESSION['username'] = $username;
            header("location: /website-noacces/permban-noacces.php");
        }
        elseif ($count_banned == 1)
        {
            header("location: /website-noacces/tempban-noacces.php");
        }
        else
        {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location:/index.php");
        }
    }
    
} else {
    header("location:/index.php?success=login_fail" );
}


?>