<?php

namespace Tests\HaoDanKu\Search;


use MaxZhang\AllInOne\Apps\HaoDanKu\Search\VpSearchRequest;
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

        self::assertIsBool($res['code'] == 1 && count($res['data']) > 0);
    }

    /**
     * @test
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function searchNotFoundTest()
    {
        $req = new VpSearchRequest();

        $req->keyword = '691814024359821';

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool($res['code'] == 1 && count($res['data']) == 0);
    }

}