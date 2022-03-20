<?php
    function readJson($json)
    {
        return json_decode(file_get_contents(__DIR__ . '/../model/' . $json), true);
    }

    function writeJson($users, $json)
    {
        file_put_contents(__DIR__ . '/../model/' . $json, json_encode($users, JSON_PRETTY_PRINT));
    }