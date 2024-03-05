<?php

require_once 'database.php';

function fetchUsers() {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return null;
    }

    $result = mysqli_query($conn, "SELECT * FROM users");
    if (!$result) {
        return null;
    }

    $users = [];
    while ($user = mysqli_fetch_assoc($result)) $users[] = $user;

    mysqli_free_result($result);
    mysqli_close($conn);

    return $users;
}

function fetchUser($username) {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return null;
    }

    $stmt = mysqli_prepare(
        $conn, 
        "SELECT * FROM users WHERE username = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $username);
    
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return null;
    }
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $user;
}

function registerUser($user) {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt, 
        "ssss", 
        $user['full_name'], 
        $user['username'],
        $user['email'],
        $user['password']
    );

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $result;
}

function deleteUser($user) {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM users WHERE username = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $user['username']);
    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $result;
}

function updateUser($user) {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE users SET full_name = ?, username = ?, email = ?, password = ? WHERE username = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $user['full_name'],
        $user['username'],
        $user['email'],
        $user['password']
    );

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $result;
}
