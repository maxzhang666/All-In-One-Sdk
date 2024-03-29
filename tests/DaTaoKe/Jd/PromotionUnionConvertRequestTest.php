<?php

namespace Tests\DaTaoKe\Jd;

use MaxZhang\AllInOne\Apps\DaTaoKe\Base\PromotionUnionConvertRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class PromotionUnionConvertRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    function ConvertTest()
    {
        $req             = new PromotionUnionConvertRequest();
        $itemId          = 100013879620;
        $req->materialId = "https://item.jd.com/$itemId.html";
        $req->unionId    = $this->config['DaTaoKe_unionId'];
        $req->positionId = $this->config['DaTaoKe_positionId'];
        $req->needSign   = true;

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));

    }
}