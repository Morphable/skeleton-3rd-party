<?php

use \League\Container\Container;
use \League\Plates\Engine;

$container = new Container();
$container->add('plates', Engine::class)->addArgument(VIEWS);
$container->add('controller.home', \App\Infrastructure\Controllers\HomeController::class)->addArgument('plates');

return $container;
