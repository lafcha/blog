<?php
include './config/database.php';

$filterPage = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$filterPostId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$routes = [

    'home' => 'home.tpl',
    '' => 'homeController.php',
    'blogPost' => 'blogPostController.php'
];

if (isset($filterPage)) {
    if (!$routes[$filterPage]) {
        $title = "Erreur 404";
        $page = 'home';
        $MetaDescription = "Blog";
        require './resources/views/layouts/header.tpl';
        require './resources/views/errors/404.php';


    } else {
        $title = $filterPage;
        $page = 'home';
        $MetaDescription = "Mon site web";
        require './resources/views/layouts/header.tpl';
        require('app/controllers/' . $routes[$filterPage]);

    }
} else {
    $title = "home";
    $page = 'home';
    $MetaDescription = "Mon site web";
    require './resources/views/layouts/header.tpl';
    require('./app/controllers/' . $routes[$filterPage]);
}

require './resources/views/layouts/footer.tpl';
