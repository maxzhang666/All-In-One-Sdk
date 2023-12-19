<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\VIP\Base;

use MaxZhang\AllInOne\Request\DaTaoKeRequest;

class PromoteLinkRequest extends DaTaoKeRequest
{
    //https://openapi.dataoke.com/api/vip/promote/link
    protected $apiMethodUrl = "api/vip/promote/link";
    protected $version = "v1.0.0";
    /**
     * @var string 请自行序列化!!!唯品会链接url列表,非联盟链接。格式如'["123123"]'
     */
    public $urlList;

    /**
     * @var string 自定义渠道统计参数
     */
    public $statParam;
    /**
     * @var  string 请自行序列化!!!cps链接生成请求参数。入参示例{"openId": "123abd","adCode": "1cvsn1qk","realCall": "true"}。openId用户授权绑定唯品会账号的标识；realCall1、true：由用户实时触发的请求，实时给用户展示联盟返回的商品信息或者实时给用户转链生成推广链接。 false：不是由用户实时触发 2、由渠道后台job触发的请求，比如渠道后台job定期调联盟接口拉取商品到渠道自己的库，请按实际情况传该参数；adCode标识获取推广物料的来源，从物料输出接口获取，如当前转链的物料不是从联盟物料接口获取，则传默认值adCode(工具商接口传vendoapi，渠道商接口传unionapi)，该参数用于优化用户推荐效果，请勿乱传。
     */
    public $urlGenRequest;
    /**
     * @var string 渠道标识
     */
    public $chanTag;
    /**
     * @var string 授权id
     */
    public $authId;

    public function generateParams(): array
    {
        // TODO: Implement generateParams() method.
    }

    function check(): bool
    {
        // TODO: Implement check() method.
    }
}