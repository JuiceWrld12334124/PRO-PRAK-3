<?php
    session_start();
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
                <h1 class="text-center xl">Moderator - Users</h1>
            </div>
            <img src="./img/programming-code.svg" alt="">
        </div>
    </section>
      
  <div class="area">
      

  </div>
  
  <nav class="main-menu">
            <ul>
                <li>
                    <a href="./moderator-dashboard.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Users
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="./moderator-dashboard-postpage.php">
                        <i class="fa fa-clone fa-2x"></i>
                        <span class="nav-text">
                            Posts
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

        <?php
            include "/xampp/htdocs/api/config.php";
                $user_query = "select * from user";
                $users = mysqli_query($db, $user_query);
                $row = mysqli_fetch_assoc($users); 
            if ($row === 0){
                echo"
                <br>
                <div class=\"container text-center\">
                    <h3>No Posts Available</h3>
                </div>
                ";
            } 
            else {
                foreach($users as $post){ 
                    $username = $post['username'];
                    $userrol = $post['userRole'];
                    echo "
                    <section class='card-header-admin'>
                    <div class=\"container\">
                    <b>username:</b> $username
                    <div>
                    <b>Role:</b> $userrol
                    </div>
                    <form class='container grid grid-2' action='./admin-update-users.php' method='get'>
                    <button class='button-solved ' name='old_username' value='".$post['username']."'>Update Username</button>
                    </form>
                    <form class='container grid grid-2' action='/api/tempban.php' method='post'>
                    <button class='button-solved ' name='username' value='".$post['username']."'>Time-out user</button>
                    </form>
                    </div>
                    </section>
                    ";

                }
                
            }
            
        ?>

  </body>
    </html>