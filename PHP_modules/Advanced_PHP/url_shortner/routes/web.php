<?php

use App\Controllers\UrlController;

$controller = new UrlController();

$router->post('/api/shorten', fn() => $controller->shorten());

$router->get('/api/urls', fn() => $controller->index());

$router->get('/{code}', fn(array $params) => $controller->redirect($params));

$router->get('/', function () {
    $html = file_get_contents(__DIR__ . '/../public/frontend.html');
    header('Content-Type: text/html; charset=UTF-8');
    echo $html;
});
