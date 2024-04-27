<?php
    session_start();
    
    if (!isset($_GET['err'])) {
        header('location: home.php');
        exit();
    }

    header('refresh:3;url=home.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum | OpenCrowd</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once('navbar.php'); ?>

    <h4><?= $_GET['err'] ?></h4>
    <p>Redirecting to home page in 3 sec...</p>
</body>
</html>
