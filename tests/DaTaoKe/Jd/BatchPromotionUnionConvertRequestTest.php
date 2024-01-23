<?php

namespace Tests\DaTaoKe\Jd;

use MaxZhang\AllInOne\Apps\DaTaoKe\Base\PromotionUnionConvertRequest;
use MaxZhang\AllInOne\Apps\DaTaoKe\Jd\Base\BatchPromotionUnionConvertRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class PromotionUnionConvertRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    function ConvertTest()
    {
        $req           = new BatchPromotionUnionConvertRequest();
        $itemId        = 100013879620;
        $req->content  = "迪士尼洗脸巾45抽*6包，到手29.9元\nhttps://item.jd.com/100039661805.html\n叠加京喜app商品下方6劵\n目前有赠品同款1卷，以实际结算页为准";
        $req->unionId  = $this->config['DaTaoKe_unionId'];
        $req->needSign = true;
        //$req->positionId = $this->config['DaTaoKe_positionId'];

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));

    }
}