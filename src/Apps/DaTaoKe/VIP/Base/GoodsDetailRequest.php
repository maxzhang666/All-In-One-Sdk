<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\VIP\Base;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 * 应用场景：
 * 当用户点击某个唯品会商品时，调用该接口。获取对应商品的详细信息
 * 接口说明：
 * 通过商品id，获取指定商品的详细详细数据（商品价格，优惠券信息，详情图，主图……）
 * https://www.dataoke.com/kfpt/api-d.html?id=100
 */
class GoodsDetailRequest extends DaTaoKeRequest
{
    //https://openapi.dataoke.com/api/vip/goods-detail
    protected $apiMethodName = "api/vip/goods-detail";
    protected $version = "v1.0.0";

    /**
     * @var string 请自行序列化!!!商品id列表，格式要求：["6919971123658715971"]
     */
    public $goodsIdList;
    /**
     *
     * @var string 自定义渠道标识,同推广位, pid
     */
    public $chanTag;
    /**
     * @var string 唯品会授权id
     */
    public $authId;
    /**
     * @var string 自行序列化!!!入参示例{"openId":"1223bhjh","realCall":true,}。openId用户授权绑定唯品会账号的标识；realCall留空为false。1、true：由用户实时触发的请求，实时给用户展示联盟返回的商品信息或者实时给用户转链生成推广链接。 false：不是由用户实时触发 2、由渠道后台job触发的请求，比如渠道后台job定期调联盟接口拉取商品到渠道自己的库，请按实际情况传该参数
     */
    public $request;

    public function generateParams(): array
    {
        return [
            'goodsIdList' => $this->goodsIdList,
            'chanTag'     => $this->chanTag,
            'authId'      => $this->authId,
            'request'     => $this->request,
        ];
    }

    public function check(): bool
    {
        if (is_null($this->goodsIdList)) {
            throw new InvalidArgumentException("goodsIdList is required!");
        }
        if (is_null($this->request)) {
            $this->request = '{"openId":"1223bhjh","realCall":true,}';
        }
        return true;
    }
}