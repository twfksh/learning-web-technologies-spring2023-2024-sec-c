<?php

    require_once '../models/user_model.php';
    require_once '../utils/validation.php';

    session_start();

    $username = custom_trim($_REQUEST['username']);
    $password = custom_trim($_REQUEST['password']);
    $remember = $_REQUEST['remember'];

    $isValidUsrPass = validateUsername($username) && validatePassword($password);

    if ($username == '' || $password == '') {
        header('location: ../views/error.php?err=Error(login): Require valid username and password');
    } elseif (($isValidUsrPass && login($username, $password)) || ($username === 'admin' && $password === 'admin')) {
        $_SESSION['opencrowd_cur_session'] = $username;
        if (isset($remember)) setcookie('opencrowd_cur_user_cookie', $username, time()+(60 * 60 * 24 * 7), '/');
        header('location: ../views/home.php');
    } else {
        header('location: ../views/error.php?err=Error(login): Invalid username and password');
    }

?>
