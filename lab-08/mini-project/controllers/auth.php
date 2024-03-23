<?php
    session_start();

    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [
            [
                'id'=> 'admin',
                'password'=> 'admin',
                'name'=> 'Admin',
                'email'=> 'admin@mail.com',
                'type'=> 'admin',
            ],
        ];
    }

    require_once '../models/user_model.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userId = $_POST['user-id'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? true : false;

        foreach ($_SESSION['users'] as $user) {
            if ($user['password'] == $password) {
                $_SESSION['cur_user'] = getUserById($_SESSION['users'], $userId);
                if ($remember) setcookie('cur_user', $userId, time() + (60 * 60 * 24), '/');
                header('location: ../views/dashboard.php');
                exit();
            }
        }

        echo "Auth failed, invalid user!";
    }
?>