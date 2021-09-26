<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Request\IRequest;

class SuNingClient extends BaseClient implements IClient
{

    private $appkey;
    private $appsec;
    private $accessToken;

    private $appVersion = 'suning-sdk-php-beta0.1';

    public function __construct($appkey, $appsec, $accessToken)
    {
        $this->appkey      = $appkey;
        $this->appsec      = $appsec;
        $this->accessToken = $accessToken;
    }

    /**
     * 封装头信息及签名.
     *
     * $param array $params
     *
     * @return array
     */
    private function generateSignHeader($params)
    {
        $signString = '';
        foreach ($params as $k => $v) {
            $signString .= $v;
        }
        unset($k, $v);
        $signString = md5($signString);

        // 组装头文件信息
        $signDataHeader = array(
            'Content-Type: text/xml; charset=utf-8',
            'AppMethod: ' . $params['method'],
            'AppRequestTime: ' . $params['date'],
            'Format: json',
            'signInfo: ' . $signString,
            'AppKey: ' . $params['app_key'],
            'VersionNo: ' . $params['api_version'],
            'User-Agent: suning-sdk-php',
            'Sdk-Version: ' . $this->appVersion,
        );

        if (!empty($this->accessToken)) {
            $signDataHeader[] = 'access_token:' . $this->accessToken;
        }

        return $signDataHeader;
    }

    public function getRootServer(): string
    {
        return 'https://openpre.cnsuning.com/api/http/sopRequest';
    }

    /**
     * @param \MaxZhang\AllInOne\Request\IRequest $request
     */
    public function execute(IRequest $request)
    {
        $request->check();

        $apiParams = $request->getApiParams();

        // 组装系统参数
        $sysParams['secret_key']  = $this->appsec;
        $sysParams['method']      = $request->getApiMethodUrl()();
        $sysParams['date']        = date('Y-m-d H:i:s');
        $sysParams['app_key']     = $this->appkey;
        $sysParams['api_version'] = $this->appVersion;
        $sysParams['post_field']  = base64_encode(json_encode($apiParams));

        $signHeader = $this->generateSignHeader($sysParams);

        try {
            $res = $this->curl($this->getRootServer() . '/' . $request->getApiMethodUrl(), $apiParams, $request->getMethodType(), $signHeader);
            $obj = json_decode($res, true);
            return json_last_error() ? $res : $obj;
        } catch (HttpException $e) {
            throw  new HttpException("[" . $request->getApiMethodUrl() . "]" . $e->getMessage(), $e->getCode());
        }
    }
}