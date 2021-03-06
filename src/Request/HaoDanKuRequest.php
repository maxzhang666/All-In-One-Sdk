<?php

namespace MaxZhang\AllInOne\Request;

abstract class HaoDanKuRequest extends BaseRequest implements IRequest
{
    protected $apikey;

    /**
     * @inheritDoc
     */
    abstract function generateParams(): array;

    /**
     * @inheritDoc
     */
    abstract function check(): bool;

    /**
     * @inheritDoc
     */
    function getApiParams(): array
    {
        $this->apiParams = $this->generateParams();

        return array_merge([
                               'apikey' => $this->apikey
                           ], $this->apiParams);
    }

    /**
     * @inheritDoc
     */
    function getApiMethodUrl(): string
    {
        return $this->apiMethodUrl;
    }
}