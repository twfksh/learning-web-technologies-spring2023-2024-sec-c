<?php
    session_start();
    session_destroy();
    setcookie('cur_user_cookie', '', time()+0, '/');
    header('location: login.php');
?>