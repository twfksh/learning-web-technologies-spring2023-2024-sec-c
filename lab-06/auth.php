<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        foreach ($_SESSION["users"] as $user => $userData) {
            if ($username == $user && $password == $userData["password"]) {
                
                $_SESSION["login_error"] = null;
                
                header("location: dashboard.php");
                exit();
            }
        }

        $_SESSION["login_error"] = "Invalid username or password";
        header("location: login.php");
        exit();
    }
?>
