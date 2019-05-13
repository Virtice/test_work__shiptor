<?php

namespace application\part_1_2_php\components;


use application\part_1_2_php\data_objects\InitialDataObject;
use Exception;

class Router
{
    public const ACTION_INITIAL           = 'action.initial';
    public const ACTION_SEARCH_SETTLEMENT = 'action.settlement.search';
    public const ACTION_SELECT_SETTLEMENT = 'action.settlement.select';
    public const ACTION_SHOW_SHIPPING     = 'action.shipping.show';

    private $formData = [];

    /**
     * @var array
     */
    private $post;

    public function __construct(array $post)
    {

        $this->post = $post;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getAction(): string
    {
        $data = $this->getFormData();

        return $data['action'];
    }

    /**
     * @return array|null
     * @throws Exception
     */
    public function getParamsForAction(): ?object
    {
        $data = $this->getFormData();

        return $data['params'];
    }

    /**
     * @return array
     * @throws Exception
     */
    private function getFormData(): array
    {
        if (empty($this->formData)) {
            $this->formData = $this->parseFormData($this->post);
        }

        return $this->formData;
    }

    /**
     * @param array $post
     *
     * @return array
     * @throws Exception
     */
    private function parseFormData(array $post): array
    {
        $params = null;
        switch ($post['action']) {
            case self::ACTION_INITIAL:
                $params = new InitialDataObject('36000000000');
                break;
            case self::ACTION_SEARCH_SETTLEMENT:
                break;
            case self::ACTION_SELECT_SETTLEMENT:
                break;
            case self::ACTION_SHOW_SHIPPING:
                break;
            default:
                throw new Exception('Незарегистрированный тип действия');
        }

        $action = $post['action'];

        return [
            'action' => $action,
            'params' => $params,
        ];
    }
}