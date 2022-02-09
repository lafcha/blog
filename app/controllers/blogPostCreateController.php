<?php
include 'app/persistences/blogPostData.php';

// Get the authors to display in select
$authors = getAuthorsByPseudo($pdo);

// Include the view
include './resources/views/blogPostCreate.tpl.php';

// Inputs filtration & validation
if (filter_has_var(INPUT_POST, 'submit')) {

    $inputs = [
        'title' => FILTER_SANITIZE_STRING,
        'content' => FILTER_SANITIZE_STRING,
        'importance' => FILTER_VALIDATE_INT,
        'author' => FILTER_VALIDATE_INT,
    ];
    $filteredInputs = filter_input_array(INPUT_POST, $inputs);

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

//Creation of article
    if ($filteredInputs != false) {
        $newArticleCreated = blogPostCreate($pdo, $filteredAllInputs);

        if ($newArticleCreated) {
           header("Location: ?action=home");
        } else {
            $msg = "Un problème est survenu lors de la création de votre article. Il n'a pas pu être enregistré.";
        }

    } else {
        $msg = "Problème de validation des données, merci de vérifier";
    }
}