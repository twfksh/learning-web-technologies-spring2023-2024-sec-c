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

    header('location: ./views/login.php');
?>