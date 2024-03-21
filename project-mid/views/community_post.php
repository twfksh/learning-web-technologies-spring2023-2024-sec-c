<div class="post">
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    ?>
    <h4><?=$post['title']?></h4>
    <p>Author: <?=$post['author']?> Date: <?=$post['date']?></p>
    <p><?=$post['content']?></p>
    <?php $replyId = $post['reply_id'];?>
    <input type="text" name="reply">
    <button onclick="">Reply</button>
</div>