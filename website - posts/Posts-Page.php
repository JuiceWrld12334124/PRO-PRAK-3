<?php
    session_start();
    if($_SESSION['status'] !="login"){
        header("location: /website-login/Login-Page.php ");
    }
    error_reporting(E_ERROR | E_PARSE);
    $uid = $_GET['username'];
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
            <nav class="">
            <ul>
                    <?php
                    
                    if (isset($_SESSION["userrole"]))
                    {
                        echo "<li><a href='/index.php'>Home</a></li>";
                        echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                        echo "<li><a href='/api/logout.php'>Logout</a></li>";
                        echo "<li><a href='/website-dashboard/admin-dashboard.php'>Admin panel</a></li>";
                    }
                    elseif (isset($_SESSION["moderator"])) {
                        echo "<li><a href='/index.php'>Home</a></li>";
                        echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                        echo "<li><a href='/api/logout.php'>Logout</a></li>";
                        echo "<li><a href='/website-dashboard/moderator/moderator-dashboard.php'>Moderator Panel</a></li>";
                        }
                    elseif (isset($_SESSION["username"])) {
                        echo "<li><a href='/index.php'>Home</a></li>";
                        echo "<li><a href='/website - posts/Posts-Page.php'>Posts</a></li>";
                        echo "<li><a href='/website-dashboard/user/userDashboard.php'>Profile</a></li>";
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
                <h1 class="xl">Forum</h1>
                <p class="lead">
                    Heb jij een vraag? Stel het!
                </p>

            </div>
            <img src="./img/programming-code.svg" alt="">
        </div>
    </section>

    <div class="container grid grid-1">
        <button class="button2"> <a href="postCreate.php">Maak een post</a> </button>
    </div>

    <div>
        <?php
            include "../api/config.php";
            $query = "select * from post where id=id_parent order by time desc";
            $posts = mysqli_query($db, $query);
            $num_row = mysqli_num_rows($posts);
            if ( $num_row === 0){
                echo"
                <br>
                <div class=\"container text-center\">
                    <h3>No Posts Available</h3>
                </div>
                ";
            } else {
                foreach($posts as $post){ 

                    $id = (int)$post["id"];
                    $username = $post["username"];
                    $message = $post["message"];
                    $time = $post["time"];
                    $fc = $username[0];

                    $reply_query = "select * from post where id_parent<>id and id_parent=$id";
                    $replys = mysqli_query($db, $reply_query);
                    $row = mysqli_fetch_assoc($replys); 

                    $query = "select * from user";
                    $users = mysqli_query($db, $query);
                    $userrow = mysqli_num_rows($users);

                    $state = 'Thread Starter';
                    $cardstate = "card";
                    $color = ' ';
                    
                    if($row['resolved'] == "1")
                    {
                        $Answer = "Answer";
                        $state = "solved";
                        $cardstate = "card-solved";
                    }

                
                    echo "
                    <div class=\"container grid grid-1\">
                        <div class=\"container-fluid mt-100\">
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"$cardstate mb-4\">
                                        <div class=\"card-header\">
                                            <div class=\"\"> 
                                                <div data-letters=\"$fc\" class=\"\"></div>
                                                <div class=\"media-body ml-3\"> <a class='super-a' href=\"javascript:void(0)\" data-abc=\"true\">$state</a>
                                                <a>$username</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"card-body\">
                                            <p class='font-b'> 
                                                $message
                                            </p>
                                        </div>
                                        <div class=\"card-footer actionBox\">
                    ";


                    $reply_query = "select * from post where id_parent<>id and id_parent=$id";
                    
                    $replys = mysqli_query($db, $reply_query);
                   while( $row = mysqli_fetch_assoc($replys)) {

                       $username = $row["username"];
                        $message = $row["message"];
                        $time = $row["time"];
                        $fc = $username[0];
                        $Answer = '';

                        $resolvedColor = '';
                        if ($row['resolved'] == "1")
                        {
                            $resolvedColor = "resolved";
                            $Answer = "Answer";
                        }
                        if (isset($_SESSION['userrole']))
                        {
                            echo "
                            <!-- <h6>Comments :</h6> -->
                            <ul class=\"commentList\">
                            
                                <li class=\"$resolvedColor\">
                                    <div class=\"commenterImage\">
                                        <p data-letters=\"$fc\"></p>
                                    </div>
                                    <div class=\"commentText\">
                                        <h3 class='  $Answer'><b>$Answer</b></h3>
                                        <p><b>$username</b></p>
                                        <p class=\"\">$message</p> <span class=\"date sub-text\">$time</span>
                                    </div>
                                    <section class='flex-card-'>                                    
                                    <form action='/api/resolved-script.php' method='post'>
                                    <button class='button-solved' name='id' value='" .$row['id']. "'>Solved</button>
                                    </form>
                                    <form action='/api/unresolved.php' method='post'>
                                    <button class='button-solved' name='id' value='".$row['id']. "'>Unmark</button>
                                    </form>
                                    <form action='/api/delete-reply.php' method='post'>
                                    <button class='button-solved' name='id' value='".$row['id']. "'>Delete</button>
                                    </form>
                                    </section>
                                </li>
                            </ul>
                        ";
                        }
                        else
                        {
                            echo "
                            <!-- <h6>Comments :</h6> -->
                            <ul class=\"commentList\">
                            
                                <li class=\"$resolvedColor\">
                                    <div class=\"commenterImage\">
                                        <p data-letters=\"$fc\"></p>
                                    </div>
                                    <div class=\"commentText\">
                                        <h3 class='  $Answer'><b>$Answer</b></h3>
                                        <p><b>$username</b></p>
                                        <p class=\"\">$message</p> <span class=\"date sub-text\">$time</span>
                                    </div>
                                    <section class='flex-card-'>                                    
                                    </section>
                                </li>
                            </ul>
                        ";
                        }

                   }
                    // foreach ($replys as $reply) {

                    //     // var_dump($replys);
                    //     // echo '<hr>';
                    //     // var_dump($row);
                    //     $username = $reply["username"];
                    //     $message = $reply["message"];
                    //     $time = $reply["time"];
                    //     $fc = $username[0];

                    //     $resolvedColor = '';
                    //     if ($reply['resolved'] == "1")
                    //     {
                    //         $resolvedColor = "resolved";
                    //     }

                    //     echo "
                    //         <!-- <h6>Comments :</h6> -->
                    //         <ul class=\"commentList\">
                    //             <li class=\"$resolvedColor\">
                    //                 <div class=\"commenterImage\">
                    //                     <p data-letters=\"$fc\"></p>
                    //                 </div>
                    //                 <div class=\"commentText\">
                    //                     <p><b>$username</b></p>
                    //                     <p class=\"\">$message</p> <span class=\"date sub-text\">$time</span>
                    //                 </div>
                    //             </li>
                    //         </ul>
                    //     ";
                    //  }

                    echo "
                                            <form action=\"/api/add_reply.php?id=$id\" class=\"form-inline\" role=\"form\" id=\"reply$id\" method=\"POST\">
                                                <div class=\"container grid grid-1\">
                                                    <input class=\"\" name=\"reply\" type=\"text\" placeholder=\"Beantwoord\" required/>
                                                </div>
                                                <div class=\"container grid grid-1\">
                                                    <button class=\"button2\" for=\"reply$id\">Add</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
            }
        ?>
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

<script src="/script/script.js"></script>



<?php //foreach(1 > 2){ ?>
    <div><?//= '';?></div>
<?php // } ?>

</html>