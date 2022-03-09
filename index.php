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
        <h1 class="logo"><a href="./index.php">Microhard</a></h1>
        <nav>
            <ul>
                <?php
                if (isset($_SESSION["userrole"])) {
                    echo "<li><a href='/index.php'>Home</a></li>";
                    echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                    echo "<li><a href='/api/logout.php'>Logout</a></li>";
                    echo "<li><a href='/website-dashboard/admin-dashboard.php'>Admin panel</a></li>";
                } elseif (isset($_SESSION["moderator"])) {
                    echo "<li><a href='/index.php'>Home</a></li>";
                    echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                    echo "<li><a href='/api/logout.php'>Logout</a></li>";
                    echo "<li><a href='/website-dashboard/moderator/moderator-dashboard.php'>Moderator Panel</a></li>";
                } elseif (isset($_SESSION["username"])) {
                    echo "<li><a href='index.php'>Home</a></li>";
                    echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                    echo "<li><a href='/website-dashboard/user/userDashboard.php'>Profile</a></li>";
                    echo "<li><a href='/api/logout.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='index.php'>Home</a></li>";
                    echo "<li><a class='Login-navbar' href='/website-login/Login-Page.php'>Login</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

<!--De hoof(onder de navbar het blokje)-->
<section class="overons-head bg-primary py-8">
    <div class="container grid">
        <div>
            <h1 class="xl">Voor al je software vragen</h1>
            <p class="lead">
                Heeft u vragen? Of wilt u meer weten dan bent u op de juiste plek!
            </p>
        </div>
        <img src="./img/image-blog-future-software-development.png" alt="">
    </div>
</section>


<section class="openingstijde">
    <h2 class="md text-center my-2">
        Wat kan ik allemaal doen?
    </h2>
    <div class="container grid grid-3 cardflex">
        <div class="index-card">
            <img class="blank" src="./img/DA-Icon1.png" alt="">
            <h4>Support</h4>
            <p>Heb je vragen? Dan kunnen die beantwoord worden</p>
        </div>
        <div class="index-card">
            <img class="blank" src="./img/softaculous-1.png" alt="">
            <h4>Sources</h4>
            <p>Wil je een hub, voor source downloads net zoals github? Dan ben je op de juiste plek!</p>
        </div>
        <div class="index-card">
            <img class="blank" src="./img/Red-icon.png" alt="">
            <h4>Privacy</h4>
            <p>Je gevevens en posts worden met top niveau software beveiligd.</p>

        </div>
    </div>
</section>


<section class="overons-sub-head bg-light py-4 landing-head">
    <div class="container grid">
        <div>
            <h1 class="lg white">Gewoon de beste forum!</h1>
            <p class="lead white">
                Blijven uw vragen onbeantwoord en loopt u vast? Dan zullen onze experts u helpen!
            </p>
            <a href="./website - posts/Posts-Page.php" class="btn btn-primary">Posts</a>
        </div>

    </div>
</section>

<section class="openingstijde p-3">
    <h2 class="md text-center my-2">
        Welke programmeer talen raad jij mij aan?
    </h2>
    <div class="container grid grid-3 cardflex">
        <div class="text-center">
            <img class=" card blank" src="./img/csharp.png" alt="">
            <h4>C#</h4>
            <p>C# of C-Sharp is de programmeertaal achter .NET (dotnet) en het Unity framework. Het is bij Microsoft
                gemaakt als een C-achtige objectgeoriënteerde taal en wordt gebruikt om apps te bouwen voor het web,
                desktop, mobiel en meer.</p>
            <a href="https://docs.microsoft.com/en-us/dotnet/csharp/" class="btn btn-primary">Docs</a>
        </div>
        <div class="text-center">
            <img class="blank card" src="./img/php.png" alt="">
            <h4>PHP</h4>
            <p>PHP Hypertext Preprocessor is een scripttaal voor het bouwen van dynamische websites op de server. Het
                blijft een van de meest populaire programmeertalen ter wereld en ondersteunt tools zoals Wordpress,
                Laravel en Symfony</p>
            <a href="https://www.php.net/docs.php" class="btn btn-primary">Docs</a>
        </div>
        <div class="text-center">
            <img class="blank card" src="./img/node.png" alt="">
            <h4>Node.Js</h4>
            <p>Nest is een progressief framework voor het bouwen van server-side applicaties en API's met Node.js. Het
                maakt gebruik van TypeScript en een krachtige CLI om betrouwbare apps snel te verzenden</p>
            <a href="https://nodejs.org/en/docs/" class="btn btn-primary">Docs</a>
        </div>
    </div>
</section>

<section class="openingstijde bg-light p-3">
    <div class="container grid grid-3 cardflex">
        <div class="">
            <h3>Wat zijn tools?</h3>
            <p class="arfon">Een programmeertool of softwareontwikkelingstool is een computerprogramma dat softwareontwikkelaars gebruiken om andere programma's en applicaties te maken, te debuggen, te onderhouden of anderszins te ondersteunen. De term verwijst meestal naar relatief eenvoudige programma's die kunnen worden gecombineerd om een ​​taak uit te voeren, net zoals men meerdere handen zou kunnen gebruiken om een ​​fysiek object te repareren.</p>
        </div>
        <div class="container grid news-card text-center">
            <img class="blank-image" src="./img/recharge.png">
        </div>
    </div>
</section>

<footer class="footer bg-dark py-5">
    <div class="container grid grid-2">
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
<script src="./script/script.js"></script>

</html>