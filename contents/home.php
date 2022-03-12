<?php
    include 'header.php';

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
        die();
    }

    echo "Home Page";
    include 'footer.php';