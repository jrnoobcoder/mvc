<?php

use Core\Router;

$router = new Router();

$router->get('/', 'App\Controllers\SampleController@index', 'index');
$router->get('/users/{id}', 'App\Controllers\SampleController@show', 'show');
$router->get('/404', 'App\Controllers\ErrorController@notFound', 'notFound');

return $router->getRoutes();
