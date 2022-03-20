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
        } else createUser();
    }

    function createUser()
    {
        $data = $_POST;
        $users = readJson('users.json');
        if ($users == null) $data['id'] = 1;
        else {
            date_default_timezone_set("Asia/Dhaka");
            $data['joined'] = date('d-m-Y, h:i A');
            $data['id'] = $users[count($users) - 1]['id'] + 1;
        }
        unset($data['cpassword']);
        $users[] = $data;
        writeJson($users, 'users.json');

        $_SESSION['regSuccess'] = true;
        header("location: register.php");
    }