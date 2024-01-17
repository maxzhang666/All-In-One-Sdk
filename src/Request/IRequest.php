<?php

namespace MaxZhang\AllInOne\Request;

use MaxZhang\AllInOne\Constants\RequestMethodType;
use MaxZhang\AllInOne\Constants\RequestPostType;

/**
 * 求情规范
 */
interface IRequest
{
    /**
     * 生成参数表
     * @return array
     */
    function generateParams(): array;

    /**
     * 参数有效性检测
     * @return bool
     */
    public function check(): bool;

    /**
     * 获取组装好的请求数据
     * @return array
     */
    public function getApiParams(): array;

    /**
     * 获取接口的方法名称
     * @return string
     */
    public function getApiMethodUrl(): string;

    public function getApiServerRoot(): string;

    /**
     * @param string $method
     */
    public function setMethodType(string $method = RequestMethodType::GET);

    public function getMethodType(): string;

    /**
     * @param string $postType
     */
    public function setPostType(string $postType = RequestPostType::JSON);

    public function getPostType(): string;
}