<?php
    session_start();
    include 'users.php'
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
    <img src=../img/logo-3.svg alt="Logo">
    <?php if (isset($_SESSION['username'])) {
        echo "<h2 style=\"float: right; padding-right: 20px\">
            {$_SESSION['username']} <a href=\"logout.php\">Logout</a>
            </h2>";} ?>
</div>
<hr>

