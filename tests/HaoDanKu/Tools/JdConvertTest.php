<?php

namespace Tests\HaoDanKu\Tools;


use MaxZhang\AllInOne\Apps\HaoDanKu\Jd\Tools\GetJdItemsLinkRequest;
use MaxZhang\AllInOne\Apps\HaoDanKu\Tools\VpConvertRequest;
use MaxZhang\AllInOne\Client\HaoDanKuClient;

use Tests\BaseTest;
use Tests\HaoDanKu\HaoDanKuBaseTest;


class JdConvertTest extends HaoDanKuBaseTest
{

    /**
     * @test
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function JdConvert()
    {

        $req             = new GetJdItemsLinkRequest();
        $req->unionId    = $this->config['HaoDanKu_unionId'];
        $req->materialId = 'zcfJkSabB3BXtKSrNbHprvx6_3nmueRv7JB9p66vbAi';

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool($res['code'] == 200);
    }


}
