<?php

namespace Tests\SuNing\Union;

use MaxZhang\AllInOne\Apps\SuNing\Union\DetailRequest;
use MaxZhang\AllInOne\Apps\SuNing\Union\SearchRequest;
use Tests\SuNing\SuNingBaseTest;

class DetailSearchTest extends SuNingBaseTest
{

    /**
     * @test
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function SearchTest()
    {
        $request = new DetailRequest();

        $request->commodityStr='11301978219-0000000000';

        $res = $this->client->execute($request);

        print_r($res);

    }

}