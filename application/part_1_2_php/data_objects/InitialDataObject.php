<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 18:05
 */

namespace application\part_1_2_php\data_objects;


class InitialDataObject
{
    /**
     * @var string
     */
    private $parentKladrId;

    public function __construct(string $parentKladrId)
    {

        $this->parentKladrId = $parentKladrId;
    }
}