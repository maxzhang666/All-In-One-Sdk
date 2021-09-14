<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Request\IRequest;

class HaoDanKuClient extends BaseClient implements IClient
{
    protected $root = 'https://v2.api.haodanku.com/';
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

        $paramsArray           = $request->getApiParams() ?? [];
        $paramsArray['apikey'] = $this->apikey;

        try {
            $res = $this->curl($request->getApiMethodUrl(), $paramsArray);
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