<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 20:13
 */

namespace data_objects;


class FormShippingSelectDataObject implements ActionParamsDataObjectInterface
{
    /**
     * @var string
     */
    public $shippingId;

    public function __construct(string $shippingId)
    {
        $this->shippingId = $shippingId;
    }
}