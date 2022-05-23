<?php

namespace Tests\DaTaoKe\Inbound;

use MaxZhang\AllInOne\Apps\DaTaoKe\Inbound\GetTbDetails;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class GetTbDetailsTest extends DaTaoKeBaseTest
{
    /**
     * @test
     */
    function search()
    {
        $req = new GetTbDetails();

        //$req->id='18926311';
        $req->goodsId = '568021539029';

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }
}