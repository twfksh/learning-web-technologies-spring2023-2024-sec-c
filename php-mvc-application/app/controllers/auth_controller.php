<?php

require_once '../models/user_model.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    // TODO: complete the authentication
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        $username = trim($username);
        $password = trim($password);

        $user = fetchUser($username);
        if (!$user) {
            die("Unable to fetch user '" . $username . "'");
        }

        echo $user['username'];
    }
}