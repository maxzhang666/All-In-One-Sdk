<?php

namespace MaxZhang\AllInOne\Apps\HaoDanKu\Tools;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\HaoDanKuRequest;

/**
 * 唯品会超级搜索
 * https://www.haodanku.com/openapi/api_detail?id=68
 */
class VpSearchRequest extends HaoDanKuRequest
{

    protected $apiMethodUrl = 'vip_goods_search';

    /**
     * 搜索关键词，同时也支持商品ID搜索即keyword=商品ID（由于存在特殊符号搜索的关键词必须进行两次urlencode编码）
     * 是
     * @var string
     */
    public $keyword;
    /**
     * 分页大小(100以内)
     * 是
     * @var integer
     */
    public $minSize = 10;
    /**
     * 分页，用于实现类似分页抓取效果，来源于上次获取后的数据的min_id值，默认开始请求值为1（该方案比单纯123分页的优势在于：数据更新的情况下保证不会重复也无需关注和计算页数）
     * 是
     * @var integer
     */
    public $minId = 1;
    /**
     * 最低原价（默认为0），例如传10则只取大于等于10元的原价商品数据
     * 否
     * @var integer
     */
    public $startPrice = 0;
    /**
     * 最高原价
     * 否
     * @var integer
     */
    public $endPrice;


    /**
     * @inheritDoc
     */
    function generateParams(): array
    {
        return [
            'keyword'     => $this->keyword,
            'min_size'    => $this->minSize,
            'min_id'      => $this->minId,
            'start_price' => $this->startPrice,
            'end_price'   => $this->endPrice
        ];
    }

    /**
     * @inheritDoc
     * @throws \MaxZhang\AllInOne\Exceptions\InvalidArgumentException
     */
    function check(): bool
    {
        if (empty($this->keyword)) {
            throw new InvalidArgumentException("keyword is required");
        }
        if (empty($this->minSize)) {
            throw new InvalidArgumentException("minSize is required");
        }
        if (empty($this->minId)) {
            throw new InvalidArgumentException("minId is required");
        }

        return true;
    }
}