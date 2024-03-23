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

if ($curUser['type'] != 'admin') {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
</head>
<body>
<table border="1">
        <tr>
            <th colspan=4>Users</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>USER TYPE</th>
        </tr>
        <?php foreach($_SESSION['users'] as $user) { ?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['type']?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan=4><a href="dashboard.php">Go to home</a></td>
        </tr>
    </table>
</body>
</html>