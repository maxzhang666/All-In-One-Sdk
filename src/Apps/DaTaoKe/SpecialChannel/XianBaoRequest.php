<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\SpecialChannel;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 * 线报
 * https://www.dataoke.com/pmc/api-d.html?id=62
 */
class XianBaoRequest extends DaTaoKeRequest
{


    protected $apiMethodName = "api/dels/spider/list-tip-off";
    protected $version = "v4.0.0";

    /**
     * 类型：1淘宝商品2天猫商品3猫超商品4店铺5会场6优惠券7京东商品
     * @var int
     */
    public $topic;

    /**
     * 分类：1淘宝好价，2天猫超市，3京东好价
     * @var int
     */
    public $type;

    /**
     * @var int 页码，默认为1
     */
    public $pageId;

    /**
     * @var int 每页条数，每页记录数，默认20
     */
    public $pageSize;

    /**
     * @var int rush-整点抢购时的时间戳（秒），示例：1617026400
     */
    public $selectTime;

    /**
     * 生成参数表
     */
    function generateParams(): array
    {
        return [
            'topic'      => $this->topic,
            'type'       => $this->type,
            'pageId'     => $this->pageId,
            'pageSize'   => $this->pageSize,
            'selectTime' => $this->selectTime,
        ];
    }

    /**
     * @return mixed
     */
    function check(): bool
    {
        return true;
    }
}