<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Microhard</title>
</head>

<body>

<div class="navbar sticky">
        <div class="container flex">
            <h1 class="logo">Microhard</h1>
            <nav>
                <ul>
                    <?php
                    if (isset($_SESSION["username"])) {
                    echo "<li><a href='index.php'>Home</a></li>";
                    echo "<li><a href='logout.php'>Logout</a></li>";
                    }
                    else
                    {
                        echo "<li><a href='index.php'>Home</a></li>";
                        echo "<li><a class='Login-navbar' href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>


    <section class="review-head bg-primary">
        <div class="container grid grid-2">
            <div>
                <h1 class="xl">Registreren</h1>
                <p class="lead">
                    Vul je informatie om te Registreren.
                </p>
            </div>
            <div class="">
                <form class="form" 
            id="review_submit" method="post" action="/api/registerscript.php"
                  onsubmit="window.location.reload()">
                <h2 class="h2">Registratie</h2>
                <div class="form-control">
                    <p class="p" for="username" type="Naam:"><input required class="input" name="username" placeholder="naam"></input></p>
                </div>
                <div class="form-control">
                    <p class="p" for="pswd" type="wachtwoord:"><input required class="input" name="password" placeholder="Wachtwoord"></input></p>
                </div>
                <button class="button2" name="submit" >Registreren</button>
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