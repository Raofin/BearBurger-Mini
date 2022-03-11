<?php
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: contents/home.php");
        die();
    }

    header("Location: contents/login.php");
    die();