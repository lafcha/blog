<?php

include 'app/persistences/blogPostData.php';

$post = blogPostById($pdo, $filterPostId);
$comments = commentsByBlogPost($pdo, $filterPostId);

if ($post) {
    include './resources/views/blogPost.tpl.php';
} else {
    include './resources/views/errors/404.php';
}




