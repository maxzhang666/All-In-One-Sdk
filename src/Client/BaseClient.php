<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Constants\RequestMethodType;
use MaxZhang\AllInOne\Constants\RequestPostType;
use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Request\IRequest;


class BaseClient implements IClient
{
    /**
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function execute(IRequest $request)
    {
        //检查参数完整性
        $request->check();

        $paramsArray = $request->getApiParams() ?? [];

        try {
            $res = $this->curl($request->getApiMethodUrl(), $paramsArray);
            $obj = json_decode($res, true);
            return json_last_error() ? $res : $obj;
        } catch (HttpException $e) {
            throw  new HttpException("[" . $request->getApiMethodUrl() . "]" . $e->getMessage(), $e->getCode());
        }
    }

    protected function curl($url, $dataFields = null, $methodType = RequestMethodType::GET, $header = [], $postType = RequestPostType::JSON)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // curl_setopt($ch, CURLOPT_TIMEOUT, self::$readTimeout);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);

        //请求方式判断
        if ($methodType == RequestMethodType::GET) {
            $url .= '?';
            if (count($dataFields) > 0) {
                $url .= http_build_query($dataFields);
            }
        } else {
            //post模式下请求参数类型判断
            curl_setopt($ch, CURLOPT_POST, true);
            $postData = json_encode($dataFields);
            if ($postType != RequestPostType::JSON) {
                $postData = http_build_query($dataFields);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }

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