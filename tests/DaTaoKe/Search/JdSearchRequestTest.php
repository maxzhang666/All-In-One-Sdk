<?php

namespace Tests\DaTaoKe\Search;

use MaxZhang\AllInOne\Apps\DaTaoKe\Jd\Search\JdSearchRequest;
use Tests\DaTaoKe\DaTaoKeBaseTest;

class JdSearchRequestTest extends DaTaoKeBaseTest
{

    /**
     * @test
     */
    function search()
    {
        $req         = new JdSearchRequest();
        $req->skuIds = '10020075095716';

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(array_key_exists('code', $res));
    }
}