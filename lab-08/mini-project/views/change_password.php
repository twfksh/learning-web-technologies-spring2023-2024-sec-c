<?php 
session_start(); 

require_once '../models/user_model.php';

if (!isset($_SESSION['users'])) {
    header('location: login.php');
}

if (!isset($_SESSION['cur_user']) && !isset($_COOKIE['cur_user'])) {
    header('location: login.php');
}

$curUser = isset($_SESSION['cur_user']) ? $_SESSION['cur_user'] : getUserById($_SESSION['users'], $_COOKIE['cur_user']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form action="../controllers/change_password.php" method="POST">
        <fieldset>
            <legend>CHANGE PASSWORD</legend>
            Current Password <br>
            <input type="password" name="cur-password"> <br>
            New Password <br>
            <input type="password" name="new-password"> <br>
            Retype New Password <br>
            <input type="password" name="re-new-password"> <br>
            <hr>
            <input type="submit" name="submit" value="Change"> 
            <a href="dashboard.php">Home</a>
        </fieldset>
    </form>
</body>
</html>