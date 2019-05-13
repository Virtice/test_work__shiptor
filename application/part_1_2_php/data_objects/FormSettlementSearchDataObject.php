<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 20:13
 */

namespace data_objects;


class FormSettlementSearchDataObject implements ActionParamsDataObjectInterface
{
    /**
     * @var string
     */
    public $searchString;

    public function __construct(string $searchString)
    {
        $this->searchString = $searchString;
    }
}