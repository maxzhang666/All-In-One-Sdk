<?php

namespace MaxZhang\AllInOne\Request;


use MaxZhang\AllInOne\Constants\RequestMethodType;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;

abstract class SuNingRequest extends BaseRequest implements IRequest
{

    protected $apiName;
    protected $apiMethodUrl;
    protected $methodType = RequestMethodType::POST;

    /**
     * @inheritDoc
     */
    abstract public function generateParams(): array;

    /**
     * @inheritDoc
     */
    abstract public function check(): bool;

    /**
     * @inheritDoc
     * @throws \MaxZhang\AllInOne\Exceptions\InvalidArgumentException
     */
    public function getApiParams(): array
    {
        if (is_null($this->apiName)) {
            throw new InvalidArgumentException("apiName can not null!");
        }
        $para = $this->generateParams();

        $res = [
            "sn_request" => [
                "sn_body" => [
                    $this->apiName => []
                ]
            ]
        ];

        foreach ($para as $key => $item) {
            if (!is_null($item)) {
                $res['sn_request']['sn_body'][$this->apiName][$key] = $item;
            }
        }
        return $res;
    }

    /**
     * @inheritDoc
     */
    public function getApiMethodUrl(): string
    {
        return $this->apiMethodUrl;
    }
}