<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/Framework.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<section class="overons-head bg-primary">
    <div class="container grid grid-1 absolute">
        <div>
            <h1 class="text-center xl">Admin - users</h1>
        </div>
        <img src="./img/programming-code.svg" alt="">
    </div>
</section>


</div>

<nav class="main-menu">
    <ul>
        <li>
            <a href="./admin-dashboard.php">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                            Users
                        </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="./admin-postpage.php">
                <i class="fa fa-clone fa-2x"></i>
                <span class="nav-text">
                            Posts
                        </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="./admin-dashboard-update-roles.php">
                <i class="fa fa-list fa-2x"></i>
                <span class="nav-text">
                            Roles
                        </span>
            </a>

        </li>

        <li class="has-subnav">
            <a href="./admin-dashboard-banappeals.php">
                <i class="fa fa-ban fa-2x"></i>
                <span class="nav-text">
                            Ban appeals
                        </span>
            </a>
        </li>

        <li class="has-subnav">
            <a href="./admin-dashboard-createuser.php">
                <i class="fa fa-plus fa-2x"></i>
                <span class="nav-text">
                            Create user
                        </span>
            </a>
        </li>

        <li class="has-subnav">
            <a href="./admin-acceptuser.php">
                <i class="fa fa-user-plus fa-2x"></i>
                <span class="nav-text">
                            Applications
                        </span>
            </a>
        </li>

    </ul>

    <ul class="logout">
        <li>
            <a href="/api/logout.php">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                            Logout
                        </span>
            </a>
        </li>
    </ul>
</nav>
</div>
<div>
    <?php
    include "../api/config.php";
    $user_query = "select * from user WHERE accepted<>1";
    $users = mysqli_query($db, $user_query);
    $row = mysqli_fetch_assoc($users);
    if ($row === 0) {
        echo "
                <br>
                <div class=\"container text-center\">
                    <h3>No Posts Available</h3>
                </div>
                ";
    } else {
        foreach ($users as $post) {
            $username = $post['username'];
            $userrol = $post['userRole'];
            echo "
                    <section class='card-header-admin'>
                    <div class=\"container\">
                    <b>username:</b> $username
                    <form class='container grid' action='/api/accept-application.php' method='post'>
                    <button class='button-solved ' name='username' value='" . $post['username'] . "'>accept application</button>
                    </form>
                    <form class='container grid grid-2' action='/api/deny-application.php' method='post'>
                    <button class='button-solved ' name='username' value='" . $post['username'] . "'>Deny application</button>
                    </form>
                    </div>
                    </section>
                    ";
        }
    }
    ?>
</div>

</body>
</html>