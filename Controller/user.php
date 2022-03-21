<?php
    require '../Controller/jsonReadWrite.php';

    function loadProfile($item)
    {
        $_SESSION['username'] = $item['username'];
        $_SESSION['email'] = $item['email'];
        $_SESSION['password'] = $item['password'];
        $_SESSION['phone'] = $item['phone'];
        $_SESSION['gender'] = $item['gender'];
        $_SESSION['joined'] = $item['joined'];
        $_SESSION['id'] = $item['id'];
    }

    function login()
    {
        $users = readJson('users.json');
        foreach ($users as $item) {
            if ($_POST['email'] === $item['email'] && $_POST['password'] === $item['password']) {
                loadProfile($item);
                if (isset($_POST['remember']))
                    setcookie("RememberedMail", $_POST['email'], time() + (86400 * 30), "/");

                header("Location: ../View/home.php");
                die();
            }
        }
        echo "<p style=\"color:tomato;\">Invalid email or password. Please try again.</p>";
    }

    function recover()
    {
        $users = readJson('users.json');
        foreach ($users as $item) {
            if ($_POST['email'] === $item['email']) {
                echo "<h3 style=\"color:forestgreen;\">Your account has been successfully recovered.</h3>
                            <p style=\"font-size:130%;\">
                                <b>Username: </b>{$item['username']}<br>
                                <b>Password: </b>{$item['password']}<br>
                                <b>Email: </b>{$item['email']}
                            </p>";
                return;
            }
        }
        echo "<p style=\"color:tomato;\">Invalid email or password. Please try again.</p>";
    }

    function update()
    {
        foreach ($_POST as $item) {
            if ($item === '') {
                echo '<h3 style="color:tomato;">Please fill out all the fields properly.</h3>';
                return;
            }
        }

        $users = readJson('users.json');
        foreach ($users as &$item) {
            if ($_SESSION['email'] === $item['email']) {
                $item['username'] = $_POST['username'];
                $item['email'] = $_POST['email'];
                $item['password'] = $_POST['password'];
                $item['phone'] = $_POST['phone'];
                writeJson($users, 'users.json');
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['phone'] = $_POST['phone'];

                header("location: ../View/profile.php");
                die();
            }
        }
    }

    function verifyCookie()
    {
        if (isset($_COOKIE["RememberedMail"]) && !isset($_SESSION['username'])) {
            $users = readJson('users.json');
            foreach ($users as $item) {
                if ($_COOKIE["RememberedMail"] === $item['email']) {
                    loadProfile($item);
                    break;
                }
            }
        }
    }

    function verifyLoggedIn()
    {
        if (!isset($_SESSION['username']) && !isset($_COOKIE["RememberedMail"])) {
            header("location: login.php");
            die();
        }
    }