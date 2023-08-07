<?php

namespace Tests\ZheTaoKe\Jd;

use MaxZhang\AllInOne\Apps\ZheTaoKe\Jd\PromotionByUnionidRequest;
use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use Tests\ZheTaoKe\ZheTaoKeBaseTest;

class JdTest extends ZheTaoKeBaseTest
{

    /**
     * @test
     * @throws InvalidArgumentException
     * @throws HttpException
     */
    public function PromotionTest()
    {
        $request = new PromotionByUnionidRequest();

        $request->materialId = 10082182213675;
        $request->unionId    = $this->config["ZheTaoKe_JD_UnionId"];

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('status', $res));
    }

}