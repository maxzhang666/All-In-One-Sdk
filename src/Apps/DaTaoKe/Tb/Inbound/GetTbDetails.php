<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Tb\Inbound;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

class GetTbDetails extends DaTaoKeRequest
{

    protected $apiMethodName = 'api/goods/get-goods-details';
    protected $version = 'v1.2.3';

    /**
     * 大淘客商品id，请求时id或goodsId必填其中一个，若均填写，将优先查找当前单品id
     * @var int
     */
    public $id;
    /**
     * 淘宝商品id，id或goodsId必填其中一个，若均填写，将优先查找当前单品id
     * @var string
     */
    public $goodsId;

    /**
     */
    function generateParams(): array
    {
        return [
            'id'      => $this->id,
            'goodsId' => $this->goodsId
        ];
    }

    function check(): bool
    {
        if (!isset($this->id) && !isset($this->goodsId)) {
            throw new InvalidArgumentException('id or goodsId is required !');
        }
        return true;
    }
}