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
  <div class="navbar sticky">
        <div class="container flex">
            <h1 class="logo">Admin - Posts</h1>
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
                    $id_parent = (int)$post['id_parent'];
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
                            <form action='/api/delete_post.php' method='post'>
                            <button class='button-solved' name='id_parent' value='".$id_parent."'>Delete Post</button>
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
                                    <button class='button-solved' name='id' value='" .$row['id']. "'>Mark as solved</button>
                                    </form>
                                    <form action='/api/unresolved.php' method='post'>
                                    <button class='button-solved' name='id' value='".$row['id']. "'>Unmark</button>
                                    </form>
                                    <form action='/api/delete-reply.php' method='post'>
                                    <button class='button-solved' name='id' value='".$row['id']. "'>delete</button>
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
<script src="/script/script.js"></script>
    </html>