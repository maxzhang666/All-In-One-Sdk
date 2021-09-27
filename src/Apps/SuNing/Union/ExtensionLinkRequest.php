<?php

namespace MaxZhang\AllInOne\Apps\SuNing\Union;

use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\IRequest;
use MaxZhang\AllInOne\Request\SuNingRequest;

/**
 * 商品和券二合一接口
 * https://open.suning.com/ospos/apipage/toApiMethodDetailMenuNew.do?interCode=suning.netalliance.extensionlink.get
 */
class ExtensionLinkRequest extends SuNingRequest implements IRequest
{
    protected $apiName = 'getExtensionlink';
    protected $apiMethodUrl = 'suning.netalliance.extensionlink.get';


    /**
     * @var string 商品的URL仅支持拼购和易购单品
     */
    public $productUrl;
    /**
     * @var string 券URL有时生成券推广，没有时生成商品推广
     */
    public $quanUrl;
    /**
     * @var string 这个推广只联盟前台申请的推广位，如果没有可以不填
     */
    public $promotionId;
    /**
     * @var string 子会员编码
     */
    public $subUser;
    /**
     * @var string 工具商绑定关系pid
     */
    public $pid;
    /**
     * @var string 需要做转链的sugs短链
     */
    public $sugsUrl;


    /**
     * @inheritDoc
     */
    public function generateParams(): array
    {
        return [
            'productUrl'  => $this->productUrl,
            'quanUrl'     => $this->quanUrl,
            'promotionId' => $this->promotionId,
            'subUser'     => $this->subUser,
            'pid'         => $this->pid,
            'sugsUrl'     => $this->sugsUrl
        ];
    }

    /**
     * @inheritDoc
     * @throws \MaxZhang\AllInOne\Exceptions\InvalidArgumentException
     */
    public function check(): bool
    {
        if (is_null($this->productUrl)) {
            throw new InvalidArgumentException("productUrl is required");
        }
        return true;
    }

}