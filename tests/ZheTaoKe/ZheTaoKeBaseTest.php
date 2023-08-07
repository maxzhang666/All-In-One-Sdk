<?php

namespace Tests\ZheTaoKe;

use MaxZhang\AllInOne\Client\ZheTaoKeClient;
use Tests\BaseTest;

class ZheTaoKeBaseTest extends BaseTest
{

    protected $client;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('PRC');
        $this->client = new ZheTaoKeClient($this->config['ZheTaoKe_appkey']);
    }
}