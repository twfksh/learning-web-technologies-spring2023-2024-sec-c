<?php
    session_start();

    $curUser = isset($_SESSION['cur_user']) ? $_SESSION['cur_user'] : getUserById($_SESSION['users'], $_COOKIE['cur_user']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cur_password = $_POST['cur-password'];
        $new_password = $_POST['new-password'];
        $re_new_password = $_POST['re-new-password'];

        $errors = [];

        if (empty($cur_password)) {
            $errors['cur-password'] = "Current password is required.";
        }

        if (empty($new_password)) {
            $errors['new-password'] = "New password is required.";
        }

        if (empty($re_new_password)) {
            $errors['re-new-password'] = "Please re-enter the new password.";
        } elseif ($new_password !== $re_new_password) {
            $errors['re-new-password'] = "Passwords do not match.";
        }

        if (empty($errors)) {
            foreach ($_SESSION['users'] as $user) {
                if ($user['id'] == $curUser['id']) {
                    $user['password'] = $new_password;
                    header('location: ../views/dashboard.php');
                }
            }
        } else {
            foreach ($errors as $field => $error) {
                echo $error . "<br>";
            }
        }
    }
?>