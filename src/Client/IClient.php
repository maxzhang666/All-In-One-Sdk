<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Request\IRequest;

/**
 * 三方平台客户端
 */
interface IClient
{
    public function getRootServer(): string;

    public function execute(IRequest $request);
}