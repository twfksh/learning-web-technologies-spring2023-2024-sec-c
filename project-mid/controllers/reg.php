<?php
    session_start();

    require_once '../utils/validation.php';
    require_once '../models/user_model.php';

    $name = $email = $headline = $username = $password = $confirmPassword = $org = $role = $gender = $dob = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = custom_trim($_REQUEST['name']);
        $email = custom_trim($_REQUEST['email']);
        $headline = custom_trim($_REQUEST['headline']);
        $username = custom_trim($_REQUEST["username"]);
        $password = custom_trim($_REQUEST["password"]);
        $confirmPassword = custom_trim($_REQUEST["conf-password"]);
        $org = custom_trim($_REQUEST['org']);
        $role = custom_trim($_REQUEST['role']);
        $gender = $_REQUEST["gender"];
        $dob = $_REQUEST['dob'];
        
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