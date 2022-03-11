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
        if (filter_var($user['phone'], FILTER_VALIDATE_INT)) {
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
        else $data['id'] = $users[count($users) - 1]['id'] + 1;
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
        foreach ($users as $item) {
            if ($email === $item['email'] && $password === $item['password']) {
                $_SESSION['username'] = $item['username'];
                $_SESSION['email'] = $item['email'];
                header("Location: home.php");
                die();
            } else echo "<p style=\"color:tomato;\">Invalid email or password. Please try again.</p>";
        }
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