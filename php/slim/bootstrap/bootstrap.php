<?php
define('APP_ROOT', realpath(__DIR__ . '/..'));

require APP_ROOT . '/vendor/autoload.php';

use Illuminate\Container\Container;
use Slim\Factory\AppFactory;

$ci = Container::getInstance();
$app = AppFactory::create(null, $ci);

require_once APP_ROOT . '/config/bundles.php';

return $app;