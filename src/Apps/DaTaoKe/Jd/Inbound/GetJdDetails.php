<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Jd\Inbound;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 *
 * @version 1.0.0
 * 应用场景：
 * 当用户点击某个京东商品时，调用该接口。获取对应商品的详细信息
 * 接口说明：
 * 通过京东商品SKUID，获取指定商品的详细详细数据（商品价格，优惠券信息，详情图，主图……） ，最多支持10个商品同时查询
 * https://www.dataoke.com/kfpt/api-d.html?id=64
 * @deprecated 官方已废弃
 */
class GetJdDetails extends DaTaoKeRequest
{

    protected $apiMethodName = 'api/dels/jd/goods/get-details';
    protected $version = 'v1.0.0';

    /**
     * @var string 商品skuId，多个使用逗号分隔，最多支持10个skuId同时查询（需使用半角状态下的逗号）
     */
    public $skuIds;

    function check(): bool
    {
        if (!isset($this->skuIds)) {
            throw new InvalidArgumentException('skuids is required !');
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    function generateParams(): array
    {
        return ['skuIds' => $this->skuIds];
    }
}