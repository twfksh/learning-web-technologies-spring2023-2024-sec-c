<?php

require_once '../models/user_model.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    $fullName = $_POST['full-name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($fullName) || empty($username) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // TODO: validate all the fields
        $user = array(
            'full_name' => trim($fullName),
            'username'  => trim($username),
            'email'     => trim($email),
            'password'  => trim($password)
        );
        if (!registerUser($user)) {
            echo "Failed to register user. Redirecting in 3 sec...";
            header("refresh: 3;url: signup.php");
        }
         header("location: ../views/login.php");
    }
}