<?php

namespace Core;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Router {
    private $routes;

    public function __construct() {
        $this->routes = new RouteCollection();
    }

    public function get($path, $controller, $name = null) {
        $this->addRoute('GET', $path, $controller, $name);
    }

    public function post($path, $controller, $name = null) {
        $this->addRoute('POST', $path, $controller, $name);
    }

    public function put($path, $controller, $name = null) {
        $this->addRoute('PUT', $path, $controller, $name);
    }

    public function delete($path, $controller, $name = null) {
        $this->addRoute('DELETE', $path, $controller, $name);
    }

    private function addRoute($method, $path, $controller, $name) {
        $route = new Route($path, [
            '_controller' => $controller,
        ]);
        $route->setMethods([$method]);

        if ($name) {
            $this->routes->add($name, $route);
        } else {
            $this->routes->add($path, $route);
        }
    }

    public function getRoutes() {
        return $this->routes;
    }
}
