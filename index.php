<?php
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: view/home.php");
        die();
    }

    header("Location: view/login.php");
    die();