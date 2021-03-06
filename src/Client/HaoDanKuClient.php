<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use MaxZhang\AllInOne\Request\IRequest;

class HaoDanKuClient extends BaseClient implements IClient
{
    protected $root = 'http://v2.api.haodanku.com/';
    private $apikey;


    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }


    /**
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function execute(IRequest $request)
    {
        //检查参数完整性
        $request->check();

        $paramsArray = $request->getApiParams() ?? [];

        if (empty($this->apikey)) {
            throw new InvalidArgumentException('apikey is required!');
        }

        $paramsArray['apikey'] = $this->apikey;

        try {
            $res = $this->curl($this->root . $request->getApiMethodUrl(), $paramsArray, $request->getMethodType(), [], $request->getPostType());
            $obj = json_decode($res, true);
            return json_last_error() ? $res : $obj;
        } catch (HttpException $e) {
            throw  new HttpException("[" . $request->getApiMethodUrl() . "]" . $e->getMessage(), $e->getCode());
        }
    }


    public function getRootServer(): string
    {
        return $this->root;
    }
}