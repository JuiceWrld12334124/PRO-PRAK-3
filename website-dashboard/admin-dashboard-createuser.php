<?php
session_start();
if ($_SESSION['userrole'] != "admin") {
    header("location:../index.php");
}
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

<div class="area">


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

<section class="review-head ">
    <div class="container grid grid-1">
        <div class="">
            <form class="form-loginPage"
                  id="review_submit" method="post" action="/api/register-script.php"
                  onsubmit="return passwordValidation(); window.location.reload()">
                <h2 class="h2">Create user</h2>
                <div class="form-control">
                    <p class="p" for="username" type="Naam:"><input required class="input" name="username"
                                                                    placeholder="Gebruikersnaam"></input></p>
                </div>
                <div class="form-control">
                    <p class="p" for="password" type="Wachtwoord"><input type="password" required class="input"
                                                                         name="password"
                                                                         placeholder="Wachtwoord"></input></p>
                </div>
                <div class="form-control">
                    <p class="p" for="password" type="Opnieuw wachtwoord"><input type="password"
                                                                                 name="password_confirmation" required
                                                                                 class="input" name="password"
                                                                                 placeholder="Wachtwoord"></input></p>
                </div>
                <button class="button2" name="submit">Create</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>