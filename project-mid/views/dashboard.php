<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | OpenCrowd</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include_once('navbar.php'); ?>

    <?php if ((isset($_COOKIE['opencrowd_cur_user_cookie']) && $_COOKIE['opencrowd_cur_user_cookie'] === 'admin') || 
          (isset($_SESSION['opencrowd_cur_session']) && $_SESSION['opencrowd_cur_session'] === 'admin')) { ?>
        <?php include_once('admin_dashboard.php') ?>
    <?php } else { ?>
        <?php include_once('user_dashboard.php') ?>
    <?php } ?>
</body>
</html>
