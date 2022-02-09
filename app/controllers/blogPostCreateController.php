<?php
include 'app/persistences/blogPostData.php';

// Get the authors to display in select
$authors = getAuthorsByPseudo($pdo);

// Get the categories to display in select
$categories = getCategoriesByName($pdo);

// Include the view
include './resources/views/blogPostCreate.tpl.php';

if (filter_has_var(INPUT_POST, 'submit')) {

// Inputs filtration & validation EXECEPT CATEGORIES
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

// Inputs filtration & validation FOR CATEGORIES
//    $categoryInputs = [
//        'cat1' => FILTER_VALIDATE_INT,
//        'cat2' => FILTER_VALIDATE_INT,
//        'cat3' => FILTER_VALIDATE_INT,
//    ];
//    $filteredCategoryInputs = filter_input_array(INPUT_POST, $categoryInputs);


//Creation of article
    if ($filteredInputs != false) {
        //Inserting all the inputs except categories
        $newArticle = blogPostCreate($pdo, $filteredAllInputs);

        //Getting the id of the article created
        //$newArticleId = $pdo->lastInsertId();

        //Inserting the categories
        //$categoriesInArticle = blogPostAddCategories($pdo, $filteredCategoryInputs, $newArticleId);

        if ($newArticle) {
            header("Location: ?action=home");
        } else {
            $msg = "Un problème est survenu lors de la création de votre article. Il n'a pas pu être enregistré.";
        }

    } else {
        $msg = "Problème de validation des données, merci de vérifier";
    }
}