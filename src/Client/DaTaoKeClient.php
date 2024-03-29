<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Exceptions\Exception;
use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\DaTaoKeRequest;
use MaxZhang\AllInOne\Request\IRequest;

class DaTaoKeClient extends BaseClient //implements IClient
{
    protected $appKey;
    protected $appSec;

    public function __construct($appKey, $appSec = '')
    {
        $this->appKey = $appKey;
        $this->appSec = $appSec;
    }


    public function getRootServer(): string
    {
        return 'http://openapi.dataoke.com/';
    }

    /**
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     * @throws \MaxZhang\AllInOne\Exceptions\InvalidArgumentException
     */
    public function execute(IRequest $request)
    {
        //$request = (DaTaoKeRequest)$request;
        //参数检查
        if (empty($this->appKey)) {
            throw new InvalidArgumentException("appKey can not empty ！");
        }
        //if (empty($this->appSec)) {
        //    throw new InvalidArgumentException("appSecret can not empty ！");
        //}
        try {
            $request->check();
        } catch (Exception $e) {
            throw new InvalidArgumentException('Invalid format:' . $e->getMessage() . '(' . $request->getApiMethodUrl() . ')');
        }
        $paramsArray = $request->getApiParams();
        if (empty($paramsArray)) {
            $paramsArray = [];
        }
        $paramsArray['appKey'] = $this->appKey;
        $paramsArray           = $this->signSendData($paramsArray, $request->needSign);

        try {
            $resp = $this->curl((empty($request->getApiServerRoot()) ? $this->getRootServer() : $request->getApiServerRoot()) . $request->getApiMethodUrl(), $paramsArray);
            $obj  = json_decode($resp, true);
            return json_last_error() ? $resp : $obj;
        } catch (Exception $e) {
            throw  new HttpException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * 对发送数据进行签名
     * @param      $para
     * @param bool $needSign
     * @return array
     */
    private function signSendData($para, bool $needSign = false): array
    {
        $_para = [];
        //过滤无效数据
        foreach ($para as $k => $value) {
            if (!empty($value) || !isset($value)) {
                $_para[$k] = $value;
            }
        }
        //不需要签名
        if ($needSign) {
            $sign          = $this->makeSign($_para, $this->appSec);
            $_para['sign'] = $sign;
        }
        return $_para;
    }

    /**参数加密
     * @param $data
     * @param $appSecret
     * @return string
     */
    private function makeSign($data, $appSecret)
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            if (empty($v)) {
                continue;
            }
            $str .= '&' . $k . '=' . $v;
        }
        $str  = trim($str, '&');
        $sign = strtoupper(md5($str . '&key=' . $appSecret));
        return $sign;
    }
}