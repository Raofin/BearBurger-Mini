<?php
    $user = [
        'username' => '',
        'email' => '',
        'password' => '',
        'cpassword' => '',
        'phone' => '',
        'gender' => '',
    ];

    function register($user)
    {
        $user = array_merge($user, $_POST);
        $isValid = true;
        $invalid = "";

        if (!$user['username'] || strlen($user['username']) < 4 || strlen($user['username']) > 20) {
            $isValid = false;
            $invalid = "$invalid Username,";
        }
        if (!$user['email'] || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $invalid = "$invalid Email Address,";
        }
        if (!$user['password'] || strlen($user['password']) < 4 || strlen($user['password']) > 20) {
            $isValid = false;
            $invalid = "$invalid Password,";
        } else if ($user['password'] !== $user['cpassword']) {
            $isValid = false;
            $invalid = "$invalid Confirm Password,";
        }
        if (filter_var($user['phone'], FILTER_VALIDATE_INT)) {
            $isValid = false;
            $invalid = "$invalid Phone Number,";
        }
        if (!$user['gender']) {
            $isValid = false;
            $invalid = "$invalid Gender,";
        }
        if (!$isValid) {
            $invalidMessage = "Invalid" . substr($invalid, 0, -1) . ".";
            echo "<p style=\"color:tomato;\">$invalidMessage</p>";
        } else createUser($_POST);
    }

    function getUsers()
    {
        return json_decode(file_get_contents('..\userData.json'), true);
    }

    function putJson($users)
    {
        file_put_contents('..\userData.json', json_encode($users, JSON_PRETTY_PRINT));
    }

    function createUser($data)
    {
        $users = getUsers();
        $data['id'] = rand(1000000, 2000000);
        $users[] = $data;
        putJson($users);
        return $data;
    }