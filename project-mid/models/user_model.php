<?php

require_once 'database_model.php';
require_once 'validation_model.php';

function login($username, $password) {
    $conn = getDatabaseConnection();
    $sql_stmt = "SELECT * FROM users WHERE username='{$username}' and password='{$password}'";
    $result = mysqli_query($conn, $sql_stmt);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return true;
    }
    return false;
}
