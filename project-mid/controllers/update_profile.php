<?php
    session_start();

    require_once '../utils/validation.php';
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

        $profilePicture = $_FILES["profile-picture"] ?? null;

        if ($profilePicture && $profilePicture["error"] === UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png'];
            $maxFileSize = 2 * 1024 * 1024; 

            $fileType = $profilePicture["type"];
            $fileSize = $profilePicture["size"];

            if (!inArray($fileType, $allowedTypes)) {
                echo "Invalid file type, allowed jpeg, png only";
            } elseif ($fileSize > $maxFileSize) {
                echo "File size exceeds the maximum allowed size (2 MB).";
            } else {
                $uploadDirectory = '../uploads/images/';
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0755, true);
                }

                $targetFileName = $uploadDirectory . $_SESSION['opencrowd_cur_session'] . '.' . (($fileType == 'image/jpeg') ? 'jpg' : 'png');

                if (move_uploaded_file($profilePicture["tmp_name"], $targetFileName)) {
                    echo "Profile picture uploaded successfully!";
                } else {
                    echo "Failed to move the uploaded photo.";
                }
            }
        } else {
            echo "Please select a valid profile photo to upload.";
        }

        if (!updateUser($user)) {
            header('location: ../views/error.php?err=Error(update user profile): User profile update failed!');
            exit();
        } else {
            header('location: ../views/dashboard.php');
        }
    }
?>