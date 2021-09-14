<?php

namespace Tests\HaoDanKu;

use MaxZhang\AllInOne\Client\HaoDanKuClient;
use Tests\BaseTest;

class HaoDanKuBaseTest extends BaseTest
{
    protected $client;


    public function __construct()
    {
        parent::__construct();
        $this->client = new HaoDanKuClient($this->config['HaoDanKu_apikey']);
    }

}