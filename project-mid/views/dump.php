<?php
include_once '../controllers/initialize.php';
require_once '../models/community_model.php';

$posts = getPosts();

foreach ($posts as $post) {
    echo $post['author'] . '<br>';
}

?>