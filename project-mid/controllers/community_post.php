<?php
    if (isset($_POST['submit'])) {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date('F d Y, h:i:s A');
        $replyId = $_POST['replyId'];

        $post = [
            'author'=> $author,
            'title'=> $title,
            'content'=>$content,
            'date'=> $date,
            'replyId'=> $replyId
        ];

        require_once('../models/community_model.php');
        if (insertPost($post)) {
            header('location: ../views/community.php');
            exit();
        } else {
            header('location: ../views/error.php?err=Error(community post): Post failed due to an error');
            exit();
        }
    }
?>
