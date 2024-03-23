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
    <h1>Welcome <?=$curUser['name']?></h1>
    <a href="./profile.php">Profile</a> <br>
    <a href="./change_password.php">Change Password</a> <br>
    <?php if ($curUser['type'] === 'admin') { ?>
        <a href="./view_users.php">View Users</a> <br>
    <?php } ?>
    <a href="../controllers/logout.php">Logout</a> <br>
</body>
</html>