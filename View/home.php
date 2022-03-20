<?php
    require 'header.php';
    require '../Controller/loadFoods.php';

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
        die();
    }
?>
    <h1 style="text-align: center;">Order Your Favourite Foods!</h1>


<?php
    loadFoods();
?>