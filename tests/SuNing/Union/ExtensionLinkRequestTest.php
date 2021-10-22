<?php

namespace Tests\SuNing\Union;

use MaxZhang\AllInOne\Apps\SuNing\Union\ExtensionLinkRequest;
use Tests\SuNing\SuNingBaseTest;

class ExtensionLinkRequestTest extends SuNingBaseTest
{

    /**
     * @test
     */
    function convert()
    {

        $req             = new ExtensionLinkRequest();
        $req->productUrl = "https://product.suning.com/0000000000/11301978219.html";

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(array_key_exists('sn_responseContent', $res));

    }
}