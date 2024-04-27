<?php
    session_start();
    
    require_once '../models/user_model.php';
    require_once '../utils/validation.php';

    if (isset($_GET['username'])) {
        $username = custom_trim($_GET['username']);
        if (deleteUser($username)) {
            header('location: ../views/manage_users.php');
        } else {
            header('location: ../views/error.php?err=Error(delete user): Failed to delete the user');
        }
    } else {
        header('location: ../views/error.php?err=Error(delete user): Please provide a valid username');
    }
?>
