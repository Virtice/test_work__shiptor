<?php
/**
 * User: Virtice <synd13@yandex.ru>
 * Date: 13.05.2019
 * Time: 18:14
 */

namespace application\part_1_2_php\components;


use application\part_1_2_php\data_objects\ApiRequestRepositoryDataObject;

class ApiRequester
{
    /**
     * @var array|null
     */
    private $headers;

    public function __construct(?array $headers)
    {
        $this->headers = $headers;
    }


    public function request(ApiRequestRepositoryDataObject $data): string
    {
        $handler = curl_init($data->url);
        curl_setopt($handler, CURLOPT_POST, true);
        curl_setopt($handler, CURLOPT_HEADER, false);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handler, CURLOPT_POSTFIELDS, json_encode($data->requestBody));
        curl_setopt($handler, CURLOPT_HTTPHEADER, $this->headers);
        $responseJson = curl_exec($handler);
        curl_close($handler);

        return $responseJson;
    }
}