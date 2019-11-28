<?php

namespace App\Infrastructure\Controllers;

use \Zend\Diactoros\ResponseFactory;
use \League\Plates\Engine;

class HomeController
{
    /** @var \League\Plates\Engine */
    protected $plates;

    public function __construct($plates)
    {
        $this->plates = $plates;
    }

    public function serveHomePage($request, $args)
    {
        $response = (new ResponseFactory())->createResponse();

        // write body
        $response->getBody()->write(
            // get template
            $this->plates->render('pages/home', [
                'title' => 'home'
            ])
        );

        return $response;
    }
}