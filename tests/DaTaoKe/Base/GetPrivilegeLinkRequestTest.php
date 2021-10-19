<?php

namespace Tests\DaTaoKe\Base;

use MaxZhang\AllInOne\Apps\DaTaoKe\Base\GetPrivilegeLinkRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class GetPrivilegeLinkRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    public function ConvertTest()
    {
        $request          = new GetPrivilegeLinkRequest();
        $request->goodsId = '626079226279';

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool($res['code'] == 0);
    }
}