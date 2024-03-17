<?php
    session_start();
    session_destroy();
    unset($_COOKIE['opencrowd-remember-me']);
    header('location: ../views/login.php');
?>