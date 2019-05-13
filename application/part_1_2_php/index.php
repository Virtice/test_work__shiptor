<?php

use application\part_1_2_php\components\ApiRequester;
use application\part_1_2_php\components\Autoloader;
use application\part_1_2_php\components\Router;
use application\part_1_2_php\components\Viewer;
use application\part_1_2_php\constants\ActionConstants;
use application\part_1_2_php\repository\ApiRequestRepository;

require 'components/Autoloader.php';

Autoloader::init();

if (empty($_POST['action'])) {
    $_POST['action'] = ActionConstants::ACTION_INITIAL;
}

$router = new Router($_POST);
$routerData = $router->init();

$headers = ApiRequestRepository::getHeaders();
$api = new ApiRequester($headers);
$response = json_decode($api->request($routerData->apiRequestData), true);

$viewer = new Viewer($routerData->viewPath, $routerData->params, $response);
$viewer->render();
