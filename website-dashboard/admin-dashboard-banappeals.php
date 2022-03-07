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
  <div class="navbar">
        <div class="container flex">
            <h1 class="logo">Admin - Ban appeals</h1>
            <nav>
            <ul>
                    <?php
                    
                    if (isset($_SESSION["userrole"]))
                    {
                        echo "<li><a href='/website-dashboard/admin-dashboard.php'>Admin panel</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

      
  <div class="area">

  </div>
        <div >
        <?php
            include "../api/config.php";
            $query = "select * from appeals where isbanned=1";
            $posts = mysqli_query($db, $query);
            $num_row = mysqli_num_rows($posts);
            if ( $num_row === 0){
                echo"
                <br>
                <div class=\"container text-center\">
                    <h3>No appeals</h3>
                </div>
                ";
            } else {
                foreach($posts as $post){ 

                    $username = $post["username"];
                    $message = $post["message"];
                    $time = $post["time"];

                    $query = "select * from user where isBanned=1";
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
                            <form action='/api/delete_appeal.php' method='post'>
                            <button class='button-solved' name='username' value='".$post['username']."'>Deny</button>
                            </form>
                            <form action='/api/accept-appeal.php' method='post'>
                            <button class='button-solved' name='username' value='".$post['username']."'>Accept</button>
                            </form>
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


                }
            }
        ?>
    </div>

  </body>
    </html>