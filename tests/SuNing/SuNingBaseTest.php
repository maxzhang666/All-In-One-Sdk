<?php

namespace Tests\SuNing;

use MaxZhang\AllInOne\Client\SuNingClient;
use Tests\BaseTest;

class SuNingBaseTest extends BaseTest
{

    protected $client;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('PRC');
        $this->client = new SuNingClient($this->config['SuNing_appkey'], $this->config['SuNing_appsec']);
    }
}