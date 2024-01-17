<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Tiktok\CPS;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 * 应用场景：
 * 获取抖音一元购活动商品列表，可用于包装抖音一元购活动栏目页。
 * 接口说明：
 * 获取抖音一元购活动商品列表
 * https://www.dataoke.com/kfpt/api-d.html?id=112
 */
class OneYuanGoodsListRequest extends DaTaoKeRequest
{

    protected $apiMethodName = 'api/tiktok/tiktok-one-yuan-goods-list ';
    protected $version = 'v1.0.0';
    /**
     * @var int 分页（从1开始）
     */
    public $page = 1;
    /**
     * @var int 每页的数量
     */
    public $page_size = 20;
    /**
     * @var string 商品标题，从一元购商品中返回标题中包含某个关键词的商品
     */
    public $title;
    /**
     * @var string 筛选商品一级类目(多个用英文逗号隔开)
     */
    public $first_cids;
    /**
     * @var string 筛选商品二级类目(多个用英文逗号隔开)
     */
    public $second_cids;
    /**
     * @var string 筛选商品三级类目(多个用英文逗号隔开)
     */
    public $third_cids;
    /**
     * @var string  结果排序条件，0默认排序1历史销量排序2价格排序3佣金金额排序4佣金比例排序；
     */
    public $search_type;
    /**
     * @var string 排序顺序（0升序1降序）
     */
    public $sort_type;


    /**
     * @return array
     */
    public function generateParams(): array
    {
        return [
            'page'        => $this->page,
            'page_size'   => $this->page_size,
            'title'       => $this->title,
            'first_cids'  => $this->first_cids,
            'second_cids' => $this->second_cids,
            'third_cids'  => $this->third_cids,
            'search_type' => $this->search_type,
            'sort_type'   => $this->sort_type,
        ];
    }

    function check(): bool
    {
        if (is_null($this->search_type)) {
            throw new InvalidArgumentException('search_type is required');
        }

        if (is_null($this->sort_type)) {
            throw new InvalidArgumentException('sort_type is required');
        }
        return true;
    }
}