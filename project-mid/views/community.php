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

    <div style="margin: auto; width: 50%;">
        <h2>Community | OpenCrowd</h3> <hr>
        <div>
            <h3>Ongoing discussion(s):</h3>
            <?php 
                include_once('../controllers/initialize.php');
                $posts = isset($_SESSION['posts']) ? $_SESSION['posts'] : null;
                
                if ($posts) foreach ($posts as $post) {
                    require('community_post.php');
                }
            ?>
        </div> <br>
        <div>
            <form method="post" action="../controllers/community_post.php">
                <hr><h3>Start a discussion or reply to an existing one:</h3>
                <input type="hidden" name="author" value="<?=$_SESSION['opencrowd_cur_session']?>">
                <input type="hidden" name="replyId">
                Title: <input type="text" name="title"> <br> <hr>
                <textarea name="content" cols="83" rows="8" placeholder="Start writing here..."></textarea>
                <input type="submit" name="submit">
            </form> <br> <hr>
        </div>
    </div>
</body>
</html>
