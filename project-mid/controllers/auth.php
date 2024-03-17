<?php

    require_once '../models/user_model.php';
    require_once '../models/validation_model.php';

    session_start();

    $username = custom_trim($_REQUEST['username']);
    $password = custom_trim($_REQUEST['password']);
    $remember = $_REQUEST['remember'];

    if ($username == '' || $password == '') {
        echo "null username or password";
    } elseif (login($username, $password)) {
        $_SESSION['opencrowd-curr-session'] = $username;
        if (isset($remember)) setcookie('opencrowd-remember-me', 'true', time()+(86400 * 30 * 7), '/');
        header('location: ../views/home.php');
    } else {
        echo "invalid user!";
    }

?>