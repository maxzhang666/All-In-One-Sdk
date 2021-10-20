<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Base;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 * 淘系万能解析
 * 应用场景：
 * 从其他渠道获取热门商品，自己也想推广，如果文案中有口令或链接。则可以用此接口进行解析出对应商品id进行转链
 * 接口说明：
 * 可解析出淘口令或淘系链接里的商品信息，然后用户领券自购或者二次转链推广赚取佣金
 * https://www.dataoke.com/kfpt/api-d.html?id=33
 */
class ParseContentRequest extends DaTaoKeRequest
{
    protected $apiMethodUrl = "api/tb-service/parse-content";
    protected $version = "v1.0.0";

    /**
     * @var string 包含淘口令、链接的文本。优先解析淘口令，再按序解析每个链接，直至解出有效信息。如果淘口令失效或者不支持的类型的情况，会按顺序解析链接。如果存在解析失败，请再试一次
     */
    public $content;


    /**
     * @inheritDoc
     */
    function generateParams(): array
    {
        return [
            'content' => $this->content
        ];
    }

    /**
     * @inheritDoc
     */
    function check(): bool
    {
        if (is_null($this->content)) {
            throw new InvalidArgumentException("content is required!");
        }
    }
}