<?php

namespace MaxZhang\AllInOne\Request;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;

abstract class DaTaoKeRequest extends BaseRequest implements IRequest
{
    protected $apiParams = array();
    protected $apiMethodName;
    protected $version;

    /**
     * 生成参数表
     */
    abstract public function generateParams(): array;

    /**
     * @return mixed
     * @throws InvalidArgumentException
     */
    abstract function check(): bool;

    /**
     * 生成参数表
     */
    function getApiParams(): array
    {
        $this->apiParams            = $this->generateParams();
        $this->apiParams['version'] = $this->version;
        return $this->apiParams;
    }

    /**
     * 获取接口的方法名称
     * @return string
     */
    public function getApiMethodUrl(): string
    {
        return $this->apiMethodName;
    }
}