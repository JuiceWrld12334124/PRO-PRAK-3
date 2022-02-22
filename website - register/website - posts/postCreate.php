<?php
    session_start();
        
    if($_SESSION['status'] !="login"){
        header("location:../index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/Framework.css">
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
                <h1 class="xl">Post plaatsen</h1>
                <p class="lead">
                    Typ hier je post
                </p>

            </div>
            <img src="./img/programming-code.svg" alt="">
        </div>
    </section>
    <h3 class="text-center" >Een post toevoegen:</h3>

    <div class="container">
        <div class="text-center">
            <form action="/api/add_post.php" class="form-group" id="post" method="POST" onsubmit="return validatePost()">
                <textarea name="message" class="form-control" id="message" cols="30" rows="7"></textarea>
                <br>
                <input class="btn btn-lg btn-primary " type="submit" form="post" value="Add">
            </form>
        </div>
    </div>
</body>
<script type = "text/javascript">
    function validatePost(){
        var message = document.getElementById("message").value;
        if (message != "" ){
            return true;
        } else {
            alert('Error: Post cannot be empty');
            return false;
        }
    }
</script>

</html>