<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response;

class SampleMiddleware implements MiddlewareInterface {
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        // Middleware logic before the next middleware/controller
        $response = $handler->handle($request);
        
        // Middleware logic after the next middleware/controller
        $response->getBody()->write("\nAfter middleware");

        return $response;
    }
}
