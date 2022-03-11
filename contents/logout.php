<?php
    $user = [
        'username' => '',
        'email' => '',
        'password' => '',
        'cpassword' => '',
        'phone' => '',
        'gender' => '',
        'joined' => '',
        'id' => '',
    ];
    
    header("Location: login.php");
    session_start();
    session_destroy();
    die();