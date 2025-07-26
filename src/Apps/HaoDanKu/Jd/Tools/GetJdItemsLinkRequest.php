<?php

namespace MaxZhang\AllInOne\Apps\HaoDanKu\Jd\Tools;

use MaxZhang\AllInOne\Constants\RequestMethodType;
use MaxZhang\AllInOne\Constants\RequestPostType;
use MaxZhang\AllInOne\Request\HaoDanKuRequest;

/**
 * 京东商品转链
 * 不会自动带出优惠券信息
 * https://www.haodanku.com/openapi/api_detail?id=48
 */
class GetJdItemsLinkRequest extends HaoDanKuRequest
{

    //参数	类型	求参数值	是否必须	说明
    //apikey	string	你的apikey	是	应用中心获取Apikey值（*必要）
    //material_id	integer	xxxxxx_xxxxxxx	是	京东联盟商品ID（*必要）
    //union_id	integer	xxxxxxx	是	目标推客的联盟ID（*必要）
    //coupon_url	string	https://coupon.m.jd.com/coupons/show.action?key.......	否	优惠券链接
    //pid	string	123_456_789	否	推广位pid
    //subUnionId	string	618_18_c35***e6a	否	子渠道标识，仅支持传入字母、数字、下划线或中划线，最多80个字符（不可包含空格）
    //proType	integer	5	否	5：种草版二合一 （该字段使用条件：商详页有主图视频且有佣金+有券(coupon_url字段必填)的商品可使用）
    //scene_id	integer	1	否	场景ID

    protected $apiMethodUrl = 'get_jditems_link';

    protected $methodType = RequestMethodType::POST;
    protected $postType = RequestPostType::FORMDATA_URL_ENCODE;

    /**
     * @var string 京东联盟商品ID（*必要）
     */
    public $materialId;
    /**
     * @var int 目标推客的联盟ID（*必要）
     */
    public $unionId;
    /**
     * @var string 优惠券链接
     */
    public $couponUrl;
    /**
     * @var string 推广位pid
     */
    public $pid;
    /**
     * @var string 子渠道标识，仅支持传入字母、数字、下划线或中划线，最多80个字符（不可包含空格）
     */
    public $subUnionId;
    /**
     * @var int 场景ID
     */
    public $sceneId = 1;
    /**
     * @var int 二合一类型，5：种草版二合一 （该字段使用条件：商详页有主图视频且有佣金+有券(coupon_url字段必填)的商品可使用）
     */
    public $proType = 5;


    function generateParams(): array
    {
        return [
            'material_id' => $this->materialId,
            'union_id'    => $this->unionId,
            'coupon_url'  => $this->couponUrl,
            'pid'         => $this->pid,
            'subUnionId'  => $this->subUnionId,
            'scene_id'    => $this->sceneId,
            'proType'     => $this->proType,
        ];
    }

    function check(): bool
    {
        if (is_null($this->materialId)) {
            throw new \InvalidArgumentException("materialId is required!");
        }
        if (is_null($this->unionId)) {
            throw new \InvalidArgumentException("unionId is required!");
        }
        return true;
    }
}