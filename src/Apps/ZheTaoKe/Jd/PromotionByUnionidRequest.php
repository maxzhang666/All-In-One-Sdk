<?php

namespace MaxZhang\AllInOne\Apps\ZheTaoKe\Jd;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\ZheTaoKeRequest;

/**
 * 京东转链
 */
class PromotionByUnionidRequest extends ZheTaoKeRequest
{

    protected $apiMethodName = '/api/open_jing_union_open_promotion_byunionid_get.ashx';


    /**
     * @var string 推广物料url，例如活动链接、商品链接等；支持仅传入skuid
     * 重要的事情说三遍：该参数需要进行Urlencode编码！该参数需要进行Urlencode编码！该参数需要进行Urlencode编码！
     */
    public $materialId;
    /**
     *
     * @var string 京东联盟ID，为一串数字
     * 重要的事情说三遍：该参数可以自定义数字！该参数可以自定义数字！该参数可以自定义数字！
     * 自定义的数字，自己在本地跟用户做好关联，订单中会透出自定义的数字。
     * 如果返利需要用到此字段，如果是导购，不需要此字段。
     */
    public $unionId;
    /**
     * @var string 自定义推广位id
     */
    public $positionId;
    /**
     * @var string 联盟子推客身份标识（不能传入接口调用者自己的pid）
     */
    public $pid;
    /**
     * @var string 优惠券领取链接，在使用优惠券、商品二合一功能时入参，且materialId须为商品详情页链接。
     * 该参数值不为空时，优先使用传入的优惠券，否则自动匹配官方优惠券。
     * 重要的事情说三遍：该参数需要进行Urlencode编码！该参数需要进行Urlencode编码！该参数需要进行Urlencode编码！
     */
    public $couponUrl;
    /**
     * @var string 子渠道标识，您可自定义传入字母、数字或下划线，最多支持80个字符，该参数会在订单行查询接口中展示。
     */
    public $subUnionId;
    /**
     * @var string 转链类型，1：长链， 2 ：短链 ，3： 长链+短链，默认短链，短链有效期60天。
     */
    public $chainType;
    /**
     * @var string 礼金批次号。
     */
    public $giftCouponKey;
    /**
     * @var string 默认0，signurl=0，返回官方转链结果
     * signurl=5，返回结果整合京东商品详情API和京东转链API，调用一次接口，获取商品详情、商品优惠券信息和商品转链结果。
     * 注意，有些是活动链接或者非商品链接，这时候即使传入signurl=5，也只返回官方原版转链结果，所以请大家自己需要做好代码兼容。
     */
    public $signurl = 5;


    public function generateParams(): array
    {
        return [
            'materialId'    => $this->materialId,
            'unionId'       => $this->unionId,
            'positionId'    => $this->positionId,
            'pid'           => $this->pid,
            'couponUrl'     => $this->couponUrl,
            'subUnionId'    => $this->subUnionId,
            'chainType'     => $this->chainType,
            'giftCouponKey' => $this->giftCouponKey,
            'signurl'       => $this->signurl
        ];
    }

    public function check(): bool
    {
        if (!isset($this->materialId)) {
            throw new InvalidArgumentException("materialId is required!");
        }
        if (!isset($this->unionId)) {
            throw new InvalidArgumentException("unionId is required!");
        }
        return true;
    }
}