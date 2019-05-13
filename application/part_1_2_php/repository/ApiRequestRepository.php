<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 18:14
 */

namespace repository;


use data_objects\ApiRequestRepositoryDataObject;

class ApiRequestRepository
{
    public static function getHeaders()
    {
        return [
            'Content-Type: application/json; charset=utf-8',
            'x-authorization-token: 5a9a56c1d6bceaa9e6c2cde5fca94e8a996b6469',
        ];
    }

    public static function getDefaultSettlements(string $parentKladrId): ApiRequestRepositoryDataObject
    {
        return new ApiRequestRepositoryDataObject(
            'https://api.shiptor.ru/public/v1',
            [
                'id' => 'JsonRpcClient.js',
                'jsonrpc' => '2.0',
                'method' => 'getSettlements',
                'params' => [
                    'per_page' => 10,
                    'page' => 1,
                    'types' => [
                        'Город',
                    ],
                    'level' => 2,
                    'parent' => $parentKladrId,
                    'country_code' => 'RU',
                ],
            ]);
    }

    public static function getSearchSettlements(string $searchString)
    {
        return new ApiRequestRepositoryDataObject(
            'https://api.shiptor.ru/public/v1',
            [
                'id' => 'JsonRpcClient.js',
                'jsonrpc' => '2.0',
                'method' => 'suggestSettlement',
                'params' => [
                    'query' => $searchString,
                    'country_code' => 'RU',
                ],
            ]);
    }

    public static function getShippings(string $kladrId)
    {
        return new ApiRequestRepositoryDataObject(
            'https://api.shiptor.ru/public/v1',
            [
                'id' => 'JsonRpcClient.js',
                'jsonrpc' => '2.0',
                'method' => 'calculateShipping',
                'params' => [
                    'length' => 20,
                    'width' => 10,
                    'height' => 20,
                    'weight' => 1.5,
                    'cod' => 10,
                    'declared_cost' => 10,
                    'kladr_id' => $kladrId,
                ],
            ]);
    }
}