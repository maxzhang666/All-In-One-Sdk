<?php

namespace Tests\ZheTaoKe\Tiktok;

use MaxZhang\AllInOne\Apps\ZheTaoKe\Jd\PromotionByUnionidRequest;
use MaxZhang\AllInOne\Apps\ZheTaoKe\Tiktok\OpenDouyinZhuanlianRequest;
use MaxZhang\AllInOne\Exceptions\HttpException;
use MaxZhang\AllInOne\Exceptions\InvalidArgumentException;
use Tests\ZheTaoKe\ZheTaoKeBaseTest;

class TiktokTest extends ZheTaoKeBaseTest
{

    /**
     * @test
     * @throws InvalidArgumentException
     * @throws HttpException
     */
    public function openDouyinZhuanlian()
    {
        $request = new OpenDouyinZhuanlianRequest();

        $request->productUrl='https://haohuo.jinritemai.com/ecommerce/trade/detail/index.html?id=3624312858713682681&origin_type=open_platform&pick_source=v.EpzYo';

        $res = $this->client->execute($request);

        print_r($res);

        self::assertIsBool(array_key_exists('status', $res));
    }

}