<?php

namespace Tests\DaTaoKe\Tb\SpecialChannel;

use MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel\ExplosiveGoodsListRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class ExplosiveGoodsListRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    function get()
    {
        $request = new ExplosiveGoodsListRequest();

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }
}