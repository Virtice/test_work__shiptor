<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 18:44
 */

namespace application\part_1_2_php\data_objects;


class ApiRequestRepositoryDataObject
{
    /**
     * @var string
     */
    public $url;
    /**
     * @var array
     */
    public $requestBody;

    public function __construct(string $url, array $requestBody)
    {
        $this->url = $url;
        $this->requestBody = $requestBody;
    }
}