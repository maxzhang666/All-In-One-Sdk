<?php

namespace Tests\DaTaoKe\Base;

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
        $req->materialId = 'https://item.jd.com/100013879620.html';
        $req->unionId    = $this->config['DaTaoKe_unionId'];
        $req->positionId = $this->config['DaTaoKe_positionId'];

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));

    }
}