<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel;

use http\Exception\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 *  猜你喜欢
 * https://www.dataoke.com/pmc/api-d.html?id=16
 * 一般用在首页底部，或者个人中心底部。根据用户浏览的类型，进行猜你喜欢推荐。帮助用户进一步转化
 */
class GuessLikeRequest extends DaTaoKeRequest
{

    protected $apiMethodName = 'api/goods/list-similer-goods-by-open';
    protected $version = 'v1.2.2';

    /**
     * @var string 淘宝商品ID
     */
    public $id;

    /**
     * @var int 每页条数，默认10 ， 最大值100
     */
    public $size = 10;


    function generateParams(): array
    {
        return [
            'id' => $this->id,
            'size' => $this->size
        ];
    }

    function check(): bool
    {
        if (!isset($this->id)) {
            throw new InvalidArgumentException('id is required');
        }
        return true;
    }
}