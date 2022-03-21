<?php

    if (isset($_COOKIE['RememberedMail'])) {
        unset($_COOKIE['RememberedMail']);
        setcookie('RememberedMail', null, -1, '/');
    }

    session_start();
    session_destroy();

    header("Location: ../View/login.php");
    die();