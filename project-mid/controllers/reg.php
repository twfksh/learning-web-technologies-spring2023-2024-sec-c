<?php
    session_start();

    require_once '../models/validation_model.php';
    require_once '../models/user_model.php';

    $name = $email = $headline = $username = $password = $confirmPassword = $org = $role = $gender = $dob = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = custom_trim($_POST['name']);
        $email = custom_trim($_POST['email']);
        $headline = custom_trim($_POST['headline']);
        $username = custom_trim($_POST["username"]);
        $password = custom_trim($_POST["password"]);
        $confirmPassword = custom_trim($_POST["conf-password"]);
        $org = custom_trim($_POST['org']);
        $role = custom_trim($_POST['role']);
        $gender = $_POST["gender"];
        $dob = $_POST['dob'];
        
        if (empty($name)) {
            die("Require name.");
        }
        if (empty($email)) {
            die("Require email.");
        }

        if (empty($username) || empty($password)) {
            die("Require username and password.");
        } elseif (!validateUsername($username) || !validatePassword($password)) {
            die("Invalid username or password.");
        } elseif ($password !== $confirmPassword) {
            die("Passwords does not match.");
        }

        if (empty($gender)) {
            die("Require gender.");
        }
        
        $user = [
            'name'=> $name,
            'email'=> $email,
            'headline'=> $headline,
            'username'=> $username,
            'password'=> $password,
            'org'=> $org,
            'role'=> $role,
            'gender'=>   $gender,
            'dob'=> $dob
        ];

        if (!registerUser($user)) {
            header('location: ../views/error.php?err=Error(sign up): User registration failed, please try again later');
            exit();
        } else {
            header('location: ../views/login.php');
        }
    }
?>