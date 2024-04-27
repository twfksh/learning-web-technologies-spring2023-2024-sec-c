<?php
    session_start();

    require_once '../models/user_model.php';

    if (!isset($_SESSION['opencrowd_cur_session']) && $_SESSION['opencrowd_cur_session'] === 'admin') {
        header('location: ../views/error.php?err=Error(user manager): Please login as admin to manage users');
    }

    $users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager | OpenCrowd</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php include_once('navbar.php'); ?>

    <div style="margin: auto; width: 50%;">
    <h2>User Manager</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Organization</th>
            <th>Role</th>
            <th colspan=2>Action</th>
            <!-- <th>Delete</th> -->
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['org'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><a href="edit_profile.php?username=<?= $user['username'] ?>">Edit</a></td>
                <td><a href="../controllers/delete_user.php?username=<?= $user['username'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>
