<?php

namespace MaxZhang\AllInOne\Apps\SuNing\Union;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\IRequest;
use MaxZhang\AllInOne\Request\SuNingRequest;

class DetailRequest extends SuNingRequest implements IRequest
{
    protected $apiMethodUrl = "suning.netalliance.commoditydetail.query";
    protected $apiName = "queryCommoditydetail";

    /**
     * @var string 城市编码 默认为025
     */
    public $cityCode;
    /**
     * @var string 格式 商品编码1-供应商编码1_商品编码2-供应商编码2... 商品编码取有效位，供应商编码左补零至10位 最大查询10个商品
     */
    public $commodityStr;
    /**
     * @var string 图片宽度 默认为200
     */
    public $picWidth;
    /**
     * @var string 图片高度 默认为200
     */
    public $picHeight;
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
            'cityCode'     => $this->cityCode,
            'commodityStr' => $this->commodityStr,
            'picWidth'     => $this->picWidth,
            'picHeight'    => $this->picHeight,
            'couponMark'   => $this->couponMark
        ];
    }

    /**
     * @inheritDoc
     * @throws \MaxZhang\AllInOne\Exceptions\InvalidArgumentException
     */
    public function check(): bool
    {
        if (is_null($this->commodityStr)) {
            throw new InvalidArgumentException('commodityStr is required');
        }
        return true;
    }

}