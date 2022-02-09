<?php

include 'app/persistences/blogPostData.php';

// Getting the authors to display in select
$authors = getAuthorsByPseudo($pdo);

// Getting the categories to display in select
$categories = getCategoriesByName($pdo);

//Getting the data to display from BDD
$dataFromBDD = blogPostById($pdo, $filterPostId);
$dataToDisplay = $dataFromBDD[0];

//Formating dates
$dateEndToDisplay = date('Y-m-d', strtotime($dataToDisplay['date_end']));
$dataToDisplay['date_end'] = $dateEndToDisplay;

$dateStartToDisplay = date('Y-m-d', strtotime($dataToDisplay['date_start']));
$dataToDisplay['date_start'] = $dateStartToDisplay;


// Include the view
include './resources/views/blogPostModify.tpl.php';




