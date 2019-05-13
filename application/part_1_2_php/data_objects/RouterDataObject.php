<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 18:17
 */

namespace application\part_1_2_php\data_objects;


class RouterDataObject
{
    /**
     * @var string
     */
    public $action;
    /**
     * @var ActionParamsDataObjectInterface|null
     */
    public $params;
    /**
     * @var array|null
     */
    public $apiRequestData;

    public function __construct(
        string $action,
        ?ActionParamsDataObjectInterface $params,
        ?ApiRequestRepositoryDataObject $apiRequestData
    )
    {

        $this->action = $action;
        $this->params = $params;
        $this->apiRequestData = $apiRequestData;
    }
}