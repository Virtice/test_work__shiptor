<?php

namespace application\part_1_2_php\components;


use application\part_1_2_php\constants\ActionConstants;
use application\part_1_2_php\data_objects\RouterDataObject;
use application\part_1_2_php\repository\ApiRequestRepository;
use Exception;

class Router
{
    /**
     * @var array
     */
    private $post;
    private $viewPathPrefix = 'application/part_1_2_php/views/';

    public function __construct(array $post)
    {
        $this->post = $post;
    }

    public function init(): RouterDataObject
    {
        $params = null;
        $apiRequestData = null;
        $viewPath = null;
        switch ($this->post['action']) {
            case ActionConstants::ACTION_INITIAL:
                $params = null;
                $apiRequestData = ApiRequestRepository::getDefaultSettlements('36000000000');
                $viewPath = $this->viewPathPrefix . 'initial.php';
                break;
            case ActionConstants::ACTION_SEARCH_SETTLEMENT:
                break;
            case ActionConstants::ACTION_SELECT_SETTLEMENT:
                break;
            case ActionConstants::ACTION_SHOW_SHIPPING:
                break;
            default:
                throw new Exception('Незарегистрированный тип действия');
        }

        $action = $this->post['action'];

        return new RouterDataObject(
            $action,
            $params,
            $apiRequestData,
            $viewPath,
        );
    }
}