<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } 
?>

<nav style="display: flex; align-items: center; justify-content: space-between;">
    <h3 style="padding: 8px;"><a href="home.php">OpenCrowd</a></h3>
    <div>
        <a style="padding: 8px;" href="leaderboard.php">Leaderboard</a>
        <a style="padding: 8px;" href="products.php">Products</a>
        <a style="padding: 8px;" href="activity_feed.php">Activity Feed</a>
        <a style="padding: 8px;" href="community.php">Community</a>
    </div>
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <form action="search.php" method="GET" style="padding: 10px;">
            <input type="text" name="query" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
        <?php if (isset($_SESSION['opencrowd_cur_session']) || isset($_COOKIE['opencrowd_cur_user_cookie'])) { ?>
            <a style="padding: 8px;" href="dashboard.php"><?= isset($_SESSION['opencrowd_cur_session']) ? $_SESSION['opencrowd_cur_session'] : $_COOKIE['opencrowd_cur_user_cookie'] ?></a>
            <a style="padding: 8px;" href="../controllers/logout.php">Logout</a>
        <?php } else { ?>
            <a style="padding: 8px;" href="login.php">Login</a> or 
            <a style="padding: 8px;" href="signup.php">Sign up</a>
        <?php } ?>
    </div>
</nav>
<hr>
