<?php

namespace Tests\SuNing\Union;

use MaxZhang\AllInOne\Apps\SuNing\Union\SearchRequest;
use Tests\SuNing\SuNingBaseTest;

class SearchTest extends SuNingBaseTest
{

    /**
     * @test
     * @throws \MaxZhang\AllInOne\Exceptions\HttpException
     */
    public function SearchTest()
    {
        $request = new SearchRequest();

        $res = $this->client->execute($request);

        print_r($res);

    }

}