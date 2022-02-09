<?php

include 'app/persistences/blogPostData.php';

// IF THE FORM HAS'NT BEEN SUBMITTED, THE PAGE IS DISPLAYED
if (!filter_has_var(INPUT_POST, 'submit')) {

// Getting the authors to display in select
    $authors = getAuthorsByPseudo($pdo);

// Getting the categories to display in select
    $categories = getCategoriesByName($pdo);

//Getting the data to display from BDD
    $dataFromBDD = blogPostById($pdo, $filterPostId);
    $dataToDisplay = $dataFromBDD[0];
    var_dump($dataToDisplay);

//Formating dates
    $dateEndToDisplay = date('Y-m-d', strtotime($dataToDisplay['date_end']));
    $dataToDisplay['date_end'] = $dateEndToDisplay;

    $dateStartToDisplay = date('Y-m-d', strtotime($dataToDisplay['date_start']));
    $dataToDisplay['date_start'] = $dateStartToDisplay;

// Include the view
    include './resources/views/blogPostModify.tpl.php';

// WHEN THE FORM IS SUBMITTED
} else {

    // Inputs filtration & validation EXECEPT CATEGORIES
    $inputs = [
        'title' => FILTER_SANITIZE_STRING,
        'content' => FILTER_SANITIZE_STRING,
        'importance' => FILTER_VALIDATE_INT,
        'author' => FILTER_VALIDATE_INT,
    ];


    $filteredInputs = filter_input_array(INPUT_POST, $inputs);
    var_dump($_POST['importance']);
    // Filtering and formatting dates
    $filterDateStart = preg_replace("([^0-9/])", "", $_POST['date_start']);
    $filterDateEnd = preg_replace("([^0-9/])", "", $_POST['date_end']);
    $formatedDateStart = date('Y-m-d H:i:s', strtotime($filterDateStart));
    $formatedDateEnd = date('Y-m-d H:i:s', strtotime($filterDateEnd));

    $filteredAllInputs = [
        "title" => $filteredInputs['title'],
        "content" => $filteredInputs['content'],
        "importance" => $filteredInputs['importance'],
        "author" => $filteredInputs['author'],
        "start date" => $formatedDateStart,
        "end date" => $formatedDateEnd,
    ];

    if ($inputs != false) {
        //Inserting all the inputs except categories
        $postUpdate = blogPostUpdate($pdo, $filteredAllInputs, $filterPostId);

        if ($postUpdate) {
            header("Location: ?action=home");
        } else {
            $msg = "Un problème est survenu lors de la création de votre article. Il n'a pas pu être enregistré.";
        }

    } else {
        $msg = "Problème de validation des données, merci de vérifier";
    }
}






