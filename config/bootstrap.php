<?php



session_start();

define("ROOT", __DIR__ . '/..');
define("CONFIG", ROOT . '/config');
define("VIEWS", ROOT . '/views');

require ROOT . '/vendor/autoload.php';

$container = require CONFIG . '/container.php';

if (php_sapi_name() != 'cli') {
    require CONFIG . '/routes.php';
}

