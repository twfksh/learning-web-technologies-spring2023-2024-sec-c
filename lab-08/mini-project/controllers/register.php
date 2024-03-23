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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $password = $_POST['password'];
        $confPassword = $_POST['conf-password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userType = $_POST['user-type'];

        if (empty($id) || empty($password) || empty($confPassword) || empty($name) || empty($email) || empty($userType)) {
            header('Location: ../views/register.php');
            exit();
        }

        if ($password === $confPassword) {
            $user = [
                'id'=> $id,
                'password'=> $password,
                'name'=> $name,
                'email'=> $email,
                'type'=> $userType,
            ];
            
            $_SESSION['users'][] = $user;
            $_SESSION['cur_user'] = $user;
            header('location: ../views/login.php');
        } else {
            header('refresh: 2; url: ../views/register.php');
            echo "Password did not match!";
        }
    }
?>