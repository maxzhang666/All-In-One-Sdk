<?php

namespace MaxZhang\AllInOne\Client;

use MaxZhang\AllInOne\Request\IRequest;

class SuNingClient extends BaseClient implements IClient
{
    public function getRootServer(): string
    {
        return 'https://openpre.cnsuning.com/api/http/sopRequest';
    }

    /**
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function execute(IRequest $request)
    {

    }

}