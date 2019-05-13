<?php

namespace components;


use constants\ActionConstants;
use constants\FormConstants;
use data_objects\RouterDataObject;
use repository\ApiRequestRepository;
use Exception;

class Router
{
    /**
     * @var array
     */
    private $post;
    private $viewPathPrefix = 'views/';

    public function __construct(array $post)
    {
        $this->post = $post;
    }

    public function init(): RouterDataObject
    {
        $action = $this->post[FormConstants::FORM_NAME_ACTION];
        $params = null;
        $apiRequestData = null;
        $viewPath = null;
        switch ($action) {
            case ActionConstants::ACTION_INITIAL:
                $params = null;
                $apiRequestData = ApiRequestRepository::getDefaultSettlements('36000000000');
                $viewPath = $this->viewPathPrefix . 'settlements.php';
                break;
            case ActionConstants::ACTION_SEARCH_SETTLEMENT:
                $params = FormDataParser::getSettlementSearchParams($this->post);
                $apiRequestData = ApiRequestRepository::getSearchSettlements($params->searchString);
                $viewPath = $this->viewPathPrefix . 'settlements.php';
                break;
            case ActionConstants::ACTION_SELECT_SETTLEMENT:
                $params = FormDataParser::getShippingParams($this->post);
                $apiRequestData = ApiRequestRepository::getShippings($params->kladrId);
                $viewPath = $this->viewPathPrefix . 'shippings.php';
                break;
            case ActionConstants::ACTION_SELECT_SHIPPING:
                $params = FormDataParser::getShippingId($this->post);
                $viewPath = $this->viewPathPrefix . 'result.php';
                break;
            default:
                throw new Exception('Незарегистрированный тип действия');
        }


        return new RouterDataObject(
            $action,
            $params,
            $apiRequestData,
            $viewPath,
        );
    }
}