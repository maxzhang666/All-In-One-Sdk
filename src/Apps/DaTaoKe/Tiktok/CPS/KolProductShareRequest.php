<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Tiktok\CPS;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

class KolProductShareRequest extends DaTaoKeRequest
{
    protected $apiServerRoot = 'https://openapiv2.dataoke.com/';
    protected $apiMethodName = 'open-api/tiktok-kol-product-share';
    protected $version = 'v1.0.0';

    /**
     * @var string 要转链的商品链接/口令
     */
    public $productUrl;
    /**
     * @var string 自定参数,最多7位，可以用来返利时传入用户参数，没有返利传0
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

    function check(): bool
    {
        if (is_null($this->productUrl)) {
            throw new InvalidArgumentException('productUrl is required');
        }
        if (is_null($this->externalInfo)) {
            throw new InvalidArgumentException('externalInfo is required');
        }
        return true;
    }
}