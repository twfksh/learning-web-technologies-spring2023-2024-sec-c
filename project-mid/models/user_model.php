<?php

require_once 'database_model.php';

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

function getUserByUsername($username) {
    $conn = getDatabaseConnection();
    $sql_stmt = "SELECT * FROM users WHERE username = '{$username}'";
    $result = mysqli_query($conn, $sql_stmt);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    return null;
}

function getAllUsers() {
    $conn = getDatabaseConnection();
    $sql_stmt = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql_stmt);

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    return $users;
}

function registerUser($user) {
    $conn = getDatabaseConnection();
    $sql_stmt = "INSERT INTO users (name, email, headline, username, password, org, role, gender, dob) 
                 VALUES ('{$user['name']}', '{$user['email']}', '{$user['headline']}', '{$user['username']}', 
                         '{$user['password']}', '{$user['org']}', '{$user['role']}', '{$user['gender']}', '{$user['dob']}')";
    if (mysqli_query($conn, $sql_stmt)) {
        return true;
    } else {
        echo "Error: " . $sql_stmt . "<br>" . mysqli_error($conn);
        return false;
    }
}


function deleteUser($username) {
    $conn = getDatabaseConnection();
    $sql_stmt = "DELETE FROM users WHERE username = '{$username}'";
    if (mysqli_query($conn, $sql_stmt)) {
        return true;
    }
    return false;
}

function updateUser($user) {
    $conn = getDatabaseConnection();
    $sql_stmt = "UPDATE users SET full_name = '{$user['name']}', email = '{$user['email']}', username = '{$user['username']}', passwd = '{$user['password']}', headline = '{$user['headline']}', org = '{$user['org']}', urole = '{$user['role']}'";
    if (mysqli_query($conn, $sql_stmt)) {
        return true;
    }
    return false;
}
