<?php

namespace MaxZhang\AllInOne\Apps\SuNing\Union;

use MaxZhang\AllInOne\Request\IRequest;
use MaxZhang\AllInOne\Request\SuNingRequest;

class SearchRequest extends SuNingRequest implements IRequest
{

    protected $apiName = "querySearchcommodity";
    protected $apiMethodUrl="suning.netalliance.searchcommodity.query";

    /**
     * @var string 页码 默认为1
     */
    public $pageIndex = 1;
    /**
     * @var string 关键字
     */
    public $keyword;
    /**
     * @var string 销售目录ID
     */
    public $saleCategoryCode;
    /**
     * @var string 城市编码 默认025
     */
    public $cityCode;
    /**
     * @var string 是否苏宁自营 默认为空，1：是
     */
    public $suningService;
    /**
     * @var string 是否拼购 默认为空 1：是
     */
    public $pgSearch;
    /**
     * @var string 开始价格
     */
    public $startPrice;
    /**
     * @var string 结束价格
     */
    public $endPrice;
    /**
     * @var string 排序规则 1：综合（默认） 2：销量由高到低 3：价格由高到低 4：价格由低到高 5：佣金比例由高到低 6：佣金金额由高到低 7：两个维度，佣金金额由高到低，销量由高到低8：近30天推广量由高到低9：近30天支出佣金金额由高到低。
     */
    public $sortType;
    /**
     * @var string 图片宽度 默认200
     */
    public $picWidth;
    /**
     * @var string 图片高度 默认200
     */
    public $picHeight;
    /**
     * @var string 每页条数 默认10，最大支持40
     */
    public $size;
    /**
     * @var string 1：减枝 2：不减枝 sortType=1（综合） 默认不剪枝 其他排序默认剪枝
     */
    public $branch;
    /**
     * @var string 是否苏宁服务 1:是
     */
    public $snfwservice;
    /**
     * @var string 是否苏宁国际 1:是
     */
    public $snhwg;
    /**
     * @var string 1:有券；其他:全部
     */
    public $coupon;
    /**
     * @var string 1表示拿到券后价，不传按照以前逻辑取不到券后价
     */
    public $couponMark;


    /**
     * @inheritDoc
     */
    public function generateParams(): array
    {
        return [
            'pageIndex'          => $this->pageIndex
            , 'keyword'          => $this->keyword
            , 'saleCategoryCode' => $this->saleCategoryCode
            , 'cityCode'         => $this->cityCode
            , 'suningService'    => $this->suningService
            , 'pgSearch'         => $this->pgSearch
            , 'startPrice'       => $this->startPrice
            , 'endPrice'         => $this->endPrice
            , 'sortType'         => $this->sortType
            , 'picWidth'         => $this->picWidth
            , 'picHeight'        => $this->picHeight
            , 'size'             => $this->size
            , 'branch'           => $this->branch
            , 'snfwservice'      => $this->snfwservice
            , 'snhwg'            => $this->snhwg
            , 'coupon'           => $this->coupon
            , 'couponMark'       => $this->couponMark
        ];
    }


    /**
     * @inheritDoc
     */
    public function check(): bool
    {
        return true;
    }


}