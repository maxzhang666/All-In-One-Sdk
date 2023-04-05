<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel;

use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 * 历史新低商品合集
 * 应用场景：
 * 用于搭建应用内的营销专区，或在社群内进行分发推广
 * 接口说明：
 * 接口返回上线大淘客且处于最低价格的商品合集
 * https://www.dataoke.com/kfpt/api-d.html?id=48
 */
class HistoryLowPriceListRequest extends DaTaoKeRequest
{

    protected $apiMethodName = 'api/goods/get-history-low-price-list';
    protected $version = 'v1.0.0';

    /**
     * 页码，默认1
     * @var int
     */
    public $pageId = 1;
    /**
     * 每页条数，默认20，上限100
     * @var int
     */
    public $pageSize = 20;

    /**
     * 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。
     * @var int
     */
    public $cids;
    /**
     * 排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
     * @var string
     */
    public $sort = "0";

    /**
     */
    function generateParams(): array
    {
        return [
            'pageId' => $this->pageId,
            'pageSize' => $this->pageSize,
            'cids' => $this->cids,
            'sort' => $this->sort
        ];
    }

    function check(): bool
    {
        return true;
    }
}