<?php

namespace MaxZhang\AllInOne\Apps\DaTaoKe\Jd\Base;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;

/**
 *
 * 京东商品转链
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
class PromotionUnionConvertRequest extends DaTaoKeRequest
{

    protected $apiMethodName = 'api/dels/jd/kit/promotion-union-convert';
    protected $version = 'v1.0.0';

    /**
     * 推客的联盟ID
     * @var int
     */
    public $unionId;
    /**
     * 推广物料url，例如活动链接、商品链接等；不支持仅传入skuid
     * @var string
     */
    public $materialId;
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
     * @var string 优惠券领取链接，在使用优惠券、商品二合一功能时入参，且materialId须为商品详情页链接（5.27更新：若不填则会自动匹配上全额最大的优惠券进行转链）
     */
    public $couponUrl;

    /**
     * @var int 转链类型，默认短链，短链有效期60天1：长链2：短链 3：长链+短链，
     */
    public $chainType;
    /**
     * @var string 礼金批次号
     */
    public $giftCouponKey;

    /**
     * @inheritDoc
     */
    function generateParams(): array
    {
        return [
            'unionId'       => $this->unionId,
            'materialId'    => $this->materialId,
            'positionId'    => $this->positionId,
            'childPid'      => $this->childPid,
            'subUnionId'    => $this->subUnionId,
            'couponUrl'     => $this->couponUrl,
            'chainType'     => $this->chainType,
            'giftCouponKey' => $this->giftCouponKey,
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
        if (is_null($this->materialId)) {
            throw new InvalidArgumentException("materialId is required!");
        }
        return true;
    }
}