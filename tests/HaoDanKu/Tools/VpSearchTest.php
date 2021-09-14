<?php

namespace Tests\HaoDanKu\Tools;

use MaxZhang\AllInOne\Apps\HaoDanKu\Tools\VpSearchRequest;
use Tests\BaseTest;
use Tests\HaoDanKu\HaoDanKuBaseTest;


class VpSearchTest extends HaoDanKuBaseTest
{
    /**
     * @test
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function searchTest()
    {
        $req = new VpSearchRequest();

        $req->keyword = '6918140243598218974';

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool($res['code'] == 1);
    }

}