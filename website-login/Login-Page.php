<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Microhard</title>
</head>

<body>

<div class="navbar sticky">
        <div class="container flex">
            <h1 class="logo">Microhard</h1>
            <nav>
            <ul>
                    <?php
                    
                    if (isset($_SESSION["userrole"]))
                    {
                        echo "<li><a href='/index.php'>Home</a></li>";
                        echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                        echo "<li><a href='/api/logout.php'>Logout</a></li>";
                        echo "<li><a href='/api/logout.php'>Admin panel</a></li>";
                    }
                    elseif (isset($_SESSION["username"])) {
                        echo "<li><a href='index.php'>Home</a></li>";
                        echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                        echo "<li><a href='/api/logout.php'>Logout</a></li>";
                        }
                    else
                    {
                        echo "<li><a href='/index.php'>Home</a></li>";
                        echo "<li><a class='Login-navbar' href='/website-login/Login-Page.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

    <?php
        if (array_key_exists("success", $_GET)){
            $success = $_GET["success"];
        } else {
            $success = "";
        }
        if ($success === "Register_success"){
            echo "<script>alert('Register success.')</script>";
        } else if ($success === "register_fail"){
            echo "<script>alert('Register fail')</script>";
        } else if ($success === "login_fail"){
            echo "<script>alert('Wrong username or password.')</script>";
        }
    ?>


    <section class="review-head bg-primary">
        <div class="container grid grid-1">
            <div class="">
                <form class="form-loginPage" 
            id="review_submit" method="post" action="/api/login-script.php"
                  onsubmit="window.location.reload()">
                <h2 class="h2">Login</h2>
                <div class="form-control">
                    <p class="p" for="username" type="Naam:"><input required class="input" name="username" placeholder="Gebruikersnaam"></input></p>
                </div>
                <div class="form-control">
                    <p class="p" for="password" type="Wachtwoord:"><input type="password" required class="input" name="password" placeholder="Wachtwoord"></input></p>
                </div>
                <button class="button2" name="submit" >Inloggen</button>
                <button class="button2"> <a href="/website - register/registerPage.php">Register here.</a> </button>
            </form>
            </div>
        </div>
    </section>

    <footer class="footer bg-dark py-5">
        <div class="container grid grid-3">
            <div>
                <h1>Microhard
                </h1>
                <p>Copyright &copy; 2022</p>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="overons.php">About us</a></li>
                    <li><a href="reviews.php">Score</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>