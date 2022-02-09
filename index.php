<?php
include './config/database.php';

$filterPage = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$filterPostId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$routes = [
    '' => 'homeController.php',
    null => 'homeController.php',
    'home' => 'homeController.php',
    'blogPost' => 'blogPostController.php',
    'blogPostCreate' => 'blogPostCreateController.php',
    'blogPostModify' => 'blogPostModifyController.php',
];

require './resources/views/layouts/header.tpl';
if (isset($filterPage)) {
    if (!$routes[$filterPage]) {
        require './resources/views/errors/404.php';
    } else {
        require('app/controllers/' . $routes[$filterPage]);
    }
} else {
    require('./app/controllers/' . $routes[$filterPage]);
}
require './resources/views/layouts/footer.tpl';
