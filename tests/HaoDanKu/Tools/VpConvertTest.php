<?php

namespace Tests\HaoDanKu\Tools;


use MaxZhang\AllInOne\Apps\HaoDanKu\Tools\VpConvertRequest;
use MaxZhang\AllInOne\Client\HaoDanKuClient;

use Tests\BaseTest;
use Tests\HaoDanKuBaseTest;

class VpConvertTest extends HaoDanKuBaseTest
{

    /**
     * @test
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function vpConvert()
    {

        $req = new VpConvertRequest();
        $req->pid     = '';
        $req->goodsid = '6918140243598218974';

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool($res['code'] == 200);
    }


}
