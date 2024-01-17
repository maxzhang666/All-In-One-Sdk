<?php

namespace Tests\DaTaoKe\Tiktok;

use MaxZhang\AllInOne\Apps\DaTaoKe\Tiktok\CPS\KolProductShareRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\Tiktok\CPS\OneYuanGoodsListRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class CPSRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test 一元购
     */
    public function oneYuanGoodsListRequest()
    {
        $request = new OneYuanGoodsListRequest();

        $request->needSign    = true;
        $request->search_type = 1;
        $request->sort_type   = 1;

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }

    /**
     * @test 转链
     */
    public function kolProductShareRequest()
    {
        $request               = new KolProductShareRequest();
        $request->productUrl   = 'https://haohuo.jinritemai.com/ecommerce/trade/detail/index.html?id=3624312858713682681&origin_type=open_platform&pick_source=v.EpzYo';
        $request->externalInfo = 0;

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }
}