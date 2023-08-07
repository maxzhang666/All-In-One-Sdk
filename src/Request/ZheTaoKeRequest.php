<?php

namespace MaxZhang\AllInOne\Request;

use MaxZhang\AllInOne\Constants\RequestPostType;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;

abstract class ZheTaoKeRequest extends BaseRequest implements IRequest
{
    protected $apiParams = array();
    protected $apiMethodName;
    protected $version;
    protected $postType = RequestPostType::FORMDATA_URL_ENCODE;

    /**
     * 生成参数表
     */
    abstract public function generateParams(): array;

    /**
     * @return mixed
     * @throws InvalidArgumentException
     */
    abstract public function check(): bool;

    /**
     * 生成参数表
     */
    function getApiParams(): array
    {
        $this->apiParams = $this->generateParams();
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