<?php

use application\part_1_2_php\components\Autoloader;
use application\part_1_2_php\components\Router;
use application\part_1_2_php\components\Viewer;

require 'components/Autoloader.php';

Autoloader::init();

if (empty($_POST['action'])) {
    $_POST['action'] = Router::ACTION_INITIAL;
}

$router = new Router($_POST);
$action = $router->getAction();
$params = $router->getParamsForAction();

$api = new ApiRequest();

$viewer = new Viewer($action, $params);
$viewer->render();
