<?php
    session_start();
    session_destroy();
    setcookie('cur_user', '', time() - 5, '/');
    header('location: ../views/login.php');
?>