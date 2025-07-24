<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Jd\Search;

use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 *
 * 京东联盟搜索
 * 应用场景：
 * 用于搭建和完善搜索页面，基于京东联盟进行搜索
 * 接口说明：
 * 接口通过关键词搜索以及其他筛选条件返回京东联盟对应条件的商品数据
 * https://www.dataoke.com/kfpt/api-d.html?id=70
 * @deprecated 官方已废弃
 */
class JdSearchRequest extends DaTaoKeRequest
{

    protected $apiMethodName = "api/dels/jd/goods/search";
    protected $version = "v1.0.0";

    /**
     * @var int 一级类目id
     */
    public $cid1;
    /**
     * @var int 二级类目id
     */
    public $cid2;
    /**
     * @var int 三级类目id
     */
    public $cid3;
    /**
     * @var int 页码
     */
    public $pageId;
    /**
     * @var int 每页数量，单页数最大30，默认20
     */
    public $pageSize;
    /**
     * @var string skuid集合(一次最多支持查询100个sku)，多个使用“,”分隔符
     */
    public $skuIds;

    /**
     * @var string 关键词，字数同京东商品名称一致，目前未限制
     */
    public $keyword;

    /**
     * @var double 商品券后价格下限
     */
    public $priceFrom;

    /**
     * @var double 商品券后价格上限
     */
    public $priceTo;

    /**
     * @var int 佣金比例区间开始
     */
    public $commissionShareStart;

    /**
     * @var int 佣金比例区间结束
     */
    public $commissionShareEnd;

    /**
     * @var string 商品类型：自营[g]，POP[p]
     */
    public $owner;
    /**
     * @var string 排序字段(price：单价, commissionShare：佣金比例, commission：佣金， inOrderCount30Days：30天引单量， inOrderComm30Days：30天支出佣金)
     */
    public $sortName;

    /**
     * @var string asc：升序；desc：降序。默认降序
     */
    public $sort;

    /**
     * @var int 是否是优惠券商品，1：有优惠券，0：无优惠券
     */
    public $isCoupon;


    /**
     * @var double 拼购价格区间开始
     */
    public $pingouPriceStart;

    /**
     * @var double 拼购价格区间结束
     */
    public $pingouPriceEnd;

    /**
     * @var string 品牌code
     */
    public $brandCode;

    /**
     * @var int 店铺Id
     */
    public $shopId;

    /**
     * @var int 1：查询有最优惠券商品；其他值过滤掉此入参条件。（查询最优券需与isCoupon同时使用）
     */
    public $hasBestCoupon;

    /**
     * @var string 联盟id_应用iD_推广位id
     */
    public $pid;

    /**
     * @var string 京喜商品类型，1京喜、2京喜工厂直供、3京喜优选（包含3时可在京东APP购买），入参多个值表示或条件查询
     */
    public $jxFlags;

    /**
     * @var int 主商品spuId
     */
    public $spuId;

    /**
     * @var string 优惠券链接
     */
    public $couponUrl;

    /**
     * @var int 京东配送 1：是，0：不是
     */
    public $deliveryType;


    /**
     * @inheritDoc
     */
    function generateParams(): array
    {
        return [
            'cid1'                 => $this->cid1,
            'cid2'                 => $this->cid2,
            'cid3'                 => $this->cid3,
            'pageId'               => $this->pageId,
            'pageSize'             => $this->pageSize,
            'skuIds'               => $this->skuIds,
            'keyword'              => $this->keyword,
            'priceFrom'            => $this->priceFrom,
            'priceTo'              => $this->priceTo,
            'commissionShareStart' => $this->commissionShareStart,
            'commissionShareEnd'   => $this->commissionShareEnd,
            'owner'                => $this->owner,
            'sortName'             => $this->sortName,
            'sort'                 => $this->sort,
            'isCoupon'             => $this->isCoupon,
            'pingouPriceStart'     => $this->pingouPriceStart,
            'pingouPriceEnd'       => $this->pingouPriceEnd,
            'brandCode'            => $this->brandCode,
            'shopId'               => $this->shopId,
            'hasBestCoupon'        => $this->hasBestCoupon,
            'pid'                  => $this->pid,
            'jxFlags'              => $this->jxFlags,
            'spuId'                => $this->spuId,
            'couponUrl'            => $this->couponUrl,
            'deliveryType'         => $this->deliveryType,
        ];
    }

    /**
     * @inheritDoc
     */
    function check(): bool
    {
        return true;
    }
}