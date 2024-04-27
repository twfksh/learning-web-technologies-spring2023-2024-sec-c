<?php
    session_start();

    if (isset($_GET['index'])) {
        $index = $_GET['index'];
        
        if (isset($_SESSION['products'][$index])) {
            $product = $_SESSION['products'][$index];
        } else {
            header('location: error.php?err=Product not found');
            exit;
        }
    } else {
        header('location: error.php?err=Invalid product');
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upvote'])) {
        $index = $_POST['index'];
        if (isset($_SESSION['products'][$index])) {
            $_SESSION['products'][$index]['votes']++;
            header('location: ' . $_SERVER['REQUEST_URI']);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'])) {
        $comment = $_POST['comment'];
        $username = $_SESSION['opencrowd_cur_session']; // Assuming the username is stored in the session
        $newComment = [
            'username' => isset($username) ? $username : 'Anonymus',
            'comment' => $comment
        ];
        // You can save the comment to your database or implement further validation here
        // For now, let's assume you save the comment to an array in the session
        $_SESSION['products'][$index]['comments'][] = $newComment;
        // Redirect to prevent form resubmission
        header('location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?> Details | OpenCrowd</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once('navbar.php'); ?>
    
    <div style="margin: auto; width: 50%;">
        <h2><?= $product['name'] ?></h2>
        <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>" style="width: 360px; height: 240px; object-fit: cover;">
        <p><?= $product['description'] ?></p>
        <!-- <b>Votes: <?= $product['votes'] ?></b> -->
        <div>
            <form method="post" action="">
                <input type="hidden" name="index" value="<?= $index ?>">
                <button type="submit" name="upvote">👍🏼Upvote - <?=$product['votes']?></button>
            </form>
        </div>
        <h3>Comments</h3>
        <form method="post" action="">
            <textarea name="comment" rows="4" cols="50" placeholder="Enter your comment here"></textarea><br>
            <button type="submit" name="submit_comment">Submit Comment</button>
        </form>
        <div>
            <?php
                // Display existing comments
                if (isset($product['comments'])) {
                    foreach ($product['comments'] as $comment) {
                        echo "<p><strong>{$comment['username']}</strong>: {$comment['comment']}</p>";
                    }
                }
            ?>
        </div>
    </div>

</body>
</html>
