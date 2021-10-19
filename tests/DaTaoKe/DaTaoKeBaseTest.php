<?php

namespace Tests\DaTaoKe;

use MaxZhang\AllInOne\Client\DaTaoKeClient;
use Tests\BaseTest;

class DaTaoKeBaseTest extends BaseTest
{
    protected $client;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('PRC');
        $this->client = new DaTaoKeClient($this->config['DaTaoKe_appkey'], $this->config['DaTaoKe_appsec']);
    }
}