<?php
    session_start();
    $loggedIn = isset($_SESSION['opencrowd_cur_user']) || isset($_COOKIE['opencrowd_cur_user_cookie']);
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

    <div class="hero-section">
        <?php if ($loggedIn): ?>
            <h1>Welcome <?=$_COOKIE['opencrowd_cur_user_cookie']?>, to the OpenCrowd Community</h1>
            <p>What product are you launching or interested in today!</p>
        <?php else: ?>
            <h1>Welcome to OpenCrowd Community</h1>
            <p>Join our vibrant community to discover, discuss, and share innovative ideas and products!</p>
        <?php endif; ?>
    </div>

    <div class="features-section">
        <h2>Features</h2>
        <ul>
            <li>Submit your own products or ideas</li>
            <li>Vote for your favorite products</li>
            <li>Engage in discussions with other members</li>
            <li>Discover new and innovative creations</li>
        </ul>
    </div>

    <div class="footer">
        <p>&copy; 2024 OpenCrowd. All rights reserved.</p>
    </div>
</body>
</html>
