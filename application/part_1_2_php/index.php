<?php

use components\ApiRequester;
use components\Autoloader;
use components\Router;
use components\Viewer;
use constants\ActionConstants;
use constants\FormConstants;
use repository\ApiRequestRepository;

try {
    require 'components/Autoloader.php';

    Autoloader::init();

    if (empty($_POST[FormConstants::FORM_NAME_ACTION])) {
        $_POST[FormConstants::FORM_NAME_ACTION] = ActionConstants::ACTION_INITIAL;
    }

//    print_r($_POST);

    $router = new Router($_POST);
    $routerData = $router->init();

    $response = null;
    if (!empty($routerData->apiRequestData)) {
        $headers = ApiRequestRepository::getHeaders();
        $api = new ApiRequester($headers);
        $response = json_decode($api->request($routerData->apiRequestData), true);
    }

//    print_r($response);

    $viewer = new Viewer($routerData->action, $routerData->viewPath, $routerData->params, $response);
    $viewer->render();
} catch (Throwable $t) {
//    ob_clean();
    echo sprintf('<h4>Error: %s (%s, %d)</h4>', $t->getMessage(), $t->getFile(), $t->getLine());
    echo sprintf('<pre>Trace:<br>%s</pre>', $t->getTraceAsString());
}
