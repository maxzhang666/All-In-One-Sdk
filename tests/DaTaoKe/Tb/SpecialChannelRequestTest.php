<?php

namespace Tests\DaTaoKe\Tb;

use MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel\ExplosiveGoodsListRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel\HistoryLowPriceListRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class SpecialChannelRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    function explosiveGoodsListRequest()
    {
        $request = new ExplosiveGoodsListRequest();

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }

    /**
     * @test
     */
    function historyLowPriceListRequest()
    {
        $request = new HistoryLowPriceListRequest();

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }
}