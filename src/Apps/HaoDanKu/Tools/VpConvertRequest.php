<?php

namespace MaxZhang\AllInOne\Apps\HaoDanKu\Tools;

use MaxZhang\AllInOne\Constants\RequestMethodType;
use MaxZhang\AllInOne\Constants\RequestPostType;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\HaoDanKuRequest;

/**
 * 唯品会商品转链
 * https://www.haodanku.com/openapi/api_detail?id=69
 */
class VpConvertRequest extends HaoDanKuRequest
{
    protected $apiMethodUrl = 'vip_ratesurl';
    protected $postType = RequestPostType::FORMDATA_URL_ENCODE;
    protected $methodType = RequestMethodType::POST;

    /**
     * 渠道标识
     * 否
     * @var string
     */
    public $relationId;
    /**
     * 您的PID
     * 是
     * @var string
     */
    public $pid;
    /**
     * 商品ID
     * 是
     * @var string
     */
    public $goodsid;


    /**
     * @inheritDoc
     */
    function generateParams(): array
    {
        return [
            'relation_id' => $this->relationId,
            'pid'         => $this->pid,
            'goodsid'     => $this->goodsid
        ];
    }

    /**
     * @inheritDoc
     * @throws \MaxZhang\AllInOne\Exceptions\InvalidArgumentException
     */
    function check(): bool
    {
        if (empty($this->goodsid)) {
            throw  new InvalidArgumentException('goodsid is required');
        }
        if (empty($this->pid)) {
            throw  new InvalidArgumentException('pid is required');
        }
        return true;
    }
}