<?php

namespace MaxZhang\AllInOne\Request;

use MaxZhang\AllInOne\Constants\RequestMethodType;
use MaxZhang\AllInOne\Constants\RequestPostType;

/**
 * 方便后期加默认函数
 */
abstract class BaseRequest implements IRequest
{
    protected $apiParams = array();
    protected $apiMethodUrl;
    protected $postType = RequestPostType::JSON;
    protected $methodType = RequestMethodType::GET;

    /**
     * 生成参数表
     * @return array
     */
    public abstract function generateParams(): array;

    /**
     * 参数有效性检测
     * @return bool
     */
    public abstract function check(): bool;

    /**
     * 获取组装好的请求数据
     * @return array
     */
    public abstract function getApiParams(): array;

    /**
     * 获取接口的方法名称
     * @return array
     */
    public abstract function getApiMethodUrl(): array;

    /**
     * @param string $method
     */
    public function setMethodType(string $method = RequestMethodType::GET): void
    {
        $this->methodType = $method;
    }

    /**
     * @param string $postType
     */
    public function setPostType(string $postType = RequestPostType::JSON): void
    {
        $this->postType = $postType;
    }

    public function getMethodType(): string
    {
        return $this->methodType;
    }

    public function getPostType(): string
    {
        return $this->postType;
    }


}