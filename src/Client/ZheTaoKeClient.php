<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Exceptions\Exception;
use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\IRequest;

class ZheTaoKeClient extends BaseClient implements IClient
{
    protected $appKey;
    protected $port;

    public function __construct($appKey, $port = 10001)
    {
        $this->appKey = $appKey;
        $this->port   = $port;
    }


    public function getRootServer(): string
    {
        return 'https://api.zhetaoke.com:' . $this->port;
    }

    /**
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function execute(IRequest $request)
    {

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
        $paramsArray['appkey'] = $this->appKey;

        try {
            $endpoint = $this->getRootServer() . $request->getApiMethodUrl();
            $resp     = $this->curl($endpoint, $paramsArray);
            $obj      = json_decode($resp, true);
            return json_last_error() ? $resp : $obj;
        } catch (Exception $e) {
            throw  new HttpException($e->getMessage() . $endpoint, $e->getCode());
        }
    }

}