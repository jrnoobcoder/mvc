<?php

use Core\Router;

$router = new Router();

$router->get('/', 'App\Controllers\SampleController@index', 'index');
$router->get('/users/{id}', 'App\Controllers\SampleController@show', 'show');
$router->get('/404', 'App\Controllers\ErrorController@notFound', 'notFound');

$router->group('/admin', function($router) {
    $router->get('/login', 'App\Controllers\Auth\LoginController@index', 'admin_login');
   // $router->post('/validate', 'App\Controllers\Auth\LoginController@login', 'admin_validate');
});

$router->get('/admin/validate', 'App\Controllers\Auth\LoginController@login', 'admin_validate');


return $router->getRoutes();
