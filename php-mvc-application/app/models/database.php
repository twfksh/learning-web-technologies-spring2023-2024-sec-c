<?php

require_once 'common.php';

function getDatabaseConnection() {
    $dbCred = parseConfig("credentials.json")['database'];

    $conn = mysqli_connect(
        $dbCred['host'], 
        $dbCred['user'], 
        $dbCred['password'], 
        $dbCred['name'], 
        $dbCred['port']
    );

    if (!$conn) return null;
    return $conn;
}