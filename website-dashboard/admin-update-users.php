<?php
    session_start();
    $username = $_GET["old_username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Escape Room</title>
</head>

<body>

    <section class="review-head bg-primary">
        <div class="container grid grid-1">
            <div class="">
                <form class="form" id="usernamechange" method="post" action="/api/update_user.php"
                    onsubmit="setTimeout(() => {window.location.href = 'admin-dashboard.php'}, 500);" >
                    <h2 class="h2">Update username</h2>
                    <p class="p" for="e" type="Username" >
                        <input required class="input" name="new_username"
                            placeholder="name" value="<?php echo $username ?>"></input>
                        </p>
                        <input type="hidden" name="old_username"  value="<?php echo $username ?>"> </input>
                    <button class="button2">Versturen</button>
                </form>
                <iframe name="dumb_target" id="dumb_target" style="display: none;"></iframe>
            </div>
        </div>
    </section>

</body>

</html>