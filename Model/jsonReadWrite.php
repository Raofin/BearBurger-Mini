<?php

    function readJson($jsonFile)
    {
        $jsonFileData = file_get_contents(__DIR__ . '/../Data/' . $jsonFile);
        return json_decode($jsonFileData, true);
    }

    function writeJson($users, $jsonFile)
    {
        $json = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/../Data/' . $jsonFile, $json);
    }