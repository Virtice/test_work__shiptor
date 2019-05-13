<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 20:13
 */

namespace data_objects;


class FormSettlementSelectDataObject implements ActionParamsDataObjectInterface
{
    /**
     * @var string
     */
    public $kladrId;

    public function __construct(string $kladrId)
    {
        $this->kladrId = $kladrId;
    }
}