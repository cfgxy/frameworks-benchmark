<?php
/** @var Slim\App $app */

$app->get('/demo', 'Ahjob\Demo\Controller\DemoController');
$app->get('/hello', 'Ahjob\Demo\Controller\DemoController:hello');