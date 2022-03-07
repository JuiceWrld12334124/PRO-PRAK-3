<?php
    session_start();
    $oldrole = $_GET["old_role"];
    include '../api/config.php';
    $user_query = "select * from user";

    $users = mysqli_query($db, $user_query);
    $row = mysqli_fetch_assoc($users); 
    $username = $row["username"];
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

    <section class="review-head bg-primary">
        <div class="container grid grid-1">
            <div class="">
                <form class="form" id="usernamechange" method="post" action="/api/update_role.php"
                    onsubmit="setTimeout(() => {window.location.href = 'admin-dashboard.php'}, 500);" >
                    <h2 class="h2">Assign role</h2>
                    <p class="p" for="e" type="Userrole" >
                        <input required class="input" name="new_Role"
                            placeholder="role" value="<?php echo $oldrole ?>"></input>
                        </p>
                        <input type="hidden" name="oldrole" value="<?php echo $oldrole ?>"> </input>
                        <input required class="input" name="username"
                            placeholder="Verify username" value=""></input>
                        </p>
                    <button class="button2">Versturen</button>
                </form>
                <iframe name="dumb_target" id="dumb_target" style="display: none;"></iframe>
            </div>
        </div>
    </section>

</body>

</html>