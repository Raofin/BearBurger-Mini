<?php
    require '../Controller/jsonReadWrite.php';

    function login()
    {
        $users = readJson('users.json');
        foreach ($users as $item) {
            if ($_POST['email'] === $item['email'] && $_POST['password'] === $item['password']) {
                $_SESSION['username'] = $item['username'];
                $_SESSION['email'] = $item['email'];
                $_SESSION['password'] = $item['password'];
                $_SESSION['phone'] = $item['phone'];
                $_SESSION['gender'] = $item['gender'];
                $_SESSION['joined'] = $item['joined'];
                $_SESSION['id'] = $item['id'];
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