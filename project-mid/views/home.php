<?php
    session_start();
    $curUser = null;
    if (isset($_COOKIE['opencrowd-remember-me']) || isset($_SESSION['opencrowd-curr-session'])) {
        $curUser = $_SESSION['opencrowd-curr-session'];
        // header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | OpenCrowd</title>
</head>
<style>
    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>
<body>
    <nav>
        <h2>OpenCrowd</h2>
        <div>
            <a href="#">Browse</a>
            <a href="#">Activity Feed</a>
            <a href="#">Community</a>
        </div>
        <div>
            <?php
                if ($curUser != null) {
                    echo '<a href="#">' . $curUser . '</a>';
                    echo '<a href="../controllers/logout.php">Logout</a>';
                } else {
                    echo '<a href="./login.php">Login</a>';
                }
            ?>
        </div>
    </nav>
</body>
</html>
