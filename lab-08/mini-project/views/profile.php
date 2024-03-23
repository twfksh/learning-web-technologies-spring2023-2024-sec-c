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
    <title>Profile</title>
</head>
<body>
    <table border="1">
        <tr>
            <th colspan=2>Profile</th>
        </tr>
        <tr>
            <td>ID</td>
            <td><?=$curUser['id']?></td>
        </tr>
        <tr>
            <td>NAME</td>
            <td><?=$curUser['name']?></td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td><?=$curUser['email']?></td>
        </tr>
        <tr>
            <td>USER TYPE</td>
            <td><?=$curUser['type']?></td>
        </tr>
        <tr>
            <td colspan=2><a href="dashboard.php">Go to home</a></td>
        </tr>
    </table>
</body>
</html>