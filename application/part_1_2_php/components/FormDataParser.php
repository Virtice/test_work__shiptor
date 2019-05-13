<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 18:13
 */

namespace components;


use constants\FormConstants;
use data_objects\FormSettlementSearchDataObject;
use data_objects\FormSettlementSelectDataObject;
use data_objects\FormShippingSelectDataObject;

class FormDataParser
{

    public static function getSettlementSearchParams(array $post): FormSettlementSearchDataObject
    {
        return new FormSettlementSearchDataObject($post[FormConstants::FORM_NAME_SETTLEMENT_SEARCH_INPUT]);
    }

    public static function getShippingParams(array $post)
    {
        return new FormSettlementSelectDataObject($post[FormConstants::FORM_NAME_SETTLEMENT_SELECT_ID]);
    }

    public static function getShippingId(array $post)
    {
        return new FormShippingSelectDataObject($post[FormConstants::FORM_NAME_SHIPPING_SELECT_ID]);

    }
}