<?php

use components\ApiRequester;
use components\Autoloader;
use components\Router;
use components\Viewer;
use constants\ActionConstants;
use repository\ApiRequestRepository;

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
