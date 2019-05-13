<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 17:58
 */

namespace application\part_1_2_php\components;


use application\part_1_2_php\data_objects\ActionParamsDataObjectInterface;

class Viewer
{

    /**
     * @var string
     */
    private $viewPath;
    /**
     * @var ActionParamsDataObjectInterface|null
     */
    private $params;
    /**
     * @var array|null
     */
    private $response;

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
        $body = include 'application/part_1_2_php/views/initial.php';
        include 'application/part_1_2_php/views/frame.php';
    }
}