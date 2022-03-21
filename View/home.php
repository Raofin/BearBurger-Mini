<?php
    require 'header.php';
    require '../Controller/loadFoods.php';

    verifyLoggedIn();
    loadFoods();

    require 'footer.php';
