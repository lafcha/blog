<?php

include 'app/persistences/blogPostData.php';


$lastPosts = lastBlogPosts($pdo);


include './resources/views/home.tpl';
