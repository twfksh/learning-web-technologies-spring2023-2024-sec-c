<?php
    require_once 'database_model.php';
    require_once '../utils/validation.php';

    function insertPost($post) {
        $conn = getDatabaseConnection();

        foreach ($post as $key => $value) {
            $newValue = validateTextData($conn, $value);
            $post[$key] = $newValue;
        }

        $sql_stmt = "INSERT INTO discussions VALUES ('', '{$post['author']}', '{$post['title']}', '{$post['content']}', '{$post['date']}', ''{$post['replyId']}'')";
        if (mysqli_query($conn, $sql_stmt)) {
            return true;
        }

        return false;
    }

    function getPosts() {
        $conn = getDatabaseConnection();
        $sql_stmt = "SELECT * FROM discussions WHERE reply_id = 0";
        $result = mysqli_query($conn, $sql_stmt);
        $posts = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts[] = $row;
            }
            return $posts;
        }
        return null;
    }

    function getPostByReplyId($replyId) {
        $conn = getDatabaseConnection();
        $sql_stmt = "SELECT * FROM discussions WHERE reply_id = '{$replyId}'";
        $posts = [];
        if ($result = mysqli_query($conn, $sql_stmt)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts[] = $row;
            }
            return $posts;
        }
        return null;
    }
?>