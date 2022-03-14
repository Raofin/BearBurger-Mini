<?php
    function readJson()
    {
        return json_decode(file_get_contents(__DIR__ . '/../model/users.json'), true);
    }

    function writeJson($users)
    {
        file_put_contents(__DIR__ . '/../model/users.json', json_encode($users, JSON_PRETTY_PRINT));
    }