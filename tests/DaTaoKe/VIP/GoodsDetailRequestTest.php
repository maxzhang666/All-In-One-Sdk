<?php

namespace Tests\DaTaoKe\VIP;

use MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel\ExplosiveGoodsListRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel\HistoryLowPriceListRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\VIP\Base\GoodsDetailRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\VIP\Base\PromoteLinkRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class GoodsDetailRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    function goodsDetailRequest()
    {
        $request = new GoodsDetailRequest();

        $request->goodsIdList = '["6920687260216040732"]';

        $request->request = '{"openId": "123","realCall": "false"}';

        $request->needSign = true;

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }
}