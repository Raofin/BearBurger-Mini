<?php

    function register()
    {
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

        $isValid = true;
        $errorMessage = "";

        $user = array_merge($user, $_POST);

        if (!$user['username'] || strlen($user['username']) < 4 || strlen($user['username']) > 20) {
            $isValid = false;
            $errorMessage = "$errorMessage Username,";
        }
        if (!$user['email'] || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $errorMessage = "$errorMessage Email Address,";
        }
        if (!$user['password'] || strlen($user['password']) < 4 || strlen($user['password']) > 20) {
            $isValid = false;
            $errorMessage = "$errorMessage Password,";
        } else if ($user['password'] !== $user['cpassword']) {
            $isValid = false;
            $errorMessage = "$errorMessage Confirm Password,";
        }
        if (!is_numeric($user['phone'])) {
            $isValid = false;
            $errorMessage = "$errorMessage Phone Number,";
        }
        if (!$user['gender']) {
            $isValid = false;
            $errorMessage = "$errorMessage Gender,";
        }
        if (!$isValid) {
            $invalidMessage = "Invalid" . substr($errorMessage, 0, -1) . ".";
            echo "<p style=\"color:tomato;\">$invalidMessage</p>";
        } else createUser($_POST);
    }

    function createUser($data)
    {
        $users = readJson();
        if ($users == null) $data['id'] = 1;
        else {
            date_default_timezone_set("Asia/Dhaka");
            $data['joined'] = date('d-m-Y, h:i a');
            $data['id'] = $users[count($users) - 1]['id'] + 1;
        }
        unset($data['cpassword']);
        $users[] = $data;
        writeJson($users);
        return $data;
    }

    function readJson()
    {
        return json_decode(file_get_contents('..\userData.json'), true);
    }

    function writeJson($users)
    {
        file_put_contents('..\userData.json', json_encode($users, JSON_PRETTY_PRINT));
    }

    function login($email, $password)
    {
        $users = readJson();
        $success = false;
        foreach ($users as $item) {
            if ($email === $item['email'] && $password === $item['password']) {
                $_SESSION['username'] = $item['username'];
                $_SESSION['email'] = $item['email'];
                $_SESSION['password'] = $item['password'];
                $_SESSION['phone'] = $item['phone'];
                $_SESSION['gender'] = $item['gender'];
                $_SESSION['joined'] = $item['joined'];
                $_SESSION['id'] = $item['id'];
                header("Location: home.php");
                die();
            }
        }
        if (!$success) echo "<p style=\"color:tomato;\">Invalid email or password. Please try again.</p>";
    }

    function recover($email)
    {
        $users = readJson();
        foreach ($users as $item) {
            if ($email === $item['email']) {
                echo "
                <h3 style=\"color:forestgreen;\">Your account has been successfully recovered.</h3>
                            <p style=\"font-size:130%;\">
                                <b>Username: </b>{$item['username']}<br>
                                <b>Password: </b>{$item['password']}
                            </p>";
            } else echo "<p style=\"color:tomato;\">Invalid email or password. Please try again.</p>";
        }
    }

    function update($previousEmail, $username, $email, $password, $phone)
    {
        $users = readJson();
        foreach ($users as &$item) {
            if ($previousEmail === $item['email']) {
                $item['username'] = $username;
                $item['email'] = $email;
                $item['password'] = $password;
                $item['phone'] = $phone;
                writeJson($users);
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['phone'] = $phone;

                header("location: profile.php");
                die();
            }
        }

    }