<?php

namespace Tests\DaTaoKe\VIP;

use MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel\ExplosiveGoodsListRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\Tb\SpecialChannel\HistoryLowPriceListRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\VIP\Base\PromoteLinkRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class PromoteLinkRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    function explosiveGoodsListRequest()
    {
        $request = new PromoteLinkRequest();

        $request->urlList = '["https://detail.vip.com/detail-1710613296-6920614844867312464.html"]';

        $request->urlGenRequest = '{"openId": "123","realCall": "false"}';

        $request->needSign = true;

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }
}