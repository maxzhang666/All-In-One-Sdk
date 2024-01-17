<?php

namespace MaxZhang\AllInOne\Apps\ZheTaoKe\VIP;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\ZheTaoKeRequest;

/**
 * 京东转链
 */
class GoodsDetailRequest extends ZheTaoKeRequest
{

    protected $apiMethodName = '/api/open_vip_getByGoodsIdsWithOauth.ashx';

    /**
     * @var string 对应的唯品会账号授权SID
     */
    public $sid;
    /**
     * @var string 唯品会商品id或者唯品会链接
     */
    public $id;

    /**
     * @return array
     */
    public function generateParams(): array
    {
        return [
            'sid' => $this->sid,
            'id'  => $this->id,
        ];
    }

    public function check(): bool
    {
        if (!isset($this->id)) {
            throw new InvalidArgumentException("id is required!");
        }
        if (!isset($this->sid)) {
            throw new InvalidArgumentException("sid is required!");
        }
        return true;
    }
}