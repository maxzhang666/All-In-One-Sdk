<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Jd\Base;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 *
 * 京东商品批量转链
 * 应用场景：
 * 通常用户在京东商品详情页点击分享或者自购按钮时，调用转链接口
 * 接口说明：
 * 转链即将推广商品和您的标识（京东联盟ID）进行绑定。推广形成订单后，即可获得佣金
 * https://www.dataoke.com/pmc/api-d.html?id=52
 * {
 * requestId: "87076ffb11244b8a8d957932e6d36f5e",
 * time: 1606958817326,
 * code: 0,
 * msg: "成功",
 * data: {
 * shortUrl: "https://u.jd.com/tpi8t9B",
 * longUrl: ""
 * }
 *
 * }
 */
class BatchPromotionUnionConvertRequest extends DaTaoKeRequest
{

    protected $apiMethodName = 'api/dels/jd/kit/content/promotion-union-convert';
    protected $version = 'v1.0.0';

    /**
     * 推客的联盟ID
     * @var int
     */
    public $unionId;
    /**
     *
     * @var int 新增推广位id （若无subUnionId权限，可入参该参数用来确定不同用户下单情况）
     */
    public $positionId;
    /**
     * @var string 联盟子推客身份标识（不能传入接口调用者自己的pid）
     */
    public $childPid;
    /**
     * @var string 子渠道标识，您可自定义传入字母、数字或下划线，最多支持80个字符，该参数会在订单行查询接口中展示，需要有权限才可使用
     */
    public $subUnionId;
    /**
     * @var string 待转链京东商品物料地址(需要urlencode，优惠券无法进行转链，无法转链的地址会按照原数据返回)
     */
    public $content;

    /**
     * @inheritDoc
     */
    function generateParams(): array
    {
        return [
            'unionId'    => $this->unionId,
            'positionId' => $this->positionId,
            'childPid'   => $this->childPid,
            'subUnionId' => $this->subUnionId,
            'content'    => $this->content
        ];
    }

    /**
     * @inheritDoc
     */
    function check(): bool
    {
        if (is_null($this->unionId)) {
            throw new InvalidArgumentException("unionId is required!");
        }
        if (is_null($this->content)) {
            throw new InvalidArgumentException("content is required!");
        }
        return true;
    }
}