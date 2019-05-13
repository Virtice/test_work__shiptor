<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 17:58
 */

namespace application\part_1_2_php\components;


class Viewer
{
    /**
     * @var string
     */
    private $action;
    /**
     * @var array|null
     */
    private $params;

    public function __construct(string $action, ?array $params)
    {
        $this->action = $action;
        $this->params = $params;
    }

    public function render()
    {
        switch ($this->action) {
            case Router::ACTION_INITIAL:
                include 'application/part_1_2_php/views/initial.php';
                break;
        }
    }
}