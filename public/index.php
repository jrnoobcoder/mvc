<?php
require '../vendor/autoload.php';
require '../core/helpers.php';

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Relay\RelayBuilder;
use App\Controllers\ErrorController;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Symfony\Component\Routing\Generator\UrlGenerator; 


// Include the routes file
$routes = require '../routes/web.php';

// Match the current request
$context = new RequestContext($_SERVER['REQUEST_URI']);
$matcher = new UrlMatcher($routes, $context);
$generator = new UrlGenerator($routes, $context);
$request = ServerRequestFactory::fromGlobals();
$pathInfo = $request->getUri()->getPath();

try {
    $parameters = $matcher->match($pathInfo);

    if (!isset($parameters['_controller']) || strpos($parameters['_controller'], '@') === false) {
        throw new Exception('Invalid controller configuration.');
    }

    list($controller, $method) = explode('@', $parameters['_controller']);
    unset($parameters['_controller']);

    if (!class_exists($controller) || !method_exists($controller, $method)) {
        throw new Exception("Controller or method not found.");
    }

    $controllerInstance = new $controller();
    $response = $controllerInstance->$method($parameters);

} catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
    $controllerInstance = new ErrorController();
    $response = new Response();
    ob_start();
    $controllerInstance->notFound();
    $response->getBody()->write(ob_get_clean());
    $response = $response->withStatus(404);

} catch (Exception $e) {
    $response = new Response();
    $response->getBody()->write('An error occurred: ' . $e->getMessage());
    $response = $response->withStatus(500);
}

// Middleware setup
// $middlewareQueue = [
//     new SampleMiddleware(),
//     function (ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
//         return $handler->handle($request);
//     }
// ];

// $relayBuilder = new RelayBuilder();
// $relay = $relayBuilder->newInstance($middlewareQueue);

// // Execute the middleware stack
// $response = $relay->handle($request);
if($response){
    (new SapiEmitter())->emit($response);
}
