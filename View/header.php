<?php
    session_start();
    require '../Controller/user.php';
    verifyCookie();
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

<table style="border-collapse: collapse; width: 100%; ">
    <tbody>
    <tr>
        <td><p><a href="home.php"><img src=../img/logo-3.svg alt="Logo"></a></p></td>
        <?php
            if (isset($_SESSION['username'])) {
                echo '
            <h2 style="position:absolute; text-align:center; left:0; right:0; top:30px;">
                <a href="search.php">Search&nbsp;Foods</a>
                <a href="profile.php">View&nbsp;Profile</a>
            </h2>
            <td style="padding-right: 20px;">
                <h2>
                    <p style="text-align: right;">' . $_SESSION['username'] . '<br>
                        <a href="../Controller/logout.php">Sign&nbsp;out</a></p>
                </h2>
            </td>';
            }
        ?>
    </tr>
    </tbody>
</table>

<hr>