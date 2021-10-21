<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Constants\RequestMethodType;
use MaxZhang\AllInOne\Constants\RequestPostType;
use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Request\IRequest;


abstract class BaseClient implements IClient
{
    public abstract function getRootServer(): string;


    /**
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public abstract function execute(IRequest $request);

    protected function curl($url, $dataFields = null, $methodType = RequestMethodType::GET, $header = [], $postType = RequestPostType::JSON)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_TIMEOUT, self::$readTimeout);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);

        // 请求方式判断
        if ($methodType == RequestMethodType::GET) {
            $url .= '?';
            if (count($dataFields) > 0) {
                $url .= http_build_query($dataFields);
            }
        } else {
            // post模式下请求参数类型判断
            curl_setopt($ch, CURLOPT_POST, true);
            $postData = json_encode($dataFields);
            if ($postType != RequestPostType::JSON) {
                $postData = http_build_query($dataFields);
            }
            $header = array_merge($header, ['Content-type:' . $postType]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        }

        // 配置请求地址
        curl_setopt($ch, CURLOPT_URL, $url);

        // 配置请求头
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        // https 请求 忽略证书验证问题
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new HttpException(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new HttpException("Network Error！httpStatusCode:[$httpStatusCode],response:[$response]");
            }
        }
        curl_close($ch);

        return $response;
    }

}