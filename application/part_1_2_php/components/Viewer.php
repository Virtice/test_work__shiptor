<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 17:58
 */

namespace components;


use data_objects\ActionParamsDataObjectInterface;

class Viewer
{

    /**
     * @var string
     */
    public $viewPath;
    /**
     * @var ActionParamsDataObjectInterface|null
     */
    public $params;
    /**
     * @var array|null
     */
    public $response;

    public function __construct(
        string $viewPath,
        ?ActionParamsDataObjectInterface $params,
        ?array $response
    )
    {
        $this->viewPath = $viewPath;
        $this->params = $params;
        $this->response = $response;
    }

    public function render()
    {
        include 'views/frame.php';
    }
}