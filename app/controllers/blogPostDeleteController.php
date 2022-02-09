<?php

include 'app/persistences/blogPostData.php';

blogPostDelete($pdo, $filterPostId);

header("Location: ?action=home");