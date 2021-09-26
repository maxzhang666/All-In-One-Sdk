<?php

namespace MaxZhang\AllInOne\Request;


use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;

abstract class SuNingRequest extends BaseRequest implements IRequest
{

    protected $apiName;

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
        return [
            "sn_request" => [
                "sn_body" => [
                    $this->apiName => $para
                ]
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function getApiMethodUrl(): string
    {
        return $this->apiName;
    }
}