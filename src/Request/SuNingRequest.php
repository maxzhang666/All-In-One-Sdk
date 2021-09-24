<?php

namespace MaxZhang\AllInOne\Request;

abstract class SuNingRequest extends BaseRequest implements IRequest
{

    /**
     * @inheritDoc
     */
    abstract public function generateParams(): array;

    abstract function getApiName(): string;


    /**
     * @inheritDoc
     */
    abstract public function check(): bool;

    /**
     * @inheritDoc
     */
    public function getApiParams(): array
    {
        $para = $this->generateParams();
        return [
            "sn_request" => [
                "sn_body" => [
                    $this->getApiName() => $para
                ]
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function getApiMethodUrl(): string
    {
        return '';
    }
}