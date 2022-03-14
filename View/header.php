<?php
    session_start();
    require '../Controller/user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BearBurger</title>
</head>

</html>

<body>

<div style="padding: 20px 20px 5px 20px">
    <a href="home.php"><img src=../img/logo-3.svg alt="Logo"></a>
    <?php if (isset($_SESSION['username'])) {
        echo "<h2 style=\"float: right; padding-right: 20px\">
                <a href='profile.php'>{$_SESSION['username']}</a>
                <a href=\"../Controller/logout.php\">Logout</a>
            </h2>";
    } ?>
</div>
<hr>