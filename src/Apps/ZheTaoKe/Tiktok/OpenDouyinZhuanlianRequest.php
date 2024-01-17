<?php

namespace MaxZhang\AllInOne\Apps\ZheTaoKe\Tiktok;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\ZheTaoKeRequest;

/**
 * https://www.zhetaoke.com/one/api3.aspx
 */
class OpenDouyinZhuanlianRequest extends ZheTaoKeRequest
{
    protected $apiMethodName = '/api/open_douyin_zhuanlian.ashx';



    /**
     * @var string 对应的淘客账号授权SID
     */
    public $sid;

    /**
     * @var string 商品URL/口令/短链接
     */
    public $productUrl;

    /**
     * @var string 自定义字段，只允许数字，限制长度为11位,返利专用字段，不返利不要填写
     */
    public $externalInfo;

    /**
     * @var bool 是否返回商品惠后价领券链接(如果商品有优惠则返回，否则不返回)
     */
    public $use_coupon;

    /**
     * @var bool 是否返回站外H5链接
     */
    public $need_share_link;


    public function generateParams(): array
    {
        return [
            'product_url'     => $this->productUrl,
            'external_info'   => $this->externalInfo,
            'use_coupon'      => $this->use_coupon,
            'need_share_link' => $this->need_share_link,
        ];
    }

    public function check(): bool
    {
        if (is_null($this->productUrl)) {
            throw new InvalidArgumentException('productUrl is required');
        }
        return true;
    }
}