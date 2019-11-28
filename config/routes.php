<?php

use \Zend\Diactoros\ServerRequestFactory;
use \Zend\Diactoros\ResponseFactory;
use \Zend\HttpHandlerRunner\Emitter\SapiEmitter;

$request = ServerRequestFactory::fromGlobals();

$micro = new \Morphable\Micro();
$micro->setContainer($container);

$router = $micro->routing();

$router->add('GET', '/', ['controller.home', 'serveHomePage']);

try {
    $response = $micro->handle($request);
} catch (\Exception $e) {
    //404
    $response = (new ResponseFactory())->createResponse(404, 'page not found');
    $response->getBody()->write('404');
}

(new SapiEmitter)->emit($response);