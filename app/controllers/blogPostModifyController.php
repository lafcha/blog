<?php

include 'app/persistences/blogPostData.php';

// Getting the authors to display in select
$authors = getAuthorsByPseudo($pdo);

// Getting the categories to display in select
$categories = getCategoriesByName($pdo);

//Getting the data to display from BDD
$dataFromBDD = blogPostById($pdo, $filterPostId);
$dataToDisplay = $dataFromBDD[0];

// Include the view
include './resources/views/blogPostModify.tpl.php';




