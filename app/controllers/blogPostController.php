<?php

include 'app/persistences/blogPostData.php';

$postFromBDD = blogPostById($pdo, $filterPostId);
$post = $postFromBDD[0];

$comments = commentsByBlogPost($pdo, $filterPostId);

if ($post) {
    include './resources/views/blogPost.tpl.php';
} else {
    include './resources/views/errors/404.php';
}




