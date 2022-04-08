<?php
    require 'header.php';
    require '../Controller/loadFoods.php';

    verifyNotLoggedIn();
    loadFoods();

    require 'footer.php';
