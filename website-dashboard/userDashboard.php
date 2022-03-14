<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Framework.css">
    <title>Document</title>
</head>
    <!--nav-bar-->
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
                        echo "<li><a href='index.php'>Home</a></li>";
                        echo "<li><a class='Login-navbar' href='/website-login/Login-Page.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <!--De hoof(onder de navbar het blokje)-->
    <section class="overons-head bg-primary py-5">
        <div class="container grid">
            <div>
                <h1 class="xl">Software Forum</h1>
                <p class="lead">
                    Voor vragen rondom Software Development
                </p>

            </div>
            <img src="./img/programming-code.svg" alt="">
        </div>
    </section>






</body>

</html>