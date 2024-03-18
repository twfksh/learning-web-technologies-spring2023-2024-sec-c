<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum | OpenCrowd</title>
</head>
<body>
    <?php include_once('navbar.php'); ?>

    <?php if (($_COOKIE['opencrowd_cur_user'] === 'admin') || ($_SESSION['opencrowd_cur_session'] === 'admin')) { ?>
        <?php include_once('admin_dashboard.php') ?>
    <?php } else { ?>
        <?php include_once('user_dashboard.php') ?>
    <?php } ?>
</body>
</html>